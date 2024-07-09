<?php

namespace App\Http\Controllers\Owner\FinancialManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OwFmRevenueController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/OwFinancialManagement/OwFmRevenue');
    }
}
