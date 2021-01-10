<?php

namespace App\Http\Controllers\Admin;       //namespace
use App\Http\Controllers\Controller;        //extends
use Illuminate\Http\Request;
use  App\DataTables\NewsDatatables;
use App\Model\WhatsApp;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsDatatables $admin)
    {
    return $admin->render('admin.news.index' ,['title' => trans('admin.news')]) ;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', ['title' => trans('admin.add')]);
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
           
            'title'     => 'required',
            'content'     => 'required',    
            'photo'      => 'sometimes|nullable|mimes:png,jpg,jpeg' . v_image(),
        ], [], [
            'title'     => trans('admin.titleNews'),
            'content'       => trans('admin.contentNews'),           
             'photo'       => trans('admin.photoNews'),
        ]);
    
    
    if (request()->hasFile('photo')) {
        $data['photo'] = up()->upload([
           'file'        => 'photo',
           'path'        => 'news',
           'upload_type' => 'single',
           'delete_file' => '',
        ]);
     }


         WhatsApp::create($data);
         session()->flash('success', trans('admin.new_added'));
         return redirect(aurl('news'));
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
        $info = WhatsApp::find($id);
		$title = trans('admin.edit');
		return view('admin.news.edit', compact('info', 'title'));
    }

    public function apper($id)
    {
        $apper = WhatsApp::find($id);
		$title = trans('admin.apper');
		return view('admin.news.apper', compact('apper', 'title'));
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
                 
                'title'     => 'required',
                'content'     => 'required',    
                'photo'      => 'sometimes|nullable|mimes:png,jpg,jpeg' . v_image(),
			], [], [
                'title'     => trans('admin.titleNews'),
                'content'       => trans('admin.contentNews'),           
                 'photo'       => trans('admin.photoNews'),
			]);
		
        
        if (request()->hasFile('photo')) {
            $data['photo'] = up()->upload([
               'file'        => 'photo',
               'path'        => 'news',
               'upload_type' => 'single',
               'delete_file' => WhatsApp::find($id)->photo,
            ]);
         }


         WhatsApp::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('news'));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WhatsApp::find($id)->delete();
		session()->flash('success', trans('admin.deleted_new'));
		return redirect(aurl('news'));
    }

    
    public function multi_delete() {
		if (is_array(request('item'))) {
			WhatsApp::destroy(request('item'));
		} else {
			WhatsApp::find(request('item'))->delete();
		}
		session()->flash('success', trans('admin.deleted_new'));
		return redirect(aurl('news'));
	}
}
