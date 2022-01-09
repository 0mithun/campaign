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
                        <div class="row mb-5">
                            <div class="col-md-3">
                                Day {{ $loop->iteration }} {{ $day->date->format('d-M-Y') }}
                            </div>
                            <div class="col-md-5">
                                <div class="d-flex justify-content-end mb-2">
                                    <a class="btn btn-primary btn-sm" href="{{ route('days.schedules.create', $day) }}">Create New Schedule</a>
                                </div>
                                <table class="table">
                                    @forelse ($day->times as $time)
                                        <tr>
                                            <td>{{ $time->template->name }}</td>
                                            <td>{{ $time->time_formated }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('days.schedules.destroy', [$day->id, $time->id]) }}" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Schedule Found...</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <br>
                    @empty
                        <p colspan="6" class="text-center">No days Found.</p>
                    @endforelse
                    {{ $days->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
