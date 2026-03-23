<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\School;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * POST /api/appointments
     * Auth required — book a school visit appointment.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'school_id'      => 'required|integer|exists:schools,id',
            'preferred_date' => 'required|date|after:today',
            'message'        => 'nullable|string|max:500',
        ]);

        $appointment = Appointment::create([
            'user_id'        => $request->user()->id,
            'school_id'      => $data['school_id'],
            'preferred_date' => $data['preferred_date'],
            'message'        => $data['message'] ?? null,
            'status'         => 'pending',
        ]);

        $appointment->load('school:id,name');

        return response()->json([
            'success' => true,
            'message' => 'Appointment booked successfully.',
            'data'    => [
                'id'             => $appointment->id,
                'school_id'      => $appointment->school_id,
                'school_name'    => $appointment->school?->name,
                'preferred_date' => $appointment->preferred_date,
                'message'        => $appointment->message,
                'status'         => $appointment->status,
                'date'           => $appointment->created_at->toDateString(),
            ],
        ], 201);
    }

    /**
     * GET /api/appointments
     * Auth required — return all appointments for the authenticated user.
     */
    public function userIndex(Request $request)
    {
        $appointments = Appointment::with('school:id,name')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get()
            ->map(fn($a) => [
                'id'             => $a->id,
                'school_id'      => $a->school_id,
                'school'         => $a->school?->name,
                'date'           => $a->preferred_date,
                'msg'            => $a->message,
                'status'         => $a->status,
                'cancel_reason'  => $a->cancel_reason,
                'attention_note' => $a->attention_note,
                'confirmed_date' => $a->confirmed_date,
            ]);

        return response()->json(['success' => true, 'data' => $appointments]);
    }

    /**
     * PUT /api/appointments/{id}/cancel
     * Auth required — cancel own appointment.
     */
    public function cancel(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        if ($appointment->status !== Appointment::STATUS_PENDING) {
            return response()->json([
                'success' => false,
                'message' => 'Only pending appointments can be cancelled.',
            ], 422);
        }

        $appointment->update([
            'status'        => Appointment::STATUS_CANCELLED,
            'cancel_reason' => 'Cancelled by user',
        ]);

        return response()->json(['success' => true, 'message' => 'Appointment cancelled.']);
    }
}
