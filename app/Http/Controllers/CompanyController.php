<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Rules\EmployeeExists;
use  \Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Notifications\CompanyRegistered;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $companies = DB::table('companies')
            ->paginate(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCompanyRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('images', 'public');
        }

        $company = new Company();
        $company->fill($request->validated());

        $company->image = $file;
        $company->save();

//        Notification::send($company, new CompanyRegistered($company));

        return redirect()->route('company.index')->with('status', __('New company has been created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->fill($request->validated());
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('images', 'public');
            $company->image = $file;
        }
        $company->save();

        return redirect()->route('company.index')->with('status', __('The company data has been edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        $validator = new EmployeeExists();
        if ($validator->passes('', $company)) {
            $company->delete();
            $message = 'The company has been deleted';
        } else {
            $message = $validator->message();
        }

        return redirect()->back()->with('status', __($message));
    }
}
