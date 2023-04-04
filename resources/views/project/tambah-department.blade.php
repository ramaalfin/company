@extends('layouts.app')
@section('content')
    <section class="px-12">
        <h1 class="text-2xl mb-5">Detail Project</h1>
        <ul>
            <li>Nama : {{ $project->name }}</li>
        </ul>
        <p>Daftar Department : </p>
        {{-- @foreach ($departments as $department)
            <label for="">{{ $department->name }}</label>
        @endforeach --}}
        <form action="{{ route('proses-tambah-department', $project->id) }}" method="post">
            @csrf
            @foreach ($departments as $department)
                <div class="mb-2">
                    <input type="checkbox" class="form-check-input" id="department-{{ $department->id }}" name="department[]"
                        value="{{ $department->id }}" @if (in_array($department->id, old('department') ?? ($departments_sudah_ambil ?? []))) checked @endif>

                    <label class="form-check-label" for="department-{{ $department->id }}">
                        {{ $department->name }}
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
