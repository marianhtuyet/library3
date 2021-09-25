<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\type_books;
use App\Models\language_books;
use App\Models\tpddcs;
use App\Models\Authors;
use App\Models\publishers;
use App\Models\status_books;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $books = DB::table('books')
       ->join('authors', 'authors.id', '=', 'books.author_id')
       ->join('tpddcs', 'books.ddc_id', '=', 'tpddcs.id')
       ->join('language_books', 'language_books.id', '=', 'books.language_id')
       ->join('publishers', 'publishers.id', '=', 'books.publishing_company_id')
       ->join('status_books', 'status_books.id', '=', 'books.status_id')
       ->select( 'authors.name as author_name', 'tpddcs.ddc_name', 'language_books.name as language_name', 'publishers.name as publishers_name', 'status_books.name as status_name', 'books.*')
       ->orderBy('id', 'DESC')->get();
       return view('books.index', compact('books'));

   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function add()
    {
        $type_books = type_books::select('id', 'name')->get();
        $language_books = language_books::select('id', 'name')->get();
        $tpddcs = tpddcs::select('id', 'ddc', 'ddc_name')->get();
        $authors = Authors::select('id', 'name')->get();
        $publishers = publishers::select('id', 'name')->get();
        $status_books = status_books::select('id', 'name')->get();
        return view('books.create')->with(['type_books'=>$type_books, 'language_books'=> $language_books, 'tpddcs'=> $tpddcs, 'authors'
            => $authors, 'publishers'=>$publishers, 'status_books'=>$status_books]);
    }
    public function create(array $data, $reImage)
    {
        return Book::create([
         'name' => $data['book_name'],
         'original' => $data['original'],
         'temporary_content' => $data['temporary_content'],
         'type_book_id' => $data['type_book_id'],
         'language_id' => $data['language_id'],
         'ddc_id' => $data['ddc_id'],
         'author_id' => $data['author_id'],
         'chapter' => $data['chapter'],
         'summary' => $data['summary'],
         'series' => $data['series'],
         'publishing_company_id' => $data['publishing_company_id'],
         'republishing' => $data['republishing'],
         'year_publishing' => $data['year_publishing'],
         'page_number' => $data['page_number'],
         'input_date' => $data['input_date'],
         'cost' => $data['cost'],
         'status_id' => $data['status_id'],
         'img_src' => $reImage,
     ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
           'book_name' => 'required|string|min:3',
       ]);

        if ($validator->fails()) {
           return redirect()->Back()->withInput()->withErrors($validator);
       }
        $dest = public_path('assets/img/');
        $reImage = '';
       if($request->has('img_src')){
        $image = $request->img_src;
        $reImage = time().'.'.$image->getClientOriginalExtension();
        $dest = public_path('assets/img/');
        $image->move($dest, $reImage);
    
    }
       if($record = $this->create($request->except('img_src'), $dest.$reImage)){
           Session::flash('message', 'Tạo sách thành công!');
           Session::flash('alert-class', 'alert-success');
           $type_books = type_books::select('id', 'name')->get();
           $language_books = language_books::select('id', 'name')->get();
           $tpddcs = tpddcs::select('ddc', 'ddc_name')->get();
           $authors = Authors::select('id', 'name')->get();
           $publishers = publishers::select('id', 'name')->get();
           $status_books = status_books::select('id', 'name')->get();

           return redirect()->route('books')->with(['type_books'=>$type_books, 'language_books'=> $language_books, 'tpddcs'=> $tpddcs, 'authors'
            => $authors, 'publishers'=>$publishers, 'status_books'=>$status_books]);
       }else{
           Session::flash('message', 'Tạo sách thất bại!');
           Session::flash('alert-class', 'alert-danger');
       }

       return Back();
   }

  
    public function edit($id)
    {

        $books = Book::find($id);

        $type_books = type_books::select('id', 'name')->get();
        $language_books = language_books::select('id', 'name')->get();
        $tpddcs = tpddcs::select('id', 'ddc', 'ddc_name')->get();
        $authors = Authors::select('id', 'name')->get();
        $publishers = publishers::select('id', 'name')->get();
        $status_books = status_books::select('id', 'name')->get();

        return view('books.edit', )->with(['type_books'=>$type_books, 'language_books'=> $language_books, 'tpddcs'=> $tpddcs, 'authors'
            => $authors, 'publishers'=>$publishers, 'status_books'=>$status_books, 'books'=> $books]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
       $data = $request->except('_method','_token','submit', 'img_src');

       $validator = Validator::make($request->all(), [
           'name' => 'required|string|min:3',
       ]);

       if ($validator->fails()) {
           return redirect()->Back()->withInput()->withErrors($validator);
       }
       $books = Book::find($id);
        $dest = public_path('assets/img/');
        $reImage = '';
       if($request->has('img_src')){
        $image = $request->img_src;
        $reImage = time().'.'.$image->getClientOriginalExtension();
        $dest = public_path('assets/img/');
        $image->move($dest, $reImage);

        $data = array_merge($data, ['img_src' =>'/assets/img/'.$reImage]);

        }
       

       if($books->update($data)){
           Session::flash('message', 'Cập nhật sách thành công!');
           Session::flash('alert-class', 'alert-success');
           return redirect()->route('books');
       }else{
           Session::flash('message', 'Cập nhật sách thất bại!');
           Session::flash('alert-class', 'alert-danger');
       }

       return Back()->withInput();
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);

      Session::flash('message', 'Xóa thành công!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('books');
    }
    public function getBookInfo($id){
        $books = DB::table('books')
        ->join('authors', 'authors.id', '=', 'books.author_id')
        ->join('tpddcs', 'books.ddc_id', '=', 'tpddcs.id')
        ->join('language_books', 'language_books.id', '=', 'books.language_id')
        ->join('publishers', 'publishers.id', '=', 'books.publishing_company_id')
        ->join('status_books', 'status_books.id', '=', 'books.status_id')
        ->select( 'authors.name as author_name', 'tpddcs.ddc_name', 'language_books.name as language_name', 'publishers.name as publishers_name', 'status_books.name as status_name', 'books.*')
        ->where('books.id',$id)
        ->get();
        return view('books.book', compact('books'));
    }
     // ->join('author_books', 'author_books.book_id', '=', 'books.id')

}


