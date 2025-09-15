<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $content = "Name: " . $validated['name'] . "\n";
        $content .= "Email: " . $validated['email'] . "\n";
        $content .= "Message:\n" . $validated['message'] . "\n";

        $filename = 'contact_' . now()->format('Ymd_His') . '.txt';

        Storage::disk('local')->put($filename, $content);

        return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
