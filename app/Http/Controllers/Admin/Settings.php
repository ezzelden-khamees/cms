<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;

class Settings extends Controller {

	public function setting() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	public function setting_save() {
		$data = $this->validate(request(), [

				'main_lang'           => '',
			
			]);

		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('settings'));
	}
}