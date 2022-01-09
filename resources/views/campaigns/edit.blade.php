@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Edit Campaign') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('campaigns.update', $campaign) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Campaign Name') }}</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $campaign->name }}" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="start_date" class="col-md-2 col-form-label text-md-end">{{ __('Start Date') }}</label>
                        <div class="col-md-8">
                            <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $campaign->start_date->format('Y-m-d') }}" >
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="how_many_days" class="col-md-2 col-form-label text-md-end">{{ __('How Many Days?') }}</label>
                        <div class="col-md-8">
                            <input id="how_many_days" type="number" min="1" class="form-control @error('how_many_days') is-invalid @enderror" name="how_many_days" value="{{ $campaign->how_many_days }}" >
                            @error('how_many_days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="emails" class="col-md-2 col-form-label text-md-end">{{ __('Email Addresses') }}</label>
                        <div class="col-md-8">
                            <textarea id="emails" type="text" class="form-control @error('emails') is-invalid @enderror" name="emails" rows="3">{{ $campaign->emails }}</textarea>
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
                                {{ __('Update Campaign') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
