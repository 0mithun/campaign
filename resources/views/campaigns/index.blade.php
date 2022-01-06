@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-11">
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
                            <th>#</th>
                            <th width="20%">Template Name</th>
                            <th width="30%">Emails</th>
                            <th width="20%">Date</th>
                            <th width="5%">Times</th>
                            <th width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($campaigns as $campaign)
                            <tr>
                                <td>{{ $campaign->id }}</td>
                                <td>{{ $campaign->template->name }}</td>
                                <td>{{ $campaign->emails }}</td>
                                <td>{{ $campaign->date->format('d-F-Y') }}</td>
                                <td>{{ $campaign->times }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                                        <a class="btn btn-dark" href="{{ route('campaigns.edit', $campaign) }}">Edit</a>
                                        <a class="btn btn-success" href="{{ route('campaigns.show', $campaign) }}">View</a>

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
