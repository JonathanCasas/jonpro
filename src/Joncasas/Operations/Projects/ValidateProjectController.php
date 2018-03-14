<?php

namespace Joncasas\Operations\Projects;

/**
 *
 * @author jonathan
 */
trait ValidateProjectController {

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validateStore(\Illuminate\Http\Request $request) {
        return validator($request->all(), [
            'name' => 'required',
            'state' => 'required',
            'priority' => 'required',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date'
        ]);
    }

}
