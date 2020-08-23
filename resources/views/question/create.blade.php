@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Question</div>
                    <div class="card-body">
                            <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="POST" class="mx-3 my-3">
                                @csrf
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input name="question[question]" type="text" value="{{ old('question.question') }}"
                                     class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter Question">
                                    <small id="questionHelp" class="form-text text-muted">Enter your question.</small>
                                </div>
                                @error('question.question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                   <fieldset>
                                       <legend>Choices</legend>
                                       <small id="choicesHelp" class="form-text text-muted">Give a choice.</small>
                                       <div>
                                            <div class="form-group">
                                                <label for="answer1">Choice 1</label>
                                                <input name="answers[][answer]" type="text" class="form-control" value="{{ old('answers.0.answer') }}"
                                                id="answer1" aria-describedby="choicesHelp" placeholder="Enter Choice 1">
                                            </div>
                                            @error('answers.0.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                       </div>

                                       <div>
                                            <div class="form-group">
                                                <label for="answer2">Choice 2</label>
                                                <input name="answers[][answer]" type="text" class="form-control" value="{{ old('answers.1.answer') }}"
                                                id="answer2" aria-describedby="choicesHelp" placeholder="Enter Choice 2">
                                            </div>
                                            @error('answers.1.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div>
                                            <div class="form-group">
                                                <label for="answer3">Choice 3</label>
                                                <input name="answers[][answer]" type="text" class="form-control" value="{{ old('answers.2.answer') }}"
                                                id="answer3" aria-describedby="choicesHelp" placeholder="Enter Choice 3">
                                            </div>
                                            @error('answers.2.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div>
                                            <div class="form-group">
                                                <label for="answer4">Choice 4</label>
                                                <input name="answers[][answer]" type="text" class="form-control"  value="{{ old('answers.3.answer') }}"
                                                id="answer4" aria-describedby="choicesHelp" placeholder="Enter Choice 4">
                                            </div>
                                            @error('answers.3.answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                   </fieldset>
                                </div>

                                <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
