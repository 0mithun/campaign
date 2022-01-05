@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('View Email Template') }}</div>
            <div class="card-body">
                    <div class="row mb-3">
                        <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Template Name') }}</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control " name="name" readonly value="{{ $template->name }}" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="subject" class="col-md-2 col-form-label text-md-end">{{ __('Email Subject') }}</label>
                        <div class="col-md-8">
                            <input id="subject" type="text" class="form-control " name="subject" readonly value="{{ $template->subject }}" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="body" class="col-md-2 col-form-label text-md-end">{{ __('Email Body') }}</label>
                        <div class="col-md-8">
                            <textarea id="body" type="text" class="form-control" name="body" rows="8" readonly>{{ $template->body }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <a href="{{ route('templates.index') }}" class="btn btn-secondary">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
