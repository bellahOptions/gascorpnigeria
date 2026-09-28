<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showAppLanding()
    {
        return view('app-landing');
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showServices()
    {
        return view('services');
    }

    public function showAssets()
    {
        return view('assets');
    }

    public function showContact()
    {
        return view('contact');
    }
}
