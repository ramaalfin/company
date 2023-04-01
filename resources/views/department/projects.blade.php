@extends('layouts.app')

@section('content')
    <section class="px-12">
        <h1>Nama department : {{ $department->name }}</h1>
        <p>Project - project : </p>
        {{-- 1 --}}
        <ol class="list-decimal">
            @foreach ($projects as $project)
                <li>
                    <h2>Nama Project: {{ $project->name }}</h2>
                </li>
                <ul class="list-disc">
                    {{-- Tampilkan 1 nama department jika terdapat data duplikat --}}
                    @foreach ($project->departments->unique('id') as $department)
                        <li>{{ $department->name }}</li>
                    @endforeach
                </ul>
                <br>
            @endforeach
        </ol>
    </section>
@endsection
