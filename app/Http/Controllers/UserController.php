<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductFeature;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()?->role === 'user') {

            $user = Auth::user();
            $orders = Order::getUserOrders($user->id);

            return Inertia::render('User/Dashboard',[
                'orders' => $orders
            ]);
        }
            return Inertia::render('Welcome');
    }

    public function userShoppingList()
    {
        Order::where('');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
