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
use App\Models\themes;
use App\Models\sites;
use App\Models\translators;
use App\Models\quality_books;


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
     ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
     ->join('tpddcs', 'books.ddc_id', '=', 'tpddcs.id')
     ->join('language_books', 'language_books.id', '=', 'books.language_id')
     ->join('publishers', 'publishers.id', '=', 'books.publishing_company_id')
     ->join('status_books', 'status_books.id', '=', 'books.status_id')
     ->select( 'authors.name as author_name', 'tpddcs.ddc_name', 'language_books.name as language_name', 'publishers.name as publishers_name', 'status_books.name as status_name', 'books.*')

     ->orderBy('name', 'ASC')->get();
     $authors = translators::select('id', 'name')->get();
     return view('books.index')->with(['books' => $books, 'authors' => $authors]);

 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function add()
    {
        $type_books = type_books::select('id', 'name')->orderBy('name', 'ASC')->get();
        $language_books = language_books::select('id', 'name')->orderBy('name', 'ASC')->get();
        $tpddcs = tpddcs::select('id', 'ddc_number', 'ddc_name')->orderBy('ddc_number', 'ASC')->get();
        $authors = Authors::select('id', 'name')->orderBy('name', 'ASC')->get();
        $publishers = publishers::select('id', 'name')->orderBy('name', 'ASC')->get();
        $status_books = status_books::select('id', 'name')->orderBy('name', 'ASC')->get();
        $themes = themes::select('id', 'name')->orderBy('name', 'ASC')->get();
        $sites = sites::select('id', 'name')->orderBy('name', 'ASC')->get();
        $translators = translators::select('id', 'name')->orderBy('name', 'ASC')->get();
        $quality_books = quality_books::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('books.create')->with(['type_books'=>$type_books, 'language_books'=> $language_books, 'tpddcs'=> $tpddcs, 'authors'
            => $authors, 'publishers'=>$publishers, 'status_books'=>$status_books, 'themes'=>$themes, 'sites'=>$sites, 'translators'=>$translators, 'quality_books' => $quality_books]);
    }
    public function create(array $data, $reImage)
    {
        return Book::create([
           'name' => $data['book_name'],
           'subtitle'=>$data['subtitle'],
           'original' => $data['original'],
           'img_src' => $reImage,
           'author_ids' => json_encode($data['author_ids']),
           'symbol_author'=>$data['symbol_author'],
           'translator_ids'=>json_encode($data['translator_ids']),
           'publishing_company_id' => $data['publishing_company_id'],
           'year_publishing' => $data['year_publishing'],
           'republishing' => $data['republishing'],
           'page_number' => $data['page_number'],
           'temporary_content' => $data['temporary_content'],
           'series' => $data['series'],
           'ddc_id' => $data['ddc_id'],
           'theme_id'=>$data['theme_id'],
           'summary' => $data['summary'],
           'language_id' => $data['language_id'],
           'isbn_issn' =>$data['isbn_issn'],
            'input_date' => $data['input_date'],
           'type_book_id' => $data['type_book_id'],
           'cost' => $data['cost'],
           'site_id'=> $data['site_id'],
           'status_id' => $data['status_id'],
           'quantity' => $data['quantity'],
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
     // $dest = '/home/u246535017/domains/tvcongiao.com/public_html/assets/img/';
     $dest = public_path('assets/img/');
     $reImage = '';
     if($request->has('img_src')){
        $image = $request->img_src;
        $reImage = time().'.'.$image->getClientOriginalExtension();
        // $dest = '/home/u246535017/domains/tvcongiao.com/public_html/assets/img/';
        $dest = public_path('assets/img/');

        $image->move($dest, $reImage);
    }

    

    if($record = $this->create($request->except('img_src'), 'assets/img/'.$reImage)){
     Session::flash('message', 'Tạo sách thành công!');
     Session::flash('alert-class', 'alert-success');
     $type_books = type_books::select('id', 'name')->orderBy('name', 'ASC')->get();
     $language_books = language_books::select('id', 'name')->orderBy('name', 'ASC')->get();
     $tpddcs = tpddcs::select('ddc_number', 'ddc_name')->orderBy('ddc_number', 'ASC')->get();
     $authors = Authors::select('id', 'name')->orderBy('name', 'ASC')->get();
     $publishers = publishers::select('id', 'name')->orderBy('name', 'ASC')->get();
     $status_books = status_books::select('id', 'name')->orderBy('name', 'ASC')->get();
     $themes = themes::select('id', 'name')->orderBy('name', 'ASC')->get();
     $sites = sites::select('id', 'name')->orderBy('name', 'ASC')->get();
     $translators = translators::select('id', 'name')->orderBy('name', 'ASC')->get();
     $quality_books = quality_books::select('id', 'name')->orderBy('name', 'ASC')->get();
     return redirect()->route('books')->with(['type_books'=>$type_books, 'language_books'=> $language_books, 'tpddcs'=> $tpddcs, 'authors'=> $authors, 'publishers'=>$publishers, 'status_books'=>$status_books, 'themes'=>$themes, 'sites'=>$sites, 'translators'=>$translators, 'quality_books' => $quality_books]);
 }else{
     Session::flash('message', 'Tạo sách thất bại!');
     Session::flash('alert-class', 'alert-danger');
 }

 return Back();
}


public function edit($id)
{

    $books = Book::find($id);

    $type_books = type_books::select('id', 'name')->orderBy('name', 'ASC')->get();
    $language_books = language_books::select('id', 'name')->orderBy('name', 'ASC')->get();
    $tpddcs = tpddcs::select('id', 'ddc_number', 'ddc_name')->orderBy('ddc_number', 'ASC')->get();
    $authors = Authors::select('id', 'name')->orderBy('name', 'ASC')->get();
    $publishers = publishers::select('id', 'name')->orderBy('name', 'ASC')->get();
    $status_books = status_books::select('id', 'name')->orderBy('name', 'ASC')->get();
    $themes = themes::select('id', 'name')->orderBy('name', 'ASC')->get();
    $sites = sites::select('id', 'name')->orderBy('name', 'ASC')->get();
    $translators = translators::select('id', 'name')->orderBy('name', 'ASC')->get();
    $quality_books = quality_books::select('id', 'name')->orderBy('name', 'ASC')->get();
    return view('books.edit', )->with(['type_books'=>$type_books, 'language_books'=> $language_books, 'tpddcs'=> $tpddcs, 'authors'
        => $authors, 'publishers'=>$publishers, 'status_books'=>$status_books, 'books'=> $books, 'themes'=>$themes, 'sites'=>$sites, 'translators'=>$translators, 'quality_books' => $quality_books]);
}


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
        // $dest = '/home/u246535017/domains/tvcongiao.com/public_html/assets/img/';
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


    