<?php

namespace App\Http\Controllers;
use App\Models\sites;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class sitesController extends Controller
{
     public function index(){
      $sites = sites::select('id','name')
      ->orderBy('name', 'ASC')->get();
      return view('sites.index')->with('sites',$sites);
   }

   public function add(){
      return view('sites.create');
   }

   protected function create(array $data)
   {
      return sites::create([
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
         Session::flash('message', 'Tạo kho sách thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('sites');
      }else{
         Session::flash('message', 'Tạo kho sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $sites = sites::find($id);

      return view('sites.edit', )->with('sites',$sites);
   }


   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $sites = sites::find($id);
      
      if($sites->update($data)){
         Session::flash('message', 'Cập nhật kho sách thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('sites');
      }else{
         Session::flash('message', 'Cập nhật kho sách thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

      // Delete
   public function destroy($id){
      sites::destroy($id);
      Session::flash('message', 'Xóa thành công!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('sites');
   }
}
