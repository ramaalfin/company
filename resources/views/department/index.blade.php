@extends('layouts.app')
@section('content')
    <section class="px-12 my-12">
        <h1 class="text-3xl text-center mb-10 font-bold">Sistem Informasi Rama Company</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 justify-center">
            @foreach ($departments as $department)
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{ $department->name }}</h2>
                        <p>{{ $department->kepala_department }}</p>
                        <div class="card-actions justify-center">
                            <a class="btn btn-primary">Employees</a>
                            <a class="btn btn-warning">Projects</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
