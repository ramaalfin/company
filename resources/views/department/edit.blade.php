@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Edit Department</h1>
</div>

<hr>

<form action="{{ route('departments.update', ['department' => $department->id]) }}" method="POST">
    @method('PATCH')
    @include('department.form', ['tombol' => 'Ubah'])
</form>
@endsection
