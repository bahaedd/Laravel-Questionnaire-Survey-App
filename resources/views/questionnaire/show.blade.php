@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>
                    <div class="card-body">
                        {{ $questionnaire->purpose }}
                    </div>
                    <div class="card-footer" >
                        <a class=" btn btn-warning" href="/questionnaires/{{ $questionnaire->id }}/questions/create">New Question</a>
                        <a class=" btn btn-warning" href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}">Take Survey</a>
                    </div>
            </div>
                @foreach ($questionnaire->questions as $question)
                <div class="card mt-3">
                    <div class="card-header">{{ $question->question }}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($question->answers as $answer)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="">{{ $answer->answer }}</div>
                                        @if ($question->responses->count())
                                        <div class="">{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }} %</div>
                                        @endif
                                        
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">delete question</button>
                            </form>
                        </div>
                </div>

                @endforeach

        </div>
    </div>
</div>
@endsection
