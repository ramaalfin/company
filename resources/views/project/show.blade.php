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

        <div class="container mt-2">
            <p>Karyawan yang mengerjakan project : </p>
            <ol class="list-decimal ms-4">
                @forelse ($project->employes->unique('id') as $employe)
                    <li>
                        <a href="{{ route('employes.show', ['employe' => $employe->id]) }}">
                            {{ $employe->fullname }} ({{ $employe->department->name }})
                        </a>
                    </li>
                @empty
                    <li>-</li>
                @endforelse
            </ol>
        </div>

        <div class="flex mt-4">
            @auth
                <a href="{{ route('tambah-department', ['project' => $project->id]) }}" class="btn btn-info me-2">Pilih Department</a>
                <a href="{{ route('tambah-employe', ['project' => $project->id]) }}" class="btn btn-warning">Pilih Karyawan</a>
            @endauth
        </div>

        {{-- <div class="container mt-2">
            <label for="num_of_selects">Jumlah department : </label>
            <input type="number" id="num_of_selects" name="num_of_selects">
            <div id="selects_container"></div>
        </div> --}}
        {{-- 1 --}}

    </section>
    {{-- <script>
        const numOfSelectsInput = document.getElementById('num_of_selects');
        const selectsContainer = document.getElementById('selects_container');

        numOfSelectsInput.addEventListener('change', (e) => {
            const numOfSelects = e.target.value;
            selectsContainer.innerHTML = '';
            for (let i = 0; i < numOfSelects; i++) {
                const select = document.createElement('select');
                selectsContainer.appendChild(select)

            }
        })
    </script> --}}
@endsection
