@extends('layouts.app')
@section('content')
    <section class="px-12">
        <h1 class="text-2xl mb-5">Detail Project</h1>
        <ul>
            <li>Nama : {{ $project->name }}</li>
            <li>Deskripsi : {{ $project->description }}</li>
            <li>Start date : {{ $project->start_date }}</li>
            <li>Finish date : {{ $project->finish_date }}</li>
            <li>End date : {{ $project->end_date }}</li>
        </ul>
        <div class="container mt-2">
            <p>Department yang mengambil project : </p>
            <ol class="list-decimal ms-4">
                @forelse ($project->departments->unique('id') as $department)
                    <li><a href="{{ route('department-project', ['id' => $department->id]) }}">{{ $department->name }}</a></li>
                @empty
                    <li>-</li>
                @endforelse
            </ol>
        </div>
        {{-- 1 --}}

    </section>
@endsection
