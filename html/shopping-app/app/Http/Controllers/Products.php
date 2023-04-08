<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Products extends Controller
{
    
    public function index(Request $request, $title) {
        // return "Test";
        $title = $title;
        // dd($request);
        return view('home', compact('title'));
    }
}
