<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VenueDetailsController extends Controller
{
    public function index()
    {
        return Inertia::render('Venues/VenueDetail');
    }
}
