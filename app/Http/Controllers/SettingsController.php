<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Setting;
use Session;
use Redirect;
class SettingsController extends Controller
{
    //
    public function setting() {
    	return view('admin.settings.settings',['title' => ('إعدادات الموقع')]);
    }

    public function setting_save() {
    	$data = request()->except(['_token','_method']);
    	Setting::orderBy('id','desc')->update($data);
    	Session::flash('save','تم تحديث بيانات الموقع بنجاح');
        return Redirect('admin/settings');
    }
}
