<?php

namespace App\Http\Controllers\Owner\FieldManagement;

use App\Http\Controllers\Controller;
use App\Models\VenueField;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FieldController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/FieldManagement/FieldList/Index');
    }

    public function fieldData()
    {
        // venue,field_name,lokasi,gambar,sports_available
        $venue = VenueField::query()
                        ->join('venues','venue_fields.venue_id','venues.venue_id')
                        ->join('field_images','venue_fields.field_id','field_images.field_id')
                        ->join('venue_field_sports','venue_fields.field_id','venue_field_sports.venue_field_id');
    }
}
