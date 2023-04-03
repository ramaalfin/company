@extends('layouts.app')
@section('content')
    <section class="px-12">
        <h1 class="text-2xl mb-5">Biodata {{ $employe->fullname }}</h1>
        <ul>
            <li>NIP : {{ $employe->nip }}</li>
            <li>Nama : {{ $employe->fullname }}</li>
            <li>Email : {{ $employe->email }}</li>
            <li>Department : {{ $employe->department->name }}</li>
        </ul>
        <p class="my-5">Daftar Project di department {{ $department->name }}</p>
        <form action="{{ route('proses-ambil-project', $employe->id) }}" method="post">
            @csrf
            <div class="row">
                @error('project.*')
                    <div class="invalid-feedback my-3 block">
                        <strong>Error: Pilihan mata kuliah ada yang berulang / bukan dari department
                            {{ $employe->department->nama }}</strong>
                    </div>
                @enderror
                <div class="col-md-12">
                    @foreach ($projects as $project)
                        <div class="mb-2">
                            <input type="checkbox" class="form-check-input" id="project-{{ $project->id }}" name="project[]" value="{{ $project->id }}"
                                @if (in_array($project->id, old('project') ?? ($projects_sudah_diambil ?? [])))
                                    checked
                                @endif>

                            <label class="form-check-label" for="project-{{ $project->id }}">
                                {{ $project->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Daftarkan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
