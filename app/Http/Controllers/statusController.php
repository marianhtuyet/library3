<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\status_books;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class statusController extends Controller
{
    public function index(){
      $status_books = status_books::select('id','name')
      ->orderBy('name', 'ASC')->get();
      return view('status_books.index')->with('status_books',$status_books);
   }

   public function add(){
      return view('status_books.create');
   }

   protected function create(array $data)
   {
      return status_books::create([
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
         return redirect()->route('status_books');
      }else{
         Session::flash('message', 'Cập nhật trạng thái sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $status_books = status_books::find($id);

      return view('status_books.edit', )->with('status_books',$status_books);
   }


   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $status_books = status_books::find($id);
      
      if($status_books->update($data)){
         Session::flash('message', 'Cập nhật trạng thái sách thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('status_books');
      }else{
         Session::flash('message', 'Cập nhật trạng thái sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

      // Delete
   public function destroy($id){
      status_books::destroy($id);
      Session::flash('message', 'Xóa thành công!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('status_books');
   }
}
