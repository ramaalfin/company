@extends('layouts.app')

@section('content')
{{-- @foreach ($projects as $project) --}}
    <h2>{{ $project->name }}</h2>
    <ul>
        @foreach ($project->departments as $department)
            <p>{{ $department->name }}</p>
        @endforeach
    </ul>
{{-- @endforeach --}}
@endsection
