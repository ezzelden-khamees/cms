<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WhatsApp extends Model {
	protected $table    = 'news';
	protected $fillable = [
		'title',
		'content',
		'photo',
		
	];

	

}
