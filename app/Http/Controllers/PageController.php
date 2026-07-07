<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\Event;
use App\Models\LeadershipMessage;
use App\Models\Notice;
use App\Models\Page;

class PageController extends Controller
{
    public function home()
    {
        $events = Event::orderBy('event_date')->take(2)->get();
        $notices = Notice::orderBy('published_at', 'desc')->take(2)->get();
        $principalMessage = LeadershipMessage::where('slug', 'principal')->first();

        return view('home', compact('events', 'notices', 'principalMessage'));
    }

    public function about()
    {
        return view('about');
    }

    public function notice()
    {
        $notices = Notice::orderBy('published_at', 'desc')->get();

        return view('notice', compact('notices'));
    }

    public function alumni()
    {
        return view('alumni');
    }

    public function teachers()
    {
        $departments = Department::with('teachers')->orderBy('sort_order')->get();

        return view('teachers', compact('departments'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function privacy()
    {
        $page = Page::where('slug', 'privacy')->where('published', true)->firstOrFail();

        return view('page', compact('page'));
    }

    public function tenders()
    {
        $tenders = Document::tenders()->where('published', true)->orderBy('sort_order')->get();

        return view('tenders', compact('tenders'));
    }

    public function downloads()
    {
        $downloads = Document::downloads()->where('published', true)->orderBy('sort_order')->get();

        return view('downloads', compact('downloads'));
    }

    public function careers()
    {
        $careers = Document::careers()->where('published', true)->orderBy('sort_order')->get();

        return view('careers', compact('careers'));
    }
}
