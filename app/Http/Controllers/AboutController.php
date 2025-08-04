<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Fetch the about data from the database
        $about = About::first();

        // Return the view with the about data
        return view('pages.about.index', compact('about'));
    }
}
