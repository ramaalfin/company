@extends('layouts.app')
@section('content')
<section class="px-12 my-12">
    <h1 class="text-3xl text-center mb-10 font-bold">Data Project Rama Company</h1>
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Deskripsi</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $projects->firstItem() + $loop->iteration -1 }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->finish_date }}</td>
                    <td>{{ $project->end_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="mx-auto mt-3">
            {!! $projects->links('vendor.pagination.tailwind') !!}
        </div>
    </div>
</section>
@endsection
