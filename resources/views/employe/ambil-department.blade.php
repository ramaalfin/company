@extends('layouts.app')
@section('content')
    <h1 class="text-2xl mb-5">Biodata {{ $employe->fullname }}</h1>
    <ul>
        <li>NIP : {{ $employe->nip }}</li>
        <li>Nama : {{ $employe->fullname }}</li>
        <li>Email : {{ $employe->email }}</li>
    </ul>
    <p>Pilih Department: </p>
    <form action="{{ route('proses-ambil-department', $employe->id) }}" method="post">
        @csrf
        @foreach ($departments as $department)
            <div class="mb-2">
                <input type="radio" class="form-check-input" id="department-{{ $department->id }}" name="department[]"
                    value="{{ $department->id }}" {{ $employe->department_id == $department->id ? 'checked' : '' }}>

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
@endsection
