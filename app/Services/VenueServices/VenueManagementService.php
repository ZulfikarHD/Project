<?php

namespace App\Services\VenueService;

use App\Models\Field;
use App\Models\VenueImage;

class VenueManagementService
{
    public function getVenueData(Int $venueId)
    {
        $fieldData = Field::with('fieldImages', 'fieldSports', 'venue.images')
            ->where('field_id', $venueId)
            ->get();

        $totalVenueImages = VenueImage::countImagesByVenueId($fieldData->first()->venue->venue_id);

        return [
            'fields' => $fieldData,
            'totalVenueImages' => $totalVenueImages
        ];
    }
}
