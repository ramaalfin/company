<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('project.index', [
            'projects' => Project::orderByDesc('created_at')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|min:3',
            'start_date' => "nullable|date",
            'end_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
        ]);
        Project::create($validated);
        return redirect('/projects');
    }

    public function uploadImage(Request $request)
    {
        $project = new Project();
        $project->id = 0;
        $project->exists = true;
        $images = $project->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $images->getUrl()
        ]);
    }

    public function tambahDepartment(Project $project)
    {
        return view('project.tambah-department', [
            'project' => $project,
            'departments' => Department::orderBy('name')->get(), //* ambil semua nama department
            'departments_sudah_ambil' => $project->departments->pluck('id')->all() //* Buat array dari daftar department yang sudah di ambil employe
        ]);
    }

    public function prosesTambahDepartment(Request $request, Project $project)
    {
        $departments = Department::with('projects')->get(); //*akan mengambil semua data department beserta data projects
        $department_project = $departments->pluck('id')->toArray(); //*mengambil nilai id dari masing-masing department dan diubah menjadi array menggunakan fungsi toArray().
        $validated = $request->validate([
            'department.*' => 'distinct|in:'.implode(', ', $department_project) //* jika id department yang dipilih ada di dalam syarat 'in', maka akan lolos validasi.
        ]);
        $project->departments()->sync($validated['department'] ?? []); //*menyinkronkan data project yang terhubung dengan employe yang sedang diedit pada form edit employe.
        return redirect(route('projects.show', ['project' => $project->id]));
    }


    public function tambahEmploye(Project $project)
    {
        // ambil karyawan yang sesuai dengan departmentnya
        return view('project.tambah-employe', [
            'project' => $project,
            'employes' => Employe::whereHas('department')->orderBy('fullname')->get(), //* ambil employe
            'employes_sudah_ambil' => $project->employes->pluck('id')->all(), //* Buat array dari daftar employe yang sudah ambil project
        ]);
    }

    public function prosesTambahEmploye(Request $request, Project $project)
    {
        $employes = Employe::with('projects')->get(); //*akan mengambil semua data employe beserta data projects
        $employe_project = $employes->pluck('id')->toArray(); //*mengambil nilai id dari masing-masing employe dan diubah menjadi array menggunakan fungsi toArray().
        $validated = $request->validate([
            'employe.*' => 'distinct|in:'.implode(', ', $employe_project) //* jika id employe yang dipilih ada di dalam syarat 'in', maka akan lolos validasi.
        ]);
        $project->employes()->sync($validated['employe' ?? []]); //*menyinkronkan data employe yang terhubung dengan project yang sedang diedit pada form edit project.
        return redirect(route('projects.show', ['project' => $project->id]));
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project,
            'departments' => $project->departments, //*mengambil semua data department yang terkait dengan project.
            'employes' => $project->employes, //*mengambil semua data employe yang terkait dengan project.
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|min:3',
            'start_date' => "nullable|date",
            'end_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
        ]);
        $project->update($validated);
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
