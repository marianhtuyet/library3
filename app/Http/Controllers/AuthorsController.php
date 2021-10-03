<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Authors;

class AuthorsController extends Controller
{
   public function index(){
      $authors = Authors::select('id','name','is_translator')
      ->orderBy('name', 'ASC')->get();
      return view('author.index')->with('authors',$authors);
   }

   public function add(){
      return view('author.create');
   }

   protected function create(array $data)
   {
      if(!array_key_exists('is_translator', $data))
      {

         $data = array_merge($data, ['is_translator' => '0']);
      }

      return Authors::create([
         'name' => $data['name'],
         'is_translator' => $data['is_translator'],
      ]);
   }

   public function store(Request $request){
      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
         'is_translator' => 'boolean',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      
      if($record = $this->create($request->all())){
         Session::flash('message', 'Tạo tác giả thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('author');
      }else{
         Session::flash('message', 'Cập nhật tác giả thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $author = authors::find($id);

      return view('author.edit', )->with('author',$author);
   }



   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
         'is_translator' => 'boolean',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $subject = authors::find($id);
      if(!in_array('is_translator', $data))
         $subject->is_translator = 0;
      if($subject->update($data)){
         // Session::flash('success', 'Cập nhật tác giả thành công!');
         Session::flash('message', 'Cập nhật tác giả thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('author');
      }else{
         Session::flash('message', 'Cập nhật tác giả thất bại!');
         Session::flash('alert-class', 'alert-danger');
         // Session::flash('error', 'Cập nhật tác giả thất bại!');
      }

      return Back()->withInput();
   }

   // Delete
   public function destroy($id){
      Authors::destroy($id);

      Session::flash('message', 'Delete successfully!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('author');
   }
}
