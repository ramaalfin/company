@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Tambah Department</h1>
</div>

<hr>

<form action="{{ route('departments.store') }}" method="POST">
    @include('department.form', ['tombol' => 'Tambah'])
</form>
@endsection
