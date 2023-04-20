@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1>Form Edit Project</h1>
</div>

<hr>

<form action="{{ route('projects.update', ['project' => $project->id]) }}" method="POST">
    @method('PATCH')
    @include('project.form', ['tombol' => 'Ubah'])
</form>
@endsection
