<?php

namespace App\Http\Controllers\Owner\FieldManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FieldController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/FieldManagement/FieldList/Index');
    }

    public function fieldData()
    {

    }
}
