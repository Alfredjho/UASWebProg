<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vegetable;

class VegetableController extends Controller
{
    //
    public function showDetail($id){
        $vegetable = Vegetable::findOrFail($id);

        return view('vegetableDetail', ['vegetable' => $vegetable]);
    }
}
