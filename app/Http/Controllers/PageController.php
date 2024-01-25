<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vegetable;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App;

class PageController extends Controller
{
    //
    public function registerPage($locale = 'en'){
        App::setlocale($locale);
        return view('register');
    }

    public function loginPage(){
        return view('login');
    }

    public function dashboardPage(){
        
        $vegetables = Vegetable::all();
        return view('dashboard', ['vegetable' => $vegetables]);
    }

    public function dashboardAdminPage(){
        $vegetables = Vegetable::all();
        return view('dashboardAdmin', ['vegetable' => $vegetables]);
    }

    public function cartPage(){
        $cart = auth()->user()->cart()->get();
        $user = Auth::user();


        $totalPrice = 0;

        foreach ($cart as $cartItem) {
            $totalPrice += $cartItem->vegetable->price;
        }

        return view('cart', ['cart' => $cart, 'totalPrice' => $totalPrice, 'user' => $user]);
    }

    public function profile(){
        $user = Auth::user();

        return view('profile', ['user' => $user]);
    }

    public function accountPage(){
        $users = User::all();
        return view('account', ['users' => $users]);
    }

    public function updateRolePage($id){
        $user = User::findOrFail($id);
        return view('updateRole', ['user' => $user]);
    }
}
