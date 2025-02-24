<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        $users = User::withCount('posts')->orderBy('posts_count', 'desc')->take(3)->get();
            return view('leadboard', compact('users'));
    }
}
