@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="d-inline-block">
                    {{ __('Campaign') }}
                </h3>
                <a class="btn btn-primary" href="{{ route('campaigns.create') }}">Create New Campaign</a>
            </div>

            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:15%;">Name</th>
                            <th style="width:45%;">Emails</th>
                            <th style="width:15%;">Start Date</th>
                            <th style="width:5%;">Days</th>
                            <th style="width:20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($campaigns as $campaign)
                            <tr>
                                <td>{{ $campaign->name }}</td>
                                <td>{{ $campaign->emails }}</td>
                                <td>{{ $campaign->start_date->format('d-F-Y') }}</td>
                                <td>{{ $campaign->how_many_days }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                                        <a class="btn btn-dark" href="{{ route('campaigns.edit', $campaign) }}">Edit</a>
                                        <a class="btn btn-success" href="{{ route('campaigns.show', $campaign) }}">Set Schedule</a>

                                        <form method="POST" action="{{ route('campaigns.destroy', $campaign) }}" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No campaigns Found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $campaigns->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
