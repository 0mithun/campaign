@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('View Campaign') }}</div>
            <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}clear
                        </div>
                    @endif
                    @forelse ($days as $day)
                        <div class="accordion" id="day-{{ $loop->iteration }}">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $loop->iteration }}">
                                <button class="accordion-button @if($loop->iteration !== 1) collapsed  @endif" type="button" data-bs-toggle="collapse" data-bs-target="#schedule-{{ $loop->iteration }}" aria-expanded="true" aria-controls="schedule-{{ $loop->iteration }}">
                                    {{ $day->date->format('d-M-Y') }}
                                </button>
                            </h2>
                            <div id="schedule-{{ $loop->iteration }}" class="accordion-collapse collapse @if($loop->iteration == 1) show  @endif" aria-labelledby="headingOne" data-bs-parent="#day-{{ $loop->iteration }}">
                                <div class="accordion-body">
                                    <div class="d-flex justify-content-end mb-2">
                                        <a class="btn btn-primary" href="{{ route('campaigns.create') }}">Create New Campaign</a>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Template</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @forelse ($day->times as $time)
                                               <tr>
                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>{{ $time->template->name }}</td>
                                                   <td>{{ $time->time }}</td>
                                               </tr>
                                           @empty
                                               <tr>
                                                   <td colspan="3">No Schedule Found...</td>
                                               </tr>
                                           @endforelse
                                        </tbody>
                                    </table>
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
