<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $venues = Venue::with('images:venue_id,image_url', 'startingPrice')->take(5)->get();
        $recVenues = Venue::with('images', 'startingPrice')->take(8)->get();
        // dd($venues);
        return Inertia::render('Home', [
            'venues' => $venues,
            'recVenues' => $recVenues
        ]);
    }
}
