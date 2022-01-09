@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('View Campaign') }}</div>
            <div class="card-body">
{{--
                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Campaign Name') }}</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $campaign->name }}"  readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date" class="col-md-2 col-form-label text-md-end">{{ __('Start Date') }}</label>
                    <div class="col-md-8">
                        <input id="date" type="date" class="form-control" name="date" value="{{ $campaign->start_date->format('Y-m-d') }}"  readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="how_many_days" class="col-md-2 col-form-label text-md-end">{{ __('How Many Days?') }}</label>
                    <div class="col-md-8">
                        <input id="how_many_days" type="number" min="1" class="form-control " name="how_many_days" value="{{ $campaign->how_many_days }}" readonly>
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
                </div> --}}

                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @forelse ($days as $day)
                        <div class="accordion" id="day-{{ $loop->iteration }}">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $loop->iteration }}">
                                <button class="accordion-button @if($loop->iteration !== 1) collapsed  @endif" type="button" data-bs-toggle="collapse" data-bs-target="#schedule-{{ $loop->iteration }}" aria-expanded="true" aria-controls="schedule-{{ $loop->iteration }}">
                                    {{ $day->date->format('M-d-Y') }}
                                </button>
                            </h2>
                            <div id="schedule-{{ $loop->iteration }}" class="accordion-collapse collapse @if($loop->iteration == 1) show  @endif" aria-labelledby="headingOne" data-bs-parent="#day-{{ $loop->iteration }}">
                                <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                            </div>
                        </div>
                    @empty
                        <p colspan="6" class="text-center">No days Found.</p>
                    @endforelse
                    {{ $days->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
