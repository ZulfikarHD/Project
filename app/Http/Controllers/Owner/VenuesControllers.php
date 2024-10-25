<?php

namespace App\Http\Controllers\Owner;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venue;
use App\Models\Field;
use App\Models\TimeSlot;

class VenuesController extends Controller
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
    * Store a newly created venue in storage.
    */
   public function store(Request $request)
   {
        dd($request->all());
        // Venue::create([
        //     'name' => $request->venueName,
        // ]);
        // dd($request->all());
    //    // Validate the incoming data
    //    $validatedData = $request->validate([
    //        'name' => 'required|string|max:255',
    //        'address' => 'required|string|max:500',
    //        'location.lat' => 'required|numeric',
    //        'location.lng' => 'required|numeric',
    //        'description' => 'nullable|string|max:1000',
    //        'pictures.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Max 5MB per image

    //        'fields' => 'required|array',
    //        'fields.*.name' => 'required|string|max:255',
    //        'fields.*.sports' => 'nullable|array',
    //        'fields.*.sports.*' => 'integer',
    //        'fields.*.equipment' => 'nullable|array',
    //        'fields.*.equipment.*.name' => 'required|string|max:255',
    //        'fields.*.equipment.*.quantity' => 'required|integer',
    //        'fields.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',

    //        'availability' => 'required|array',
    //        'availability.*.name' => 'required|string',
    //        'availability.*.timeSlots' => 'required|array',
    //        'availability.*.timeSlots.*.startTime' => 'required|string',
    //        'availability.*.timeSlots.*.endTime' => 'required|string',
    //        'availability.*.timeSlots.*.price' => 'required|numeric',
    //    ]);

    //    DB::beginTransaction();

    //    try {
    //        // Create the venue
    //        $venue = new Venue();
    //        $venue->name = $validatedData['name'];
    //        $venue->address = $validatedData['address'];
    //        $venue->location = json_encode([
    //            'lat' => $validatedData['location']['lat'],
    //            'lng' => $validatedData['location']['lng'],
    //        ]);
    //        $venue->description = $validatedData['description'] ?? null;
    //        $venue->owner_id = auth()->id(); // Assuming the owner is the authenticated user
    //        $venue->save();

    //        // Handle venue pictures
    //        if ($request->hasFile('pictures')) {
    //            $picturePaths = [];
    //            foreach ($request->file('pictures') as $picture) {
    //                $path = $picture->store('venue_pictures', 'public');
    //                $picturePaths[] = $path;
    //            }
    //            $venue->pictures = json_encode($picturePaths);
    //            $venue->save();
    //        }

    //        // Create the fields
    //        foreach ($validatedData['fields'] as $fieldData) {
    //            $field = new Field();
    //            $field->venue_id = $venue->id;
    //            $field->name = $fieldData['name'];
    //            $field->sports = json_encode($fieldData['sports'] ?? []);
    //            $field->equipment = json_encode($fieldData['equipment'] ?? []);
    //            if (isset($fieldData['image'])) {
    //                $imagePath = $fieldData['image']->store('field_images', 'public');
    //                $field->image_url = $imagePath;
    //            }
    //            $field->save();
    //        }

    //        // Handle availability and pricing
    //        foreach ($validatedData['availability'] as $dayData) {
    //            foreach ($dayData['timeSlots'] as $timeSlotData) {
    //                $timeSlot = new TimeSlot();
    //                $timeSlot->venue_id = $venue->id;
    //                $timeSlot->day = $dayData['name'];
    //                $timeSlot->start_time = $timeSlotData['startTime'];
    //                $timeSlot->end_time = $timeSlotData['endTime'];
    //                $timeSlot->price = $timeSlotData['price'];
    //                $timeSlot->save();
    //            }
    //        }

    //        DB::commit();

    //        return response()->json(['message' => 'Venue created successfully.'], 201);
    //    } catch (\Exception $e) {
    //        DB::rollBack();
    //        return response()->json(['error' => 'An error occurred while creating the venue.', 'details' => $e->getMessage()], 500);
    //    }
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
