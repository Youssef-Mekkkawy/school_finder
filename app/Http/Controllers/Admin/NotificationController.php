<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * POST /api/admin/notifications/send
     * Send a notification to all users or a specific user.
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
            'target'  => 'required|in:all,user',
            'user_id' => 'required_if:target,user|integer|exists:users,id',
        ]);

        if ($data['target'] === 'all') {
            $userIds = User::pluck('id');

            $now = now();
            $rows = $userIds->map(fn($id) => [
                'user_id'    => $id,
                'title'      => $data['title'],
                'message'    => $data['message'],
                'is_read'    => false,
                'created_at' => $now,
                'updated_at' => $now,
            ])->all();

            Notification::insert($rows);
            $count = count($rows);
        } else {
            Notification::create([
                'user_id' => $data['user_id'],
                'title'   => $data['title'],
                'message' => $data['message'],
                'is_read' => false,
            ]);
            $count = 1;
        }

        return response()->json([
            'success' => true,
            'message' => "Notification sent to {$count} user(s).",
            'data'    => ['count' => $count],
        ]);
    }
}
