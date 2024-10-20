<?php

namespace App\Http\Controllers\Owner\FieldManagement;

use App\Models\VenueField;
use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

use Inertia\Inertia;

class FieldController extends Controller
{
    public function index()
    {
        $fieldData = $this->fieldData();

        return Inertia::render('Owner/FieldManagement/FieldList/Index',[
            'fieldData' => $fieldData
        ]);
    }

    public function createField()
    {
        $user = Auth::user();
        return Inertia::render('Owner/FieldManagement/CreateField/Index',[
            'listVenue' => Venue::where('owner_id',$user->user_id)->get(),
        ]);
    }

    public function fieldData() : Collection
    {
        // venue,field_name,lokasi,gambar,sports_available
        $venue = VenueField::select('field_id', 'venue_id', 'name')
                        ->with(
                            'venue:venue_id,owner_id,name,address',
                            'fieldImages:id,field_id,image_url',
                            'venueFieldSports'
                        )
                        ->whereRelation('venue', 'owner_id', Auth::user()->user_id)
                        ->get();

        return $venue;
    }
}
