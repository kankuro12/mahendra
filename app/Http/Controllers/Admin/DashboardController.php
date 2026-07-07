<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Event;
use App\Models\Facility;
use App\Models\LeadershipMessage;
use App\Models\Notice;
use App\Models\Teacher;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'noticesCount' => Notice::count(),
            'facilitiesCount' => Facility::count(),
            'albumsCount' => Album::count(),
            'messagesCount' => LeadershipMessage::count(),
            'teachersCount' => Teacher::count(),
            'eventsCount' => Event::count(),
            'recentNotices' => Notice::latest()->take(5)->get(),
            'upcomingEvents' => Event::where('event_date', '>=', now())->orderBy('event_date')->take(5)->get(),
        ]);
    }
}
