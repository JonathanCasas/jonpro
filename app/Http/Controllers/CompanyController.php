<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller {

    use \Joncasas\Operations\Companies\ValiteCompanyController,
        \Joncasas\Operations\Companies\CompanyOperations;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companies = Company::paginate(10);
        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $v = $this->validateStore($request);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }
        try {
            $this->storeCompany($request);
            flash()->success('Company created correctly');
        } catch (\Exception $ex) {
            flash()->error('An error has occurred: ' . $ex->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company) {
        return view('companies.update')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company) {
        $v = $this->validateUpdate($request);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v);
        }
        try {
            $this->updateCompany($company, $request);
            flash()->success('Company updated correctly');
        } catch (\Exception $ex) {
            flash()->error('An error has occurred: ' . $ex->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company) {
        //
    }

    /**
     * Search companies for select2.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchSelect(Request $request) {
        $companies = Company::where('name', 'like', "%{$request->get('term')}%")
                        ->orWhere('nit', 'like', "%{$request->get('term')}%")->paginate(10);
        $results = [];
        foreach ($companies as $company) {
            $results['results'][] = [
                'id' => $company->id,
                'text' => $company->name
            ];
        }
        $results['pagination'] = ['more' => $companies->hasMorePages()];
        return response()->json($results);
    }

}
