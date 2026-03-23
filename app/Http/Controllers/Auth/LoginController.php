<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponse;

    /**
     * Show the login page
     * GET /login
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Login a regular user (parent / student)
     * POST /api/auth/login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->error('Invalid email or password.', 401);
        }

        // Revoke old tokens (optional - keeps only 1 active session)
        // $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'user'  => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'role'  => 'user',
            ],
            'token' => $token,
        ], 'Login successful');
    }

    /**
     * Login an admin
     * POST /api/auth/admin/login
     */
    public function adminLogin(Request $request)
    {
        // dd($request);
        $request->validate([
            'email'    => 'required|email|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        // dd($admin);
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return $this->error('Invalid admin credentials.', 401);
        }

        $token = $admin->createToken('admin_token', ['admin'])->plainTextToken;

        return $this->success([
            'user'  => [
                'id'    => $admin->id,
                'name'  => $admin->name,
                'email' => $admin->email,
                'role'  => 'admin',
            ],
            'token' => $token,
        ], 'Admin login successful');
    }
}
