<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\language_books;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class languageBookController extends Controller
{
   public function index(){
      $language_books = language_books::select('id','name')
      ->orderBy('id', 'DESC')->get();
      return view('language_books.index')->with('language_books',$language_books);
   }

   public function add(){
      return view('language_books.create');
   }

   protected function create(array $data)
   {
      return language_books::create([
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
         Session::flash('message', 'Tạo ngôn ngữ thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('language_books');
      }else{
         Session::flash('message', 'Cập nhật ngôn ngữ thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $language_books = language_books::find($id);

      return view('language_books.edit', )->with('language_books',$language_books);
   }


   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $language_books = language_books::find($id);
     
      if($language_books->update($data)){
         Session::flash('message', 'Cập nhật ngôn ngữ thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('language_books');
      }else{
         Session::flash('message', 'Cập nhật ngôn ngữ thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

   // Delete
   public function destroy($id){
      language_books::destroy($id);

      Session::flash('message', 'Xóa thành công!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('language_books');
   }
}
