<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\MedicaStaffDatatable;
use App\Http\Controllers\Controller;

use App\Model\MedicaStaff;
use Illuminate\Http\Request;

class MedicaStaffController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(MedicaStaffDatatable $medicaStaff) {
		return $medicaStaff->render('admin.medicalStaffs.index', ['title' => trans('admin.medicaStaffs')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.medicalStaffs.create', ['title' => trans('admin.create_medicalStaffs')]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {

		

		$data = $this->validate(request(),
			[
				'doctor_name_ar' => 'required',
				'doctor_name_en' => 'required',
				'photo'          => 'sometimes|nullable|mimes:png,jpg,jpeg' . v_image(),
				'special_id'     => 'required|numeric',

			], [], [
				'doctor_name_ar' => trans('admin.doctor_name_ar'),
				'doctor_name_en' => trans('admin.doctor_name_ar'),
				'photo'       => trans('admin.photoDoctor'), 
				'special_id'   => trans('admin.special_id'),

			]);

			if (request()->hasFile('photo')) {
				$data['photo'] = up()->upload([
				   'file'        => 'photo',
				   'path'        => 'medicaStaffs',
				   'upload_type' => 'single',
				   'delete_file' => '',
				]);
			 }

		MedicaStaff::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('medicalStaffs'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$medical = MedicaStaff::find($id);
		$title   = trans('admin.edit');
		return view('admin.medicalStaffs.edit', compact('medical', 'title'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $r, $id) {

		$data = $this->validate(request(),
			[
				'doctor_name_ar' => 'required',
				'doctor_name_en' => 'required',
				'photo'      => 'sometimes|nullable|mimes:png,jpg,jpeg' . v_image(),
				'special_id'   => 'required|numeric',

			], [], [
				'doctor_name_ar' => trans('admin.doctor_name_ar'),
				'doctor_name_en' => trans('admin.doctor_name_ar'),
				'photo'       => trans('admin.photoDoctor'), 
				'special_id'   => trans('admin.special_id'),
			]);

			if (request()->hasFile('photo')) {
				$data['photo'] = up()->upload([
				   'file'        => 'photo',
				   'path'        => 'medicaStaffs',
				   'upload_type' => 'single',
				   'delete_file' => '',
				]);
			 }

		MedicaStaff::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('medicalStaffs'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$medical = MedicaStaff::find($id);

		$medical->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('medicalStaffs'));
	}


	
	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$medical = MedicaStaff::find($id);
				$medical->delete();
			}
		} else {
			$medical = MedicaStaff::find(request('item'));
			$medical->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('medicalStaffs'));
	}
}
