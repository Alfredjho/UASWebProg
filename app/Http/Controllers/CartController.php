<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Vegetable;

class CartController extends Controller
{
    //
    public function addToCart(Request $request, $vegetable_id){
        $vegetable = Vegetable::findOrFail($vegetable_id);

        auth()->user()->cart()->create([
            'vegetable_id' => $vegetable->id
        ]);

        return redirect()->back()->with('Success', 'Vegetable added to cart successfully.');
    }

    public function removeItem($vegetable_id){
        $cartItem = auth()->user()->cart()->where('vegetable_id' , $vegetable_id)->first();
        $cartItem->delete();

        return redirect()->back()->with('success', 'Vegetable removed from cart successfully.');
    }

    public function checkOut(){
        auth()->user()->cart()->delete();
        return view('success');
    }
}
