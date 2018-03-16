<?php

namespace Joncasas\Operations\Users;

/**
 *
 * @author jonathan
 */
trait ValidateUserController {

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateStore(\Illuminate\Http\Request $request) {
        return validator($request->all(), [
            'name' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|confirmed'
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateUpdate(\Illuminate\Http\Request $request) {
        return validator($request->all(), [
            'name' => 'required',
            'email' => 'email',
            'password' => 'nullable|confirmed'
        ]);
    }

}
