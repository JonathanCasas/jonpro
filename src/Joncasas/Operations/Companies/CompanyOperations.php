<?php

namespace Joncasas\Operations\Companies;

/**
 *
 * @author jonathan
 */
trait CompanyOperations {

    /**
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function storeCompany(\Illuminate\Http\Request $request) {
        $company = new \App\Models\Company($request->all());
        try {
            $company->save();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * @param \App\Models\Company $company Description
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function updateCompany(\App\Models\Company $company, \Illuminate\Http\Request $request) {
        try {
            $company->update($request->all());
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\Paginator
     */
    protected function getQuerySearch(\Illuminate\Http\Request $request) {
        $query = \App\Models\Company::select();
        if ($request->has('id') && !is_null($request->get('id'))) {
            $query->where('id', 'like', "%{$request->get('id')}%");
        }
        if ($request->has('name') && !is_null($request->get('name'))) {
            $query->where('name', 'like', "%{$request->get('name')}%");
        }
        if ($request->has('nit') && !is_null($request->get('nit'))) {
            $query->where('nit', 'like', "%{$request->get('nit')}%");
        }
        return $query->paginate(10);
    }

}
