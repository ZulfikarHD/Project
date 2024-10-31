<?php

namespace App\Services\VenueServices;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Collection;

class VenueManagementService
{
    public function getVenueData(Int $venueId): Collection
    {
        $venueData = Venue::select('venue_id','name','description')
                        ->with('images:venue_image_id,venue_id,image_url,pic_num',
                               'address',
                               'fields:field_id,venue_id,name,description',
                               'fields.fieldImages:id,field_id,image_url',
                               'fields.fieldSports.sportData:sport_id,name,icon',
                               'timeSlots:venue_id,slot_id,day,start_time,end_time,price')
                        ->where('venue_id',$venueId)
                        ->get();

        return $venueData;
    }

}
