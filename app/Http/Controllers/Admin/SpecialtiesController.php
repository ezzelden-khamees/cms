<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\SpecialyDatatable;
use App\Http\Controllers\Controller;
use App\Model\Specialy;
use Illuminate\Http\Request;
use Storage;

class SpecialtiesController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(SpecialyDatatable $specialties)
   {
      return $specialties->render('admin.specialties.index', ['title' => trans('admin.specialties')]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.specialties.create', ['title' => trans('admin.create_specialties')]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store()
   {

      $data = $this->validate(request(),
         [
            'specialties_name_ar' => 'required',
            'specialties_name_en' => 'required',
         ], [], [
            'specialties_name_ar' => trans('admin.specialties_name_ar'),
            'specialties_name_en' => trans('admin.specialties_name_en'),
         ]);


      Specialy::create($data);
      session()->flash('success', trans('admin.Specialy_added'));
      return redirect(aurl('specialties'));
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
      $specialy = Specialy::find($id);
      $title   = trans('admin.edit');
      return view('admin.specialties.edit', compact('specialy', 'title'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $r, $id)
   {

      $data = $this->validate(request(),
         [
            'specialties_name_ar' => 'required',
            'specialties_name_en' => 'required',
          
         ], [], [
            'specialties_name_ar' => trans('admin.specialties_name_ar'),
            'specialties_name_en' => trans('admin.specialties_name_en'),
         
         ]);

     

      Specialy::where('id', $id)->update($data);
      session()->flash('success', trans('admin.Specialy_edit'));
      return redirect(aurl('specialties'));
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $specialties = Specialy::find($id);
      $specialties->delete();
      session()->flash('success', trans('admin.Specialy_delet'));
      return redirect(aurl('specialties'));
   }

   public function multi_delete()
   {
      if (is_array(request('item'))) {
         foreach (request('item') as $id) {
            $countries = Specialy::find($id);
            $countries->delete();
         }
      } else {
         $countries = Specialy::find(request('item'));
         $countries->delete();
      }
      session()->flash('success', trans('admin.Specialy_delet'));
      return redirect(aurl('specialties'));
   }
}
