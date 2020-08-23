<?php

namespace App\Http\Controllers;

use App\Quationnaire;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Quationnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Quationnaire $questionnaire)
    {
        // dd(request()->all());

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function destroy(Quationnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }
}
