<?php

// namespace ==> controller / Admin folder
Route::group([ 'namespace' => 'Admin'], function () {

		Config::set('auth.defines', 'admin');
		Route::get('admin/login', 'AdminAuth@login');
		Route::post('admin/login', 'AdminAuth@dologin');

		// Route::get('forgot/password', 'AdminAuth@forgot_password');
		// Route::post('forgot/password', 'AdminAuth@forgot_password_post');
		// Route::get('reset/password/{token}', 'AdminAuth@reset_password');
		// Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');
		
		Route::group(['middleware' => 'admin:admin'], function () {
				
			    
				Route::resource('admin/admin', 'AdminController');
				Route::delete('admin/admin/destroy/all', 'AdminController@multi_delete');



				Route::resource('admin/users', 'UsersController');
				Route::delete('admin/users/destroy/all', 'UsersController@multi_delete');

				Route::resource('admin/news', 'NewsController');
				Route::get('admin/news/{id}/apper', 'NewsController@apper');
				Route::delete('admin/news/destroy/all', 'NewsController@multi_delete');

			
				Route::resource('admin/specialties', 'SpecialtiesController');
				Route::delete('admin/specialties/destroy/all', 'SpecialtiesController@multi_delete');
			
				Route::resource('admin/medicalStaffs', 'MedicaStaffController');
				Route::delete('admin/medicalStaffs/destroy/all', 'MedicaStaffController@multi_delete');

			

				
				Route::get('/admin', function () {
						return view('admin.home');
					});


				// Route::get('settings', 'Settings@setting');
				// Route::post('settings', 'Settings@setting_save');

				
				Route::any('admin/logout', 'AdminAuth@logout');
			});


			
			Route::get('admin/lang/{lang}', function ($lang) {
				session()->has('lang')?session()->forget('lang'):'';
				$lang == 'ar'?session()->put('lang', 'ar'):session()->put('lang', 'en');
				return back();
			});
			

	});

	// Route::get('scan/empty/product', function () {

	// 	$clear_product = \App\Jobs\ClearEmptyProduct::dispatch();
	// 	return dd($clear_product);
	// });


