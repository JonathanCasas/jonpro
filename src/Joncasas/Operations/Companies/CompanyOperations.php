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

}
