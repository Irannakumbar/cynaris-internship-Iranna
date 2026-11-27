<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Welcome to Laravel Student Portal";
        $message = "Learning Laravel step by step.";

        return view('home', compact('title', 'message'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        return redirect()->route('contact')
            ->with('success', 'Your message has been submitted successfully!');
    }
}
