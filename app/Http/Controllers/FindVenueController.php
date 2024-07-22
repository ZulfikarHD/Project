<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FindVenueController extends Controller
{
    public function index()
    {
        return Inertia::render('FindVenue');
    }
}
