<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Venue;
use App\Models\VenueField;
use App\Models\TimeSlot;

class OwVenuesController extends Controller
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
        return Inertia::render('Owner/VenueMgmt/AddVenue/Index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


    // Step 1: Store Venue Basic Information
    public function storeBasicInfo(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:500',
            'description' => 'nullable|string|max:1000',
            'capacity' => 'required|integer',
            'amenities' => 'nullable|array',
            'owner_id' => 'required|exists:venue_owners,owner_id', // Foreign key validation
        ]);

        // Create a new venue
        $venue = Venue::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'capacity' => $request->input('capacity'),
            'amenities' => json_encode($request->input('amenities', [])), // Store amenities as JSON
            'owner_id' => $request->input('owner_id'), // Link to venue owner
        ]);

        return response()->json(['venue_id' => $venue->venue_id, 'message' => 'Venue info stored successfully.'], 201);
    }

    // Step 2: Store Fields (Facility) Information
    public function storeFields(Request $request, $venueId)
    {
        $venue = Venue::findOrFail($venueId);

        $request->validate([
            'fields' => 'required|array',
            'fields.*.name' => 'required|string|max:255',
            'fields.*.sports' => 'nullable|array', // Sports as array
            'fields.*.equipment' => 'nullable|array', // Equipment as array
            'fields.*.imageUrl' => 'nullable|string', // Image URL for field
        ]);

        foreach ($request->input('fields') as $fieldData) {
            VenueField::create([
                'venue_id' => $venue->venue_id,
                'name' => $fieldData['name'],
                'sports' => json_encode($fieldData['sports'] ?? []),
                'equipment' => json_encode($fieldData['equipment'] ?? []),
                'image_url' => $fieldData['imageUrl'] ?? null, // Handle optional image URL
            ]);
        }

        return response()->json(['message' => 'Fields stored successfully.'], 201);
    }


    // Step 3: Store Availability and Pricing
    public function storeAvailability(Request $request, $venueId)
    {
        $venue = Venue::findOrFail($venueId);

        $request->validate([
            'days' => 'required|array',
            'days.*.timeSlots' => 'array',
            'days.*.timeSlots.*.startTime' => 'required|string',
            'days.*.timeSlots.*.endTime' => 'required|string',
            'days.*.timeSlots.*.price' => 'required|numeric',
        ]);

        foreach ($request->input('days') as $dayData) {
            foreach ($dayData['timeSlots'] as $timeSlotData) {
                TimeSlot::create([
                    'venue_id' => $venue->venue_id,
                    'day' => $dayData['name'], // Assuming day name (e.g., "Monday")
                    'start_time' => $timeSlotData['startTime'],
                    'end_time' => $timeSlotData['endTime'],
                    'price' => $timeSlotData['price'],
                ]);
            }
        }

        return response()->json(['message' => 'Availability and pricing stored successfully.'], 201);
    }

    // Step 4: Final Submission (Summary)
    public function submitVenue($venueId)
    {
        $venue = Venue::findOrFail($venueId);
        $venue->is_published = true;
        $venue->save();

        return response()->json(['message' => 'Venue submitted successfully.'], 200);
    }
}
