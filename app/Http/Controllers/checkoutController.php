<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class checkoutController extends Controller
{
    public function checkout() {
        return Inertia::render('Bazaar/Checkout');
    }
}
