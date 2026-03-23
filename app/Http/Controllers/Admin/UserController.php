<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * GET /api/admin/users
     * Return all users with name, email, joined date, favorites count, reviews count.
     */
    public function index()
    {
        $users = User::withCount(['reviews', 'favorites', 'appointments'])
            ->latest()
            ->get()
            ->map(fn($u) => [
                'id'                 => $u->id,
                'name'               => $u->name,
                'email'              => $u->email,
                'phone'              => $u->phone,
                'joined'             => $u->created_at->toDateString(),
                'reviews_count'      => $u->reviews_count,
                'favorites_count'    => $u->favorites_count,
                'appointments_count' => $u->appointments_count,
            ]);

        return response()->json(['success' => true, 'data' => $users]);
    }

    /**
     * DELETE /api/admin/users/{id}
     * Delete user and cascade their reviews, favorites, appointments, notifications.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        DB::transaction(function () use ($user) {
            $user->reviews()->delete();
            $user->favorites()->delete();
            $user->appointments()->delete();
            $user->notifications()->delete();
            $user->tokens()->delete();
            $user->delete();
        });

        return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
    }
}
