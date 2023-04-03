<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use App\Models\Project;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('department.index', [
            'departments' => Department::withCount('employes')->orderBy('name')->get()
        ]);
    }

    // todo menampilkan semua employe yang terkait dengan department.
    public function departmentEmploye($id)
    {
        $department = Department::findOrFail($id)->name;
        return view('employe.index', [
            'employes' => Employe::where('department_id', $id)->orderBy('fullname')->paginate(10),
            'nama_department' => $department,
        ]);
    }

    // todo menampilkan semua project yang terkait dengan department.
    public function departmentProject($id)
    {
        $department = Department::findOrFail($id);
        return view('department.projects', [
            'department' => $department, //*mengambil data department dari database sesuai parameter $id
            'projects' => $department->projects, //*mengambil semua data project yang terkait dengan department tersebut.
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'kepala_department' => 'required',
        ]);
        $department = Department::create($validated);
        return redirect('/departments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
