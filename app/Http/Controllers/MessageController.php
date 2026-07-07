<?php

namespace App\Http\Controllers;

use App\Models\LeadershipMessage;

class MessageController extends Controller
{
    public function index()
    {
        $messages = LeadershipMessage::all();

        return view('messages', compact('messages'));
    }

    public function show(string $slug)
    {
        $message = LeadershipMessage::where('slug', $slug)->firstOrFail();

        return view('message-detail', compact('message'));
    }
}
