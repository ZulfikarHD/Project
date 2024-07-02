<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OwBookingManagementController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/OwBookingManagement');
    }
}
