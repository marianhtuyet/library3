<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('book.book', compact('ddc'));
        
        return view('book.book');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
    public function getBookInfo($id){
        $books = DB::table('books')
        ->join('author_books', 'author_books.book_id', '=', 'books.id')
        ->join('authors', 'authors.id', '=', 'author_books.author_id')
        ->join('tpddcs', 'books.ddc_id', '=', 'tpddcs.id')
        ->join('language_books', 'language_books.id', '=', 'books.language_id')
        ->join('publishers', 'publishers.id', '=', 'books.publishing_company_id')
        ->join('status_books', 'status_books.id', '=', 'books.status_id')
        ->select( 'authors.name as author_name', 'tpddcs.ddc_name', 'language_books.name as language_name', 'publishers.name as publishers_name', 'status_books.name as status_name', 'books.*')
        ->where('books.id',$id)
        ->get();
        return view('book.book', compact('books'));
    }

}


