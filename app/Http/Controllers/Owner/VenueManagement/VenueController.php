<?php

namespace App\Http\Controllers\Owner\VenueManagement;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use App\Models\TimeSlot;
use App\Models\Venue;
use App\Models\VenueField;
use App\Models\VenueFieldSport;
use App\Models\VenuePicture;
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
        return Inertia::render('Owner/VenueMgmt/AddVenue/Index', [
            'user' => Auth::user()->user_id,
            'sportList' => Sport::select('sport_id','name')->get(),
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
            foreach($request->file('venuePictures') as $venueImage)
            {
                $venueImageName = $storeVenue->venue_id . '-' . \Str::uuid() . '.' .$venueImage->getClientOriginalExtension();

                $venueImagePath = $venueImage->storeAs('venue-images', $venueImageName ,'public');
                $venueImageUrl  = Storage::url($venueImagePath);

                $storeVenueUrl  = VenuePicture::updateOrCreate(
                                        ['venue_id'  => $storeVenue->venue_id],
                                        ['image_url' => $venueImageUrl,'pic_num' => 1]
                                    );

                $venueImagePaths[] = $venueImagePath;  // Save the path of the stored file
            }

            foreach ($request->venueFields as $field) {
                $storeVenueFields = VenueField::create([
                    'venue_id'  => $storeVenue->venue_id,
                    'name'      => $field['name'],
                    'image_url' => $field['imageUrl'],
                    'description' => "",
                ]);

                foreach ($field['sports'] as $sport) {
                    $storeVenueFieldSports = VenueFieldSport::create([
                        'venue_field_id'    => $storeVenueFields->id,
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

            return response()->json(['message' => 'Venue created successfully.'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating the venue.', 'details' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
