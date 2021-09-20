<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_books;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class typeBookController extends Controller
{
     public function index(){
      $type_books = type_books::select('id','name')
      ->orderBy('id', 'DESC')->get();
      return view('type_books.index')->with('type_books',$type_books);
   }

   public function add(){
      return view('type_books.create');
   }

   protected function create(array $data)
   {
      return type_books::create([
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
         Session::flash('message', 'Tạo loại sách thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('type_books');
      }else{
         Session::flash('message', 'Cập nhật loại sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $type_books = type_books::find($id);

      return view('type_books.edit', )->with('type_books',$type_books);
   }



   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $type_book = type_books::find($id);
     
      if($type_book->update($data)){
         Session::flash('message', 'Cập nhật loại sách thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('type_books');
      }else{
         Session::flash('message', 'Cập nhật loại sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

   // Delete
   public function destroy($id){
      type_books::destroy($id);

      Session::flash('message', 'Delete successfully!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('type_books');
   }
}
