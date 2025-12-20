<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts()
    {
        return view('customer.products.index');
    }
}
