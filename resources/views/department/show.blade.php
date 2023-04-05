@extends('layouts.app')
@section('content')
    <section class="px-12">
        <h1 class="text-2xl mb-5">Detail Department</h1>
        <ul>
            <li>Nama : {{ $department->name }}</li>
            <li>Kepala department : {{ $department->kepala_department }}</li>
        </ul>
        @auth
            <div class="flex mt-3 gap-2">
                <a href="{{ route('departments.edit', ['department' => $department->id]) }}" class="btn btn-warning">
                    Edit
                </a>
                <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info" title="Hapus department"
                        data-name="{{ $department->name }}" data-table="department">
                        Hapus
                    </button>
                </form>
            </div>
        @endauth
    </section>
@endsection
