@extends('layouts.app')
@section('content')
    <section class="px-12">
        <h1 class="text-2xl mb-5">Biodata Pegawai</h1>
        <ul>
            <li>NIP : {{ $employe->nip }}</li>
            <li>Nama : {{ $employe->fullname }}</li>
            <li>Email : {{ $employe->email }}</li>
            <li>Department : {{ $employe->department->name }}</li>
            <li>Gender : {{ $employe->gender }}</li>
            <li>Phone Number : {{ $employe->phone_number }}</li>
            <li>Address : {{ $employe->address }}</li>
        </ul>
        <div class="container mt-2">
            <p>Project yang dikerjakan : </p>
            <ol class="list-decimal ms-4">
                @foreach ($employe->projects->unique('id') as $project)
                    <li><a href="{{ route('projects.show', ['project' => $project->id]) }}">{{ $project->name }}</a></li>
                @endforeach
            </ol>
        </div>
        {{-- 1 --}}

    </section>
@endsection
