<?php

namespace App\Http\Controllers\Owner\VenueManagement;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Http\Controllers\Controller;
use App\Models\FieldImage;
use App\Models\Sport;
use App\Models\TimeSlot;
use App\Models\Venue;
use App\Models\Field;
use App\Models\FieldSport;
use App\Models\VenueImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Owner/VenueManagement/CreateVenue/Index', [
            'user' => Auth::user()->user_id,
            'sportList' => Sport::select('sport_id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            // Store Venue
            $storeVenue = Venue::create([
                'owner_id'  => $request->userId,
                'name'      => $request->venueName,
                'address'   => $request->venueAddress,
                'latitude'  => $request->venueLocation['lat'],
                'longitude' => $request->venueLocation['lng'],
                'description'   => $request->venueDescription,
            ]);

            // Store Venue Image
            $venueImagePaths = [];
            foreach ($request->file('VenueImages') as $venueImage) {
                $venueImageName = $storeVenue->venue_id . '-' . \Str::uuid() . '.' . $venueImage->getClientOriginalExtension();

                $venueImagePath = $venueImage->storeAs('venue-images', $venueImageName, 'public');
                $venueImageUrl  = Storage::url($venueImagePath);

                $storeVenueUrl  = VenueImage::updateOrCreate(
                    ['venue_id'  => $storeVenue->venue_id],
                    ['image_url' => $venueImageUrl, 'pic_num' => 1]
                );

                $venueImagePaths[] = $venueImagePath;  // Save the path of the stored file
            }

            foreach ($request->fields as $field) {
                $storefields = Field::create([
                    'venue_id'  => $storeVenue->venue_id,
                    'name'      => $field['name'],
                    'image_url' => $field['imageUrl'],
                    'description' => "",
                ]);

                // Store Field Image
                $fieldImage = $field['image'];
                $fieldImageName = $storeFields->id . '-' . \Str::uuid() . '.' . $fieldImage->getClientOriginalExtension();
                $fieldImagePath = $fieldImage->storeAs('field-images', $fieldImageName, 'public');
                $fieldImageUrl  = Storage::url($fieldImagePath);
                $storeFieldUrl  = FieldImage::updateOrCreate(
                    ['field_id'  => $storeFields->id],
                    ['image_url' => $fieldImageUrl]
                );

                // Store Sports
                foreach ($field['sports'] as $sport) {
                    $storeFieldSports = FieldSport::create([
                        'field_id'    => $storeFields->id,
                        'sport_id'  => $sport,
                    ]);
                }
            }

            foreach ($request->venueOpenDay as $openDay) {
                foreach ($openDay['timeSlots'] as $timeSlot) {
                    $storeTimeSlot = TimeSlot::create([
                        'day'   => $openDay['name'],
                        'venue_id'   => $storeVenue->venue_id,
                        'start_time' => $timeSlot['startTime'],
                        'end_time'   => $timeSlot['endTime'],
                        'price'      => $timeSlot['price'],
                    ]);
                }
            }

            DB::commit();

            // return response()->json(['message' => 'Venue created successfully.'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            // return response()->json(['error' => 'An error occurred while creating the venue.', 'details' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fieldData = Field::with('fieldImages', 'fieldSports', 'venue.images')
            ->where('field_id', $id)
            ->get();

        $totalVenueImages = VenueImage::where('venue_id', $fieldData->first()->venue->venue_id)->count();

        return Inertia::render('Venues/VenueDetail', [
            'fields'    => $fieldData,
            'totalVenueImages'  => $totalVenueImages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
