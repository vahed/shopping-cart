<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()?->role === 'user') {
            $order = Order::with('products')->where('user_id', 10)->get();

            return Inertia::render('User/Dashboard');
        }
            return Inertia::render('Welcome');
    }

    public function userShoppingList()
    {
        Order::where('');
    }
}
