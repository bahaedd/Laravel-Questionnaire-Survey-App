@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/questionnaires/create" class="btn btn-dark">Create new Questionnaire</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">My questionnaires</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($questionnaires as $q)
                            <li class="list-group-item">
                                <a href="{{ $q->path() }}">{{ $q->title }}</a>
                                <div class="mt-2">
                                    <strong>Share URL</strong>
                                    <p>
                                        <a href="{{ $q->publicPath() }}">
                                            {{ $q->publicPath() }}
                                        </a>
                                    </p>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
