@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Tambah Project</h1>
</div>

<hr>

<form action="{{ route('projects.store') }}" method="POST">
    @include('project.form', ['tombol' => 'Tambah'])
</form>
@endsection
