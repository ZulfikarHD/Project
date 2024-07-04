<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OwUserManagementController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/OwUserManagement');
    }
}
