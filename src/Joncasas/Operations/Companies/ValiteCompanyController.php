<?php

namespace Joncasas\Operations\Companies;

/**
 *
 * @author jonathan
 */
trait ValiteCompanyController {

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateStore(\Illuminate\Http\Request $request) {
        return validator($request->all(), [
            'name' => 'required|unique:company',
            'nit' => 'nullable'
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateUpdate(\Illuminate\Http\Request $request) {
        return validator($request->all(), [
            'name' => 'required',
            'nit' => 'nullable'
        ]);
    }

}
