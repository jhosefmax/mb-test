<?php

namespace App\Http\Controllers;

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
