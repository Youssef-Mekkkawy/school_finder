<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * GET /api/admin/appointments?filter=all|pending|confirmed|cancelled|attention&page=1
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['user:id,name,email', 'school:id,name']);

        $filter = $request->filter;
        if (in_array($filter, [
            Appointment::STATUS_PENDING,
            Appointment::STATUS_CONFIRMED,
            Appointment::STATUS_CANCELLED,
            Appointment::STATUS_ATTENTION,
        ])) {
            $query->where('status', $filter);
        }

        $paginated = $query->latest()->paginate(15);

        $data = collect($paginated->items())->map(fn($a) => [
            'id'             => $a->id,
            'school_id'      => $a->school_id,
            'school_name'    => $a->school?->name,
            'user_id'        => $a->user_id,
            'user_name'      => $a->user?->name,
            'user_email'     => $a->user?->email,
            'preferred_date' => $a->preferred_date,
            'message'        => $a->message,
            'status'         => $a->status,
            'cancel_reason'  => $a->cancel_reason,
            'attention_note' => $a->attention_note,
            'confirmed_date' => $a->confirmed_date,
            'admin_note'     => $a->admin_note,
            'created_at'     => $a->created_at->toDateString(),
        ]);

        return response()->json([
            'success'      => true,
            'data'         => $data,
            'current_page' => $paginated->currentPage(),
            'last_page'    => $paginated->lastPage(),
            'total'        => $paginated->total(),
        ]);
    }

    /**
     * PUT /api/admin/appointments/{id}/status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status'         => 'required|in:confirmed,cancelled,attention',
            'confirmed_date' => 'required_if:status,confirmed|nullable|date',
            'admin_note'     => 'nullable|string|max:1000',
            'attention_note' => 'required_if:status,attention|nullable|string|max:1000',
            'cancel_reason'  => 'nullable|string|max:1000',
        ]);

        $appointment = Appointment::with('school')->findOrFail($id);

        $updates = ['status' => $request->status];

        if ($request->status === Appointment::STATUS_CONFIRMED) {
            $updates['confirmed_date'] = $request->confirmed_date;
            $updates['admin_note']     = $request->admin_note;
        } elseif ($request->status === Appointment::STATUS_CANCELLED) {
            $updates['cancel_reason'] = $request->cancel_reason ?? 'Cancelled by admin';
            $updates['admin_note']    = $request->admin_note;
        } elseif ($request->status === Appointment::STATUS_ATTENTION) {
            $updates['attention_note'] = $request->attention_note;
            $updates['admin_note']     = $request->admin_note;
        }

        $appointment->update($updates);

        // Send notification to user
        $schoolName = $appointment->school?->name ?? 'the school';
        $notifData  = $this->buildNotification($request->status, $schoolName, $updates);

        Notification::create([
            'user_id' => $appointment->user_id,
            'title'   => $notifData['title'],
            'message' => $notifData['message'],
            'is_read' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appointment updated to ' . $request->status . '.',
        ]);
    }

    /**
     * DELETE /api/admin/appointments/{id}
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json(['success' => true, 'message' => 'Appointment deleted.']);
    }

    private function buildNotification(string $status, string $schoolName, array $updates): array
    {
        return match ($status) {
            Appointment::STATUS_CONFIRMED => [
                'title'   => 'Appointment Confirmed',
                'message' => "Your appointment at {$schoolName} has been confirmed" .
                             ($updates['confirmed_date'] ? ' for ' . $updates['confirmed_date'] : '') . '.',
            ],
            Appointment::STATUS_CANCELLED => [
                'title'   => 'Appointment Cancelled',
                'message' => "Your appointment at {$schoolName} has been cancelled. Reason: " . ($updates['cancel_reason'] ?? 'N/A'),
            ],
            Appointment::STATUS_ATTENTION => [
                'title'   => 'Action Required for Your Appointment',
                'message' => "Your appointment at {$schoolName} requires attention: " . ($updates['attention_note'] ?? ''),
            ],
            default => ['title' => 'Appointment Update', 'message' => "Your appointment at {$schoolName} has been updated."],
        };
    }
}
