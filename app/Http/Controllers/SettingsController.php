<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $setting = Setting::get()->first();
        if (is_null($setting)) {
            $setting = new Setting();
            $setting->lang = \Joncasas\Settings\getSettings::getLang();
            $setting->site_title = \Joncasas\Settings\getSettings::getSiteTitle();
            $setting->site_name = \Joncasas\Settings\getSettings::getSiteName();
        }
        return view('settings.settings')->with('setting', $setting);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $setting = Setting::get()->first();
        if (is_null($setting)) {
            $setting = new Setting();
        }
        if (!is_null($request->get('site_name'))) {
            $setting->site_name = $request->get('site_name');
        }
        if (!is_null($request->get('site_title'))) {
            $setting->site_title = $request->get('site_title');
        }
        if (!is_null($request->get('lang'))) {
            $setting->lang = $request->get('lang');
        }
        try {
            $setting->save();
            flash()->success('Correctly saved settings');
        } catch (\Exception $ex) {
            flash()->error('An error has ocurred: ' . $ex->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting) {
        //
    }

}
