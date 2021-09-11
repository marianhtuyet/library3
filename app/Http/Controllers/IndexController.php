<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getList()
    {
//        $bestsale = Products::where('best_sale', '1')->get();
        return view('category.category_content');
    }

}
