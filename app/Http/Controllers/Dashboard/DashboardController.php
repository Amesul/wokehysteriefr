<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    function index()
    {
        return view('dashboard.edit.index');
    }
}
