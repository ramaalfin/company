@extends('layouts.app')
@section('content')
    <section class="px-12">
        <h1 class="text-2xl mb-5">Biodata Karyawan</h1>
        <ul>
            <li>NIP : {{ $employe->nip }}</li>
            <li>Nama : {{ $employe->fullname }}</li>
            <li>Email : {{ $employe->email }}</li>
            <li>Department : {{ optional($employe->department)->name }}</li>
            <li>Gender : {{ $employe->gender }}</li>
            <li>Phone Number : {{ $employe->phone_number }}</li>
            <li>Address : {{ $employe->address }}</li>
        </ul>
        <div class="mt-2">
            <p>Project yang dikerjakan : </p>
            <ol class="list-decimal ms-4">
                @foreach ($projects->unique('id') as $project)
                    <li>
                        <a href="{{ route('projects.show', ['project' => $project->id]) }}">
                            {{ $project->name }}
                            ({{ implode(', ',$project->departments->pluck('name')->unique()->toArray()) }})
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
        <div class="container flex mt-4 gap-2">
            @auth
                <a href="{{ route('ambil-project', ['employe' => $employe->id]) }}" class="btn btn-info">Pilih Project</a>
                <a href="{{ route('ambil-department', ['employe' => $employe->id]) }}" class="btn btn-warning">Pilih
                    Department</a>
            @endauth
        </div>
        {{-- 1 --}}

    </section>
@endsection
