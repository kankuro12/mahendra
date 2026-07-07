<?php

namespace App\Http\Controllers;

use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();

        return view('facilities', compact('facilities'));
    }

    public function show(string $slug)
    {
        $facility = Facility::where('slug', $slug)->firstOrFail();

        return view('facility-detail', compact('facility'));
    }
}
