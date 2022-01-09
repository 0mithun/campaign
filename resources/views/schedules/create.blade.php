@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Create New Schedule') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('days.schedules.store', $day) }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="template_id" class="col-md-2 col-form-label text-md-end">{{ __('Template Name') }}</label>
                        <div class="col-md-4">
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
                        <label for="time" class="col-md-2 col-form-label text-md-end">{{ __('Time') }}</label>
                        <div class="col-md-4">
                            <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" >
                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Schedule') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
