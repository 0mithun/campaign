@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="d-inline-block">
                    {{ __('Template') }}
                </h3>
                <a class="btn btn-primary" href="{{ route('templates.create') }}">Create New Template</a>
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
                            <th width="5%">#</th>
                            <th width="20%">Name</th>
                            <th width="20%">Subject</th>
                            <th width="35%">Body</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($templates as $template)
                            <tr>
                                <td>{{ $template->id }}</td>
                                <td>{{ $template->name }}</td>
                                <td>{{ $template->subject }}</td>
                                <td>{{ $template->body }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                                        <a class="btn btn-dark" href="{{ route('templates.edit', $template) }}">Edit</a>
                                        <a class="btn btn-success" href="{{ route('templates.show', $template) }}">View</a>

                                        <form method="POST" action="{{ route('templates.destroy', $template) }}" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Templates Found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $templates->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
