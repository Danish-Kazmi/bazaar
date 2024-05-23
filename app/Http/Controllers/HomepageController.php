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
    public function features()
    {
        return Inertia::render('Bazaar/Features');
    }
    public function singleFeature()
    {
        return Inertia::render('Bazaar/singleFeature');
    }
    public function contact_us()
    {
        return Inertia::render('Bazaar/contact_us');
    }
    public function contact_email(Request $request)
    {
        $contact_user = $request->all();
        \Mail::to($request->contactEmail)->send(new \App\Mail\contactMail($contact_user));
        return redirect()->back();
    }
}
