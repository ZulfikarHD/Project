<?php

namespace App\Services\VenueService;

use App\Models\VenueImage;

class VenueManagementService
{
    public function countVenueImageByUser(Integer $venueId)
    {
        return VenueImage::where('venue_id', $fieldData->first()->venue->venue_id)->count();
    }
}
