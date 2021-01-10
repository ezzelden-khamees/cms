<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Specialy extends Model {
	protected $table    = 'specialties';
	protected $fillable = [
		'specialties_name_ar',
		'specialties_name_en',
		
	];


}