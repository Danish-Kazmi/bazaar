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
}
