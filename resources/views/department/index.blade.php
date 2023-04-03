@extends('layouts.app')
@section('content')
    <section class="px-12 my-12">
        <h1 class="text-3xl text-center mb-10 font-bold">Sistem Informasi Rama Company</h1>

        <div class="text-end pt-5 pb-4">
            @auth
                <a href="{{ route('departments.create') }}" class="btn btn-info text-white">Tambah Department</a>
            @endauth
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 justify-center">
            @foreach ($departments as $department)
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{ $department->name }}</h2>
                        <p>{{ $department->kepala_department }}</p>
                        <div class="card-actions justify-center">
                            <a class="btn btn-primary" href="{{ route('department-employe', ['id' => $department->id]) }}">Employees</a>
                            <a class="btn btn-warning" href="{{ route('department-project', ['id' => $department->id]) }}">Projects</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
