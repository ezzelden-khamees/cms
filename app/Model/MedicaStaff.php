<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MedicaStaff extends Model {
	protected $table    = 'medicaStaff';
	protected $fillable = [
		'doctor_name_ar',
		'doctor_name_en',
		'photo',
		'special_id',
		
	];

	public function special_id() {
		return $this->hasOne('App\Model\Specialy', 'id', 'special_id');      // city has one country
	}
}
