<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function promote(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return redirect()->back()->with('success', 'User promoted to admin successfully.');
    }
}
