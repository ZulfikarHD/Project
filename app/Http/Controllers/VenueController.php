<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Field;
use App\Models\VenuePicture;

class VenueController extends Controller
{
    public function index()
    {

    }

    public function venueDetail(string $id)
    {
        $fieldData = Field::with('fieldImages', 'fieldSports', 'venue.pictures')
            ->where('field_id', $id)
            ->get();

        $totalVenueImages = VenuePicture::where('venue_id', $fieldData->first()->venue->venue_id)->count();

        return Inertia::render('Venues/VenueDetail', [
            'fields'    => $fieldData,
            'totalVenueImages'  => $totalVenueImages
        ]);
    }
}
