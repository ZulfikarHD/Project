<?php

namespace App\Services\FieldServices;

use App\Models\Field;
use Illuminate\Database\Eloquent\Collection;

class FieldManagementService
{
    public function getFieldDataByVenueId(Int $venueId) : Collection
    {
        $fieldData = Field::select('field_id', 'venue_id', 'name', 'description')
                        ->with(
                            'fieldImages:field_id,image_url',
                            'fieldSports.sportData:sport_id,name,icon'
                        )
                        ->where('field_id', $venueId)
                        ->get();

        return $fieldData;
    }
}
