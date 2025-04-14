<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the authenticated user
        $user = $request->user();

        // Return the dashboard view with the user data
        return view('dashboard', ['user' => $user]);
    }
}
