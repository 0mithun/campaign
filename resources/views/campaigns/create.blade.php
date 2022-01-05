@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Create New Campaign') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('campaigns.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="template_id" class="col-md-2 col-form-label text-md-end">{{ __('Template Name') }}</label>

                        <div class="col-md-8">
                            <select name="template_id" id="template_id" class="form-control @error('template_id') is-invalid @enderror" name="template_id">
                                <option value="" selected>Please select template...</option>
                                @foreach ($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                            @error('template_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date" class="col-md-2 col-form-label text-md-end">{{ __('Campaign Date') }}</label>
                        <div class="col-md-8">
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" >
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="times" class="col-md-2 col-form-label text-md-end">{{ __('Interval Times') }}</label>
                        <div class="col-md-8">
                            <input id="times" type="number" min="1" class="form-control @error('times') is-invalid @enderror" name="times" value="{{ old('times', 1) }}" >
                            @error('times')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="emails" class="col-md-2 col-form-label text-md-end">{{ __('Email Addresses') }}</label>
                        <div class="col-md-8">
                            <textarea id="emails" type="text" class="form-control @error('emails') is-invalid @enderror" name="emails" rows="3">{{ old('emails') }}</textarea>
                            <div id="emailsHelp" class="form-text">Please input email with comma seperate.</div>
                            @error('emails')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Campaign') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
