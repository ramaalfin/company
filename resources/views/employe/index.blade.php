@extends('layouts.app')
@section('content')
    <section class="px-12 my-12">
        <h1 class="text-3xl text-center mb-10 font-bold">Data Pegawai {{ $nama_department ?? 'Rama Company' }}</h1>

        <div class="text-end pt-5 pb-4">
            @auth
                <a href="{{ route('employes.create') }}" class="btn btn-info text-white">Tambah Karyawan</a>
            @endauth
        </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $employe)
                    <tr>
                        <td>{{ $employes->firstItem() + $loop->iteration -1 }}</td>
                        <td><a href="{{ route('employes.show', ['employe' => $employe->id]) }}">{{ $employe->nip }}</a></td>
                        <td>{{ $employe->fullname }}</td>
                        <td>{{ $employe->email }}</td>
                        <td>{{ $employe->department->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="mx-auto mt-3">
                {!! $employes->links('vendor.pagination.tailwind') !!}
            </div>
        </div>
    </section>
@endsection
