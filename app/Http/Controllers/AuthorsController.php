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
      ->orderBy('id', 'DESC')->get();
      return view('author.index')->with('authors',$authors);
   }

   public function add(){
      return view('author.create');
   }

   protected function create(array $data)
   {

      if(in_array('is_translator', $data))
         $data = array_merge($data->all(), ['is_translator' => '0']);

      return Authors::create([
         'name' => $data['name'],
         'is_translator' => $data['is_translator'],
      ]);
   }

   public function store(Request $request){
      // $data = $request;


      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
         'is_translator' => 'boolean',
      ]);
      
      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      if(!$request->input('is_translator')){
         echo '1111111111111111111';
         $request = $request->all() + ['is_translator' => '0'];
      }
      if($record = $this->create( $request)){
         // Session::flash('message', 'Added Successfully!');
         // Session::flash('alert-class', 'alert-success');
         Session::flash('success', 'Tạo tác giả thành công!');
         return redirect()->route('author');
      }else{
         Session::flash('error', 'Tạo tác giả thất bại!');
         // Session::flash('message', 'Data not saved!');
         // Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $author = authors::find($id);

      return view('author.edit', )->with('author',$author);
   }

   public function firstOrCreate($data){
      return Authors::create([
         'name' => $data['name'],
         'is_translator' => ($data['is_translator']) ? 1: 0,
      ]);
   }
   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
         'description' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $subject = authors::find($id);

      if($subject->update($data)){

         Session::flash('message', 'Update successfully!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('authors');
      }else{
         Session::flash('message', 'Data not updated!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

   // Delete
   public function destroy($id){
      authors::destroy($id);

      Session::flash('message', 'Delete successfully!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('authors');
   }
}
