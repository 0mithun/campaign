@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-10">
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
                            <th>#</th>
                            <th>Subject</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($templates as $template)
                            <tr>
                                <td>{{ $template->id }}</td>
                                <td>{{ $template->subject }}</td>
                                <td>{{ $template->body }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
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
                                <td colspan="3">No Templates Found.</td>
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
