<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getCategories(){
        $categories = Category::all();
        return view('categories.categories', ['categories'=>$categories]);
    }
    public function categoryProfile($id){

    }
}
