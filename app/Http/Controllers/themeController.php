<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\themes;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class themeController extends Controller
{
  public function index(){
      $themes = themes::select('id','name')
      ->orderBy('name', 'ASC')->get();
      return view('themes.index')->with('themes',$themes);
  }

  public function add(){
      return view('themes.create');
  }

  protected function create(array $data)
  {
      return themes::create([
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
       Session::flash('message', 'Tạo chủ đề thành công!');
       Session::flash('alert-class', 'alert-success');
       return redirect()->route('themes');
   }else{
       Session::flash('message', 'Cập nhật chủ đề thất bại!');
       Session::flash('alert-class', 'alert-danger');
   }

   return Back();
}

public function edit($id){
  $themes = themes::find($id);

  return view('themes.edit', )->with('themes',$themes);
}


public function update(Request $request,$id){
  $data = $request->except('_method','_token','submit');

  $validator = Validator::make($request->all(), [
   'name' => 'required|string|min:3',
]);

  if ($validator->fails()) {
   return redirect()->Back()->withInput()->withErrors($validator);
}
$themes = themes::find($id);

if($themes->update($data)){
   Session::flash('message', 'Cập nhật chủ đề thành công!');
   Session::flash('alert-class', 'alert-success');
   return redirect()->route('themes');
}else{
   Session::flash('message', 'Cập nhật chủ đề thất bại!');
   Session::flash('alert-class', 'alert-danger');
}

return Back()->withInput();
}

   // Delete
public function destroy($id){
    themes::destroy($id);
  Session::flash('message', 'Xóa thành công!');
  Session::flash('alert-class', 'alert-success');
  return redirect()->route('themes');
}
}
