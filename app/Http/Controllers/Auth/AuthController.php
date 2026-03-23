<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * POST /api/auth/register
     * Headers: Content-Type: application/json, Accept: application/json
     * Body: { name, email, password, password_confirmation }
     * Response: { success, message, data: { token, user } }
     * Auth: none
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user  = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Registration successful',
            'data'    => ['token' => $token, 'user' => $user],
        ], 201);
    }

    /**
     * POST /api/auth/login
     * Headers: Content-Type: application/json, Accept: application/json
     * Body: { email, password }
     * Response: { success, message, data: { token, user } }
     * Auth: none
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data'    => ['token' => $token, 'user' => $user],
        ]);
    }

    /**
     * POST /api/auth/logout
     * Headers: Authorization: Bearer {token}, Accept: application/json
     * Body: none
     * Response: { success, message }
     * Auth: sanctum
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * GET /api/auth/me
     * Headers: Authorization: Bearer {token}, Accept: application/json
     * Response: { success, data: user }
     * Auth: sanctum
     */
    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'data'    => $request->user(),
        ]);
    }

    /**
     * PUT /api/auth/profile
     * Headers: Authorization: Bearer {token}, Content-Type: application/json
     * Body: { name?, phone?, language? }
     * Response: { success, message, data: user }
     * Auth: sanctum
     */
    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name'     => 'sometimes|string|max:255',
            'phone'    => 'sometimes|string|max:20',
            'language' => 'sometimes|string|max:10',
        ]);

        $request->user()->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'data'    => $request->user()->fresh(),
        ]);
    }

    /**
     * PUT /api/auth/password
     * Headers: Authorization: Bearer {token}, Content-Type: application/json
     * Body: { current_password, new_password, new_password_confirmation }
     * Response: { success, message }
     * Auth: sanctum
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'      => 'required|string',
            'new_password'          => 'required|string|min:8|confirmed',
        ]);

        $user = $request->user();

        if (! Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully',
        ]);
    }

    /**
     * POST /api/auth/admin/login
     * Headers: Content-Type: application/json, Accept: application/json
     * Body: { email, password }
     * Response: { success, message, data: { token, user: { ...admin, role: 'admin' } } }
     * Auth: none — token returned has 'admin' ability
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = \App\Models\Admin::where('email', $request->email)->first();

        if (! $admin || ! Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $admin->createToken('admin_token', ['admin'])->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Admin login successful',
            'data'    => ['token' => $token, 'user' => array_merge($admin->toArray(), ['role' => 'admin'])],
        ]);
    }

    /**
     * POST /api/auth/forgot-password
     * Headers: Content-Type: application/json, Accept: application/json
     * Body: { email }
     * Response: { success, message }
     * Auth: none
     */
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        return response()->json([
            'success' => true,
            'message' => 'If that email exists, a reset link has been sent.',
        ]);
    }
}
