<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class User {
    public static function getSetting($key) {
        $user = DB::table('settings')->where('setting_key', $key)->first();
        return (isset($user->setting_value) ? $user->setting_value : '');
    }
    public static function getKategori() {
        $user = DB::table('categories')->get();
        return (isset($user->slug) ? $user->slug : '');
    }
}