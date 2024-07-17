<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomepageController extends Controller
{
    public function index()
    {
        return Inertia::render('Bazaar/Homepage');
    }
    public function pros()
    {
        return Inertia::render('Bazaar/Pros');
    }
    public function products()
    {
        return Inertia::render('Bazaar/Products');
    }
    public function singleProduct()
    {
        return Inertia::render('Bazaar/SingleProduct');
    }
    public function contact_us()
    {
        return Inertia::render('Bazaar/ContactUs');
    }
    public function aboutUs()
    {
        return Inertia::render('Bazaar/AboutUs');
    }
    public function contact_email(Request $request)
    {
        $contact_user = $request->all();
        \Mail::to($request->contactEmail)->send(new \App\Mail\contactMail($contact_user));
        return redirect()->back();
    }
}
