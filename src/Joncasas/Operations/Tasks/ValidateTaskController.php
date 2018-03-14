<?php

namespace Joncasas\Operations\Tasks;

/**
 * Description of ValidateTaskController
 *
 * @author jonathan
 */
trait ValidateTaskController {

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateStore(\Illuminate\Http\Request $request) {
        return validator($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'state' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required|integer',
            'stimated_time' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date'
        ]);
    }

}
