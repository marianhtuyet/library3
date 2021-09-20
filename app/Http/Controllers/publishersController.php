<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\publishers;

class publishersController extends Controller
{
    public function index(){
      $publishers = publishers::select('id','name')
      ->orderBy('id', 'DESC')->get();
      return view('publishers.index')->with('publishers',$publishers);
   }

   public function add(){
      return view('publishers.create');
   }

   protected function create(array $data)
   {
      return publishers::create([
         'name' => $data['name'],
      ]);
   }

   public function store(Request $request){
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      
      if($record = $this->create($request->all())){
         Session::flash('message', 'Tạo nhà xuất bản thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('publishers');
      }else{
         Session::flash('message', 'Cập nhật nhà xuất bản thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $publishers = publishers::find($id);

      return view('publishers.edit', )->with('publishers',$publishers);
   }


   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $publishers = publishers::find($id);
     
      if($publishers->update($data)){
         Session::flash('message', 'Cập nhật nhà xuất bản thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('publishers');
      }else{
         Session::flash('message', 'Cập nhật nhà xuất bản thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

   // Delete
   public function destroy($id){
      publishers::destroy($id);

      Session::flash('message', 'Xóa thành công!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('publishers');
   }
}
