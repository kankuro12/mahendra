<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlumniRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlumniRegistrationController extends Controller
{
    public function index(): View
    {
        return view('admin.alumni-registrations.index', [
            'registrations' => AlumniRegistration::latest()->get(),
        ]);
    }

    public function show(AlumniRegistration $alumniRegistration): View
    {
        if (! $alumniRegistration->read) {
            $alumniRegistration->update(['read' => true]);
        }

        return view('admin.alumni-registrations.show', [
            'registration' => $alumniRegistration,
        ]);
    }

    public function destroy(AlumniRegistration $alumniRegistration): RedirectResponse
    {
        $alumniRegistration->delete();

        return redirect()->route('admin.alumni-registrations.index')
            ->with('success', 'Registration deleted.');
    }
}
