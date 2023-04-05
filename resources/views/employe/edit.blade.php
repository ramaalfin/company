@extends('layouts.app')
@section('content')
    <div class="pt-3">
        <h1>Form Edit Karyawan</h1>
    </div>

    <hr>

    <form action="{{ route('employes.update', ['employe' => $employe->id]) }}" method="POST">
        @method('PATCH')
        @include('employe.form', ['tombol' => 'Ubah'])
    </form>
@endsection
