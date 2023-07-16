<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Providers\Purifier;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('about.faq', [
            'questions' => Question::all(),
        ]);
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('dashboard.edit.faq.create');
    }

    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $attributes = $request->validate([
            'question' => ['required', 'string'],
            'answer' => 'required',
        ]);

        $attributes['answer'] = Purifier::clean($request['answer']);

        Question::create($attributes);

        return redirect('/dashboard/edit')->with('success', 'Question ajoutée');
    }

    public function edit(Question $question): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('dashboard.edit.faq.edit', [
            'question' => $question,
        ]);

    }

    public function update(Question $question, Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $attributes = $request->validate([
            'question' => ['required', 'string'],
            'answer' => 'required',
        ]);

        $attributes['answer'] = Purifier::clean($request['answer']);

        $question->update($attributes);

        return redirect('/dashboard/edit')->with('success', 'Question modifiée');
    }

    public function destroy(Question $question): \Illuminate\Http\RedirectResponse
    {
        $question->delete();
        return back()->with('danger', 'Question supprimée');
    }
}
