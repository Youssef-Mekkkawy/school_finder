<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * GET /api/notifications
     * Auth required — return all notifications for the authenticated user, newest first.
     */
    public function index(Request $request)
    {
        $notifications = Notification::where('user_id', $request->user()->id)
            ->latest()
            ->get()
            ->map(fn($n) => [
                'id'    => $n->id,
                'title' => $n->title,
                'msg'   => $n->message,
                'time'  => $n->created_at->diffForHumans(),
                'read'  => (bool) $n->is_read,
            ]);

        return response()->json(['success' => true, 'data' => $notifications]);
    }

    /**
     * PUT /api/notifications/{id}/read
     * Auth required — mark a single notification as read.
     */
    public function markRead(Request $request, $id)
    {
        $notification = Notification::where('user_id', $request->user()->id)
            ->findOrFail($id);

        $notification->update(['is_read' => true]);

        return response()->json(['success' => true, 'message' => 'Notification marked as read.']);
    }

    /**
     * PUT /api/notifications/read-all
     * Auth required — mark all notifications as read for the authenticated user.
     */
    public function markAllRead(Request $request)
    {
        Notification::where('user_id', $request->user()->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['success' => true, 'message' => 'All notifications marked as read.']);
    }

    /**
     * GET /api/notifications/unread-count
     * Auth required — return count of unread notifications.
     */
    public function unreadCount(Request $request)
    {
        $count = Notification::where('user_id', $request->user()->id)
            ->where('is_read', false)
            ->count();

        return response()->json(['success' => true, 'data' => ['count' => $count]]);
    }
}
