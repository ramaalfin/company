<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use App\Models\Project;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employe.index', [
            'employes' => Employe::with('department')->orderBy('fullname')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employe.create', [
            'departments' => Department::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|size:8|alpha_num|unique:employes,nip',
            'fullname' => 'required',
            'email' => 'required|email|unique:employes,email',
            'gender' => 'required|string|in:male,female',
            'address' => 'required',
            'phone_number' => 'required|max:20',
            'department_id' => 'required|exists:departments,id'
        ]);
        Employe::create($validated);
        return redirect('/employes');
    }

    public function ambilProject(Employe $employe)
    {
        $department = $employe->department;
        $projects = $department->projects;
        return view('employe.ambil-project', [
            'employe' => $employe,
            'department' => $department,
            'projects' => $projects, //* ambil project yang sama dengan department si employe
            'projects_sudah_diambil' => $employe->projects->pluck('id')->all()
        ]);
    }

    public function prosesAmbilProject(Request $request, Employe $employe)
    {
        // Ambil semua daftar project dari department yang sama dengan employe
        $department = $employe->department;
        $projects = $department->projects;
        $department_project = $projects->pluck('id')->toArray();

        $validated = $request->validate([
            'project.*' => 'distinct|in:'.implode(',', $department_project), // jika id mata kuliah yang dipilih ada di dalam syarat 'in', maka akan lolos validasi.
        ]);

        // INSERT KE DB
        $employe->projects()->sync($validated['project'] ?? []);
        return redirect(route('employes.show', ['employe' => $employe->id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return view('employe.show', [
            'employe' => $employe,
            'projects' => $employe->projects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employe $employe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        //
    }
}
