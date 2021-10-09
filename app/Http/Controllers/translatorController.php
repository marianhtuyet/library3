<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\translators;

class translatorController extends Controller
{
   public function index(){
      $translators = translators::select('id','name')
      ->orderBy('name', 'ASC')->get();
      return view('translators.index')->with('translators',$translators);
   }

   public function add(){
      return view('translators.create');
   }

   protected function create(array $data)
   {
      return translators::create([
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
         Session::flash('message', 'Tạo dịch giả thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('translators');
      }else{
         Session::flash('message', 'Cập nhật dịch giả thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $translators = translators::find($id);

      return view('translators.edit', )->with('translators',$translators);
   }


   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $translators = translators::find($id);
      
      if($translators->update($data)){
         Session::flash('message', 'Cập nhật dịch giả thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('translators');
      }else{
         Session::flash('message', 'Cập nhật dịch giả thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

      // Delete
   public function destroy($id){
      translators::destroy($id);
      Session::flash('message', 'Xóa thành công!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('translators');
   }
}
