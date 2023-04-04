@extends('layouts.app')
@section('content')
<section class="px-12">
    <h1 class="text-2xl mb-5">Detail Project</h1>
    <ul>
        <li>Nama : {{ $project->name }}</li>
    </ul>
    <p>Daftar Karyawan : </p>
    <form action="{{ route('proses-tambah-employe', ['project' => $project->id]) }}" method="post" class="mt-2">
        @csrf
        @foreach ($employes as $employe)
            <div class="mb-2">
                <input type="checkbox" class="form-check-input" name="employe[]" id="employe-{{ $employe->id }}" value="{{ $employe->id }}" @if (in_array($employe->id, old('employe') ?? ($employes_sudah_ambil ?? [])))
                    checked
                @endif>

                <label class="form-check-label" for="employe-{{ $employe->id }}">
                    {{ $employe->fullname }} ({{ $employe->department->name }})
                </label>

            </div>
        @endforeach
        <div class="row mt-4">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </div>
    </form>
</section>
@endsection
