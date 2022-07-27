<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $departments = Department::all();

        return view('department.index', compact('departments'));
    }

    public function create(){
        return view('department.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        Department::create($data);
        return redirect()->route('departments.index');
    }

    public function show(Department $department){
        return view('department.show', compact('department'));
    }

    public function edit(Department $department){
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, Department $department){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $department->update($data);
        return redirect()->route('departments.show', $department->id);
    }

    public function destroy(Department $department) {
        $department->delete();
        return redirect()->route('departments.index');
    }
}
