<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class budgetOverviewController extends Controller
{
    public function index()
    {
        return view ('budgetOverview');
    }
}
