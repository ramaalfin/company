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
        // 1
        // $department = $employe->department;
        // $projects = $department->projects;

        // 2
        return view('employe.ambil-project', [
            'employe' => $employe,
            // 'department' => $department,
            'projects' => Project::with('departments')->get(), //* ambil project yang sama dengan department si employe
            'projects_sudah_diambil' => $employe->projects->pluck('id')->all() //* Buat array dari daftar project yang sudah di ambil employe
        ]);
    }

    public function prosesAmbilProject(Request $request, Employe $employe)
    {
        // 1
        // Ambil semua daftar project dari department yang sama dengan employe
        // $department = $employe->department;
        // $projects = $department->projects;

        // 2
        $projects = Project::with('departments')->get(); //*akan mengambil semua data project beserta data departement
        $project_department = $projects->pluck('id')->toArray(); //*mengambil nilai id dari masing-masing project dan diubah menjadi array menggunakan fungsi toArray().

        $validated = $request->validate([
            'project.*' => 'distinct|in:'.implode(',', $project_department), //* jika id project yang dipilih ada di dalam syarat 'in', maka akan lolos validasi.
        ]);

        // INSERT KE DB
        $employe->projects()->sync($validated['project'] ?? []); //*menyinkronkan data project yang terhubung dengan employe yang sedang diedit pada form edit employe.
        return redirect(route('employes.show', ['employe' => $employe->id]));
    }

    public function ambilDepartment(Employe $employe)
    {
        return view('employe.ambil-department', [
            'employe' => $employe,
            'departments' => Department::orderBy('name')->get()
        ]);
    }

    public function prosesAmbilDepartment(Request $request, Employe $employe)
    {
        $departments = Department::orderBy('name')->get();
        $department_id = $departments->pluck('id')->toArray();
        $validated = $request->validate([
            'department.*' => 'distinct|in:'.implode(',', $department_id),
        ]);
        // Memperbarui relasi department
        if($request->has('department')){
            $employe->department()->associate($validated['department'][0]);
        } else {
            $employe->department()->dissociate();
        }
        $employe->save();
        return redirect()->route('employes.show', ['employe' => $employe->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return view('employe.show', [
            'employe' => $employe,
            'projects' => $employe->projects //*mengambil semua data project yang terkait dengan department
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
        $employe->delete();
        return redirect()->route('employes.index');
    }
}
