@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Tambah Karyawan</h1>
</div>

<hr>

<form action="{{ route('employes.store') }}" method="POST">
    @include('employe.form', ['tombol' => 'Tambah'])
</form>
@endsection
