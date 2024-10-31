<?php

namespace App\Services\VenueServices;

use App\Models\Field;
use App\Models\VenueImage;
use Illuminate\Database\Eloquent\Collection;

class VenueManagementService
{
    public function getVenueData(Int $venueId): array
    {
        // $fieldData = $this->getFieldData($venueId);
        // dd($fieldData);
        // $totalVenueImages = VenueImage::countImagesByVenueId($fieldData->first()->venue->venue_id);

        // return [
        //     'fields' => $fieldData,
        //     'countedImages' => $totalVenueImages
        // ];
    }

}
