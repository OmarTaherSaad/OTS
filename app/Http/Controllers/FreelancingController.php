<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreelancingController extends Controller
{
    public function payment_methods()
    {
        return view('freelancing.payment-methods');
    }
}
