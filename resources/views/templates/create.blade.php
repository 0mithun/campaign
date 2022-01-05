@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Create New Template') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('templates.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="subject" class="col-md-2 col-form-label text-md-end">{{ __('Email Subject') }}</label>

                        <div class="col-md-8">
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" autofocus>

                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="body" class="col-md-2 col-form-label text-md-end">{{ __('Email Body') }}</label>

                        <div class="col-md-8">
                            <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" rows="8">{{ old('body') }}</textarea>

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Template') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
