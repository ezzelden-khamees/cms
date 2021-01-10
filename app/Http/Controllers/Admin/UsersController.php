<?php

namespace App\Http\Controllers\Admin;       //namespace
use App\Http\Controllers\Controller;        //extends
use Illuminate\Http\Request;
use  App\DataTables\UsersDatatables;
use App\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDatatables $admin)
    {
    return $admin->render('admin.users.index' ,['title' => trans('admin.users')]) ;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['title' => trans('admin.add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = $this->validate(request(),
                [
                    'name'     => 'required',
                    'age'     => 'required', 
                    'adress'  => 'required', 
                    'mob'     => 'required', 
                    'status'    => 'required|in:yes,no', //yes / no 
                    'logo'      => 'sometimes|nullable|mimes:png,jpg,jpeg' . v_image(),
                    'email'    => 'required|email|unique:users',
                    'password' => 'required|min:6'
                ], [], [
                    'name'     => trans('admin.nameSick'),
                    'age'       => trans('admin.age'),
                    'adress'    => trans('admin.adress'),
                    'mob'        => trans('admin.mob'),
                    'status'     => trans('admin.status'),
                    'logo'       => trans('admin.userimage'),
                    'email'    => trans('admin.email'),
                    'password' => trans('admin.password'),
                ]);

                if (request()->hasFile('logo')) {
                    $data['logo'] = up()->upload([
                       'file'        => 'logo',
                       'path'        => 'users',
                       'upload_type' => 'single',
                       'delete_file' => '',
                    ]);
                 }

                 
            $data['password'] = bcrypt(request('password'));
            
            User::create($data);
           // dd($data);
            session()->flash('success', trans('admin.Patient_added'));
            return redirect(aurl('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
		$title = trans('admin.edit');
		return view('admin.users.edit', compact('user', 'title'));
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
                   'name'     => 'required',
                    'age'     => 'required', 
                    'adress'  => 'required', 
                    'mob'     => 'required', 
                    'status'    => 'required|in:yes,no', //yes / no 
                    'logo'      => 'sometimes|nullable|mimes:png,jpg,jpeg' . v_image(),
				   'email'    => 'required|email|unique:users,email,'.$id,
				   'password' => 'sometimes|nullable|min:6'
			], [], [
                'name'     => trans('admin.nameSick'),
                'age'       => trans('admin.age'),
                'adress'    => trans('admin.adress'),
                'mob'        => trans('admin.mob'),
                'status'     => trans('admin.status'),
                'logo'       => trans('admin.userimage'),
                'email'    => trans('admin.email'),
                'password' => trans('admin.password'),
			]);
		if (request()->has('password')) {
			$data['password'] = bcrypt(request('password'));
        }
        
        if (request()->hasFile('logo')) {
            $data['logo'] = up()->upload([
               'file'        => 'logo',
               'path'        => 'users',
               'upload_type' => 'single',
               'delete_file' => User::find($id)->logo,
            ]);
         }


		User::where('id', $id)->update($data);
		session()->flash('success', trans('admin.Patient_added'));
		return redirect(aurl('users'));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
		session()->flash('success', trans('admin.deleted_Patient'));
		return redirect(aurl('users'));
    }

    
    public function multi_delete() {
		if (is_array(request('item'))) {
			User::destroy(request('item'));
		} else {
			User::find(request('item'))->delete();
		}
		session()->flash('success', trans('admin.deleted_Patient'));
		return redirect(aurl('users'));
	}
}
