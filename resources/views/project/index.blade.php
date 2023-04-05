@extends('layouts.app')
@section('content')
<section class="px-12 my-12">
    <h1 class="text-3xl text-center mb-10 font-bold">Data Project Rama Company</h1>

    <div class="text-end pt-5 pb-4">
        @auth
            <a href="{{ route('projects.create') }}" class="btn btn-info text-white">Tambah Project</a>
        @endauth
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>Finish Date</th>
                    <th>End Date</th>
                    @auth
                        <th>Action</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $projects->firstItem() + $loop->iteration -1 }}</td>
                    <td><a href="{{ route('projects.show', ['project' => $project->id]) }}">{{ $project->name }}</a></td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->finish_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    @auth
                        <td>
                            <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Hapus project"
                                    data-name="{{ $project->name }}" data-table="project">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    @endauth
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
