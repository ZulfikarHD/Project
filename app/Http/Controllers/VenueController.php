<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Field;
use App\Models\VenueImage;

use App\Services\VenueService\VenueManagementService;

class VenueController extends Controller
{
    protected $venueManagementService;

    public function __construct(VenueManagementService $venueManagementService)
    {
        $this->venueManagementService = $venueManagementService;
    }

    public function index()
    {

    }

    public function venueDetail(string $id)
    {
        $venueData = $this->venueManagementService->getVenueData($id);

        dd($venueData);

        return Inertia::render('Venues/VenueDetail', [
            'fields'    => $fieldData,
            'totalVenueImages'  => $totalVenueImages
        ]);
    }
}
