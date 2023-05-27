<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()?->role === 'user') {
            return Inertia::render('User/Dashboard');
        }
            return Inertia::render('Welcome');
    }

    public function userShoppingList()
    {

    }
}
