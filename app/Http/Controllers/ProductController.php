<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view()
    {
        return view('products');
    }

    public function createUpdate()
    {
        return view('product');
    }
}
