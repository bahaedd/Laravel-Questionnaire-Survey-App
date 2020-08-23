<?php

namespace App\Http\Controllers;

use App\Quationnaire;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class QuetionnaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' =>'required'
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function show(Quationnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');
        return view('questionnaire.show', compact('questionnaire'));
    }
}
