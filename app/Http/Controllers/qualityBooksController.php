<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quality_books;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class qualityBooksController extends Controller
{
    public function index(){
      $quality_books = quality_books::select('id','name')
      ->orderBy('name', 'ASC')->get();
      return view('quality_books.index')->with('quality_books',$quality_books);
   }

   public function add(){
      return view('quality_books.create');
   }

   protected function create(array $data)
   {
      return quality_books::create([
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
         Session::flash('message', 'Tạo trạng thái sách thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('quality_books');
      }else{
         Session::flash('message', 'Tạo trạng thái sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $quality_books = quality_books::find($id);

      return view('quality_books.edit', )->with('quality_books',$quality_books);
   }


   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $quality_books = quality_books::find($id);
      
      if($quality_books->update($data)){
         Session::flash('message', 'Cập nhật trạng thái sách thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('quality_books');
      }else{
         Session::flash('message', 'Cập nhật trạng thái sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

      // Delete
   public function destroy($id){
      quality_books::destroy($id);
      Session::flash('message', 'Xóa thành công!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('quality_books');
   }
}
