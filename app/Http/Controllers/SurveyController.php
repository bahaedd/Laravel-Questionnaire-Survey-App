<?php

namespace App\Http\Controllers;

use App\Quationnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Quationnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');
        return view('survey.show', compact('questionnaire'));
    }

    public function store(Quationnaire $questionnaire)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email'
        ]);
        // dd($data);
        $servey = $questionnaire->surveys()->create($data['survey']);
        $servey->responses()->createMany($data['responses']);

        return 'Thank you !';
    }

}
