<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function landing()
    {
        return view('customer.landing');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function contactUs()
    {
        return view('customer.contact-us');
    }
}
