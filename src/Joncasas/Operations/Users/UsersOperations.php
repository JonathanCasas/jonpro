<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Joncasas\Operations\Users;

/**
 *
 * @author jonathan
 */
trait UsersOperations {

    /**
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function storeUser(\Illuminate\Http\Request $request) {
        try {
            $user = new \App\User($request->all());
            $user->password = bcrypt($request->get('password'));
            $user->save();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * @param \App\User $user
     * @param \Illuminate\Http\Request $request
     * @return null
     * @throws \Exception
     */
    protected function updateUser(\App\User $user, \Illuminate\Http\Request $request) {
        try {
            if ($request->has('password') && !is_null($request->get('password'))) {
                $user->password = bcrypt($request->get('password'));
            }
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\Paginator
     */
    protected function getQuerySearch(\Illuminate\Http\Request $request) {
        $query = \App\User::select();
        if ($request->has('id') && !is_null($request->get('id'))) {
            $query->where('id', 'like', "%{$request->get('id')}%");
        }
        if ($request->has('name') && !is_null($request->get('name'))) {
            $query->where('name', 'like', "%{$request->get('name')}%");
        }
        if ($request->has('email') && !is_null($request->get('email'))) {
            $query->where('email', 'like', "%{$request->get('email')}%");
        }
        return $query->paginate(10);
    }

}
