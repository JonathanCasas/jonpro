<?php

namespace Joncasas\Settings;

/**
 * Description of getSettings
 *
 * @author jonathan
 */
class getSettings {

    /**
     * @return string the site title
     */
    public static function getSiteTitle() {
        $settings = \App\Models\Setting::get()->first();
        if (!is_null($settings)) {
            return $settings->site_title;
        }
        return 'JonPro - Project Manager';
    }

    /**
     * @return string the site name
     */
    public static function getSiteName() {
        $settings = \App\Models\Setting::get()->first();
        if (!is_null($settings)) {
            return $settings->site_name;
        }
        return 'JonPro - Project Manager';
    }
    
    /**
     * @return string the site name
     */
    public static function getLang() {
        $settings = \App\Models\Setting::get()->first();
        if (!is_null($settings)) {
            return $settings->lang;
        }
        return 'en';
    }

}
