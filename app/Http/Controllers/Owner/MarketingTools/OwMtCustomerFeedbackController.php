<?php

namespace App\Http\Controllers\Owner\MarketingTools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OwMtCustomerFeedbackController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/OwMarketingTools/OwMtCustomerFeedback');
    }
}
