<?php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        return view('about.faq', [
            'questions' => Question::all(),
        ]);
    }
}
