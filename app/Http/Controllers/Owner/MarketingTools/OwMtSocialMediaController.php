<?php

namespace App\Http\Controllers\Owner\MarketingTools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OwMtSocialMediaController extends Controller
{
    public function index()
    {
        return Inertia::render('Owner/OwMarketingTools/OwMtSocialMedia');
    }
}
