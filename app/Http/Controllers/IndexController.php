<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getList()
    {
        $categoty = ['0'=> 0, '100'=>100, '200'=>200, '300'=>300, '400'=> 400, '500'=>500];
        return view('category.category_content')->with('categoty', $categoty);
    }

}
