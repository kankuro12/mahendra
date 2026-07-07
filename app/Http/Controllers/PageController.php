<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function notice()
    {
        return view('notice');
    }

    public function alumni()
    {
        return view('alumni');
    }

    public function teachers()
    {
        return view('teachers');
    }

    public function contact()
    {
        return view('contact');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function tenders()
    {
        return view('tenders');
    }

    public function downloads()
    {
        return view('downloads');
    }

    public function careers()
    {
        return view('careers');
    }
}
