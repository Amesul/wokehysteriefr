<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Providers\Purifier;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('about.faq', [
            'questions' => Question::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.edit.faq.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'question' => ['required', 'string'],
            'answer' => 'required',
        ]);

        $attributes['answer'] = Purifier::clean($request['answer']);

        Question::create($attributes);

        return redirect('/dashboard/edit')->with('success', 'Question ajoutée');
    }

    public function edit(Question $question)
    {
        return view('dashboard.edit.faq.edit', [
            'question' => $question,
        ]);

    }

    public function update(Question $question, Request $request)
    {
        $attributes = $request->validate([
            'question' => ['required', 'string'],
            'answer' => 'required',
        ]);

        $attributes['answer'] = Purifier::clean($request['answer']);

        $question->update($attributes);

        return redirect('/dashboard/edit')->with('success', 'Question modifiée');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('danger', 'Question supprimée');
    }
}
