<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // app/Http/Controllers/User/DashboardController.php
    public function index()
    {
        // We can pass the *authenticated* user to the view for the avatar/name.
        return view('user.dashboard', [
            'user' => auth()->user(),
        ]);
    }
}
