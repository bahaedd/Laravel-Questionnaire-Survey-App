@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Questionnaire</div>
                    <div class="card-body">
                            <form action="/questionnaires" method="POST" class="mx-3 my-3">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                                    <small id="titleHelp" class="form-text text-muted">Give a title for your Questionnaire.</small>
                                </div>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label for="purpose">Purpose</label>
                                    <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter purpose">
                                    <small id="purposeHelp" class="form-text text-muted">Give your questionnaire a purpose.</small>
                                </div>
                                @error('purpose')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
