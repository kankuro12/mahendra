<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Department;
use App\Models\Document;
use App\Models\Event;
use App\Models\Faq;
use App\Models\LeadershipMessage;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $events = Event::orderBy('event_date')->take(2)->get();
        $notices = Notice::orderBy('published_at', 'desc')->take(2)->get();

        $messageId = Setting::get('home_leadership_message_id');
        $principalMessage = $messageId ? LeadershipMessage::find($messageId) : LeadershipMessage::first();

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
        $addresses = json_decode(Setting::get('contact_addresses', '[]'), true);
        $phones = json_decode(Setting::get('contact_phones', '[]'), true);
        $emails = json_decode(Setting::get('contact_emails', '[]'), true);
        $hours = json_decode(Setting::get('contact_hours', '[]'), true);

        return view('contact', compact('addresses', 'phones', 'emails', 'hours'));
    }

    public function contactSubmit(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|max:50',
            'subject' => 'nullable|max:255',
            'message' => 'required',
        ]);

        ContactMessage::create($data);

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
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

    public function faq()
    {
        $faqs = Faq::where('published', true)->orderBy('sort_order')->get();

        return view('faq', compact('faqs'));
    }
}
