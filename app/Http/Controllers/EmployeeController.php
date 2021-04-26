<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $employees = DB::table('employees')
            ->LeftJoin('companies', 'companies.id', '=', 'employees.company_id')
            ->select('employees.name', 'employees.email', 'employees.phone', 'companies.title', 'employees.id')
            ->paginate(10);

        return view('employee.index', compact('employees'));
    }
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $companies = Company::all();

        return view('employee.create', compact('companies'));
    }

    /**
     * @param  StoreEmployeeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEmployeeRequest $request)
    {

        Employee::create($request->validated());

        return redirect()->route('employee.index')->with('status', __('New employee has been created'));
    }
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Employee $employee)
    {
        $employee->load('employee');

        return view('employee.show', compact('employee'));
    }
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Employee $employee)
    {
        $employee->load('company');
        $companies = Company::all();

        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * @param
     * @param  Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('employee.index')->with('status', __('The employee has been edited'));
    }

    /**
     * @param  Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back()->with('status', __('The employee has been deleted'));
    }

}
