@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('View Campaign') }}</div>
            <div class="card-body">
                <div class="row mb-3">
                    <label for="template_id" class="col-md-2 col-form-label text-md-end">{{ __('Template Name') }}</label>
                    <div class="col-md-8">
                        <select name="template_id" id="template_id" class="form-control" name="template_id" readonly disabled>
                            <option value=""  selected >{{ $campaign->template->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date" class="col-md-2 col-form-label text-md-end">{{ __('Campaign Date') }}</label>
                    <div class="col-md-8">
                        <input id="date" type="date" class="form-control" name="date" value="{{ $campaign->date->format('Y-m-d') }}"  readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="times" class="col-md-2 col-form-label text-md-end">{{ __('Times') }}</label>
                    <div class="col-md-8">
                        <input id="times" type="number" min="1" class="form-control " name="times" value="{{ $campaign->times }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="emails" class="col-md-2 col-form-label text-md-end">{{ __('Email Addresses') }}</label>
                    <div class="col-md-8">
                        <textarea id="emails" type="text" class="form-control " name="emails" rows="3" readonly>{{ $campaign->emails }}</textarea>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-2">
                        <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
