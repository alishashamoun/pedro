<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('aboutus');
    }
    public function service()
    {
        return view('service');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function contactus()
    {
        return view('contactus');
    }
}
