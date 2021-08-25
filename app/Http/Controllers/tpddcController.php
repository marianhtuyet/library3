<?php

namespace App\Http\Controllers;

use App\Models\tpddc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tpddcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $books = DB::table('tpddc')
        ->join('books', 'books.ddc_id', '=', 'tpddc.id')
        ->join('author_books', 'author_books.book_id', '=', 'books.id')
        ->join('authors', 'authors.id', '=', 'author_books.author_id')
        ->where([['tpddc.ddc','>=', 100], ['tpddc.ddc', '<', 300]])
        ->select( 'authors.name as author_name', 'books.*')
        ->orderBy('tpddc.ddc', 'ASC')
        ->get();

        return view('category.100', compact('books'));
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
     * @param  \App\Models\tpddc  $tpddc
     * @return \Illuminate\Http\Response
     */
    public function show(tpddc $tpddc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tpddc  $tpddc
     * @return \Illuminate\Http\Response
     */
    public function edit(tpddc $tpddc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tpddc  $tpddc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tpddc $tpddc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tpddc  $tpddc
     * @return \Illuminate\Http\Response
     */
    public function destroy(tpddc $tpddc)
    {
        //
    }
}

