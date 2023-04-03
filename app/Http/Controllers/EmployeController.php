<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
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

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return view('employe.show', [
            'employe' => $employe
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
