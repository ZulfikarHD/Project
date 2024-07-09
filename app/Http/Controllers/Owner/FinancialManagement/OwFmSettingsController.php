<?php

namespace App\Http\Controllers\Owner\FinancialManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OwFmSettingsController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/OwFinancialManagement/OwFmSettings');
    }
}
