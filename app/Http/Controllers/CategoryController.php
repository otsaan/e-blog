<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        return view('admin.categories')->with([
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        return Category::create([
            'name' => $request['name']
        ]);
    }

    public function update($username, $id, Request $request)
    {
        $category = Category::find($id);
        $category->name = $request['name'];
        $category->save();
    }

}
