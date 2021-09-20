<?php

namespace App\Http\Controllers;

use App\Models\tpddcs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class tpddcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $tpddcs = tpddcs::select('id','ddc_name','ddc')
        ->orderBy('tpddcs.ddc', 'ASC')
        ->get();
        return view('tpddcs.index')->with('tpddcs',$tpddcs);
    }
    public function find_book() {
      
        $tpddcs = DB::table('tpddcs')
        ->join('books', 'books.ddc_id', '=', 'tpddcs.id')
        ->join('author_books', 'author_books.book_id', '=', 'books.id')
        ->join('authors', 'authors.id', '=', 'author_books.author_id')
        ->where([['tpddcs.ddc','>=', 100], ['tpddcs.ddc', '<', 300]])
        ->select( 'authors.name as author_name', 'books.*')
        ->orderBy('tpddcs.ddc', 'ASC')
        ->get();

        return view('tpddcs.100')->with('books',$tpddcs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function add(){
      return view('tpddcs.create');
   }

   protected function create(array $data)
   {
      return tpddcs::create([
         'ddc_name' => $data['ddc_name'],
         'ddc' => $data['ddc'],
      ]);
   }

   public function store(Request $request){

      $validator = Validator::make($request->all(), [
         'ddc_name' => 'required|string|min:1',
         'ddc' => 'numeric',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      
      if($record = $this->create($request->all())){
         Session::flash('message', 'Tạo ddc thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('tpddcs');
      }else{
         Session::flash('message', 'Tạo ddc thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }

   public function edit($id){
      $tpddc = tpddcs::find($id);

      return view('tpddcs.edit', )->with('tpddc',$tpddc);
   }


   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'ddc_name' => 'required|string|min:3',
         'ddc' => 'numeric',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $tpddc = tpddcs::find($id);
     
      if($tpddc->update($data)){
         Session::flash('message', 'Cập nhật tác giả thành công!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('tpddcs');
      }else{
         Session::flash('message', 'Cập nhật tác giả thất bại!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

   // Delete
   public function destroy($id){
      tpddcs::destroy($id);

      Session::flash('message', 'Delete successfully!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('tpddcs');
   }

   
}

