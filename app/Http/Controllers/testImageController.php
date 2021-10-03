<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Models\test_images;
use App\Models\Authors;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class testImageController extends Controller
{
    function upload(){
        $test_images = test_images::select('id', 'img_src', 'img_alt')
        ->join('authors', 'authors.id', '=', 'test_images.author_id')
        ->select('authors.name', 'test_images.*')
        ->orderBy('name', 'ASC')->get();
        return view('test_images.upload')->with(['test_images' => $test_images]);
    }
    public function add(){
        $authors = Authors::select('id', 'name')->get();
      return view('test_images.create')->with(['authors'=>$authors]);
  }

  protected function create(array $data)
  {
      return test_images::create([
         'img_src' => $data['img_src'], 
         'img_alt' => $data['img_alt'], 
     ]);
  }

  public function store(Request $request){
      $validator = Validator::make($request->all(), [
         'img_alt' => 'required|string',
     ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
     }
     if($request->has('img_src')){
        $image = $request->img_src;
        $reImage = time().'.'.$image->getClientOriginalExtension();
    

        $dest = public_path('assets\img');
       
        $image->move($dest, $reImage);
      
        $image = new test_images;
   
        $image->img_alt= $request->img_alt;
        $image->img_src = '/assets/img/'.$reImage;
        $image->author_id = $request->author_id;
        if($record = $image->save()){
         Session::flash('message', 'Tạo thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('test_images.upload');
     }else{
         Session::flash('message', 'Tạo thất bại!');
         Session::flash('alert-class', 'alert-danger');
     }
 }

 return Back();
}

}
