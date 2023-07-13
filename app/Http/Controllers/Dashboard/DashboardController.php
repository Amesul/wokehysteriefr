<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Question;

class DashboardController extends Controller
{
    function index()
    {
        return view('dashboard.edit.index', [
            'episode' => Episode::findLatest(),
            'questions' => Question::all(),
        ]);
    }
}
