<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create() {
        return view('category.create');

    }
    public function store(Request $request) {
        $request -> validate([
            'name' => 'required',
            'desc'=> 'required'
        ]);

        DB::table('categories')->insert([
            'name' => $request->name,
            'desc' => $request->desc
        ]);
        return redirect('/category');

    }

    public function index(){

        $categories = DB::table('categories')->get();
        // dd($categories);
        return view('category.show', ['categories'=>$categories]);

    }

    public function show ($id){
        $categories = Category::find($id);
        return view('category.detail', ['categories'=>$categories]);


    }

    public function edit($id){
        $categories = DB::table('categories')->where('id', $id)->first();
        return view('category.edit', ['categories'=>$categories]);
    }

    public function update(Request $request, $id){
        $request -> validate([
            'name' => 'required',
            'desc'=> 'required'
        ]);
        DB::table('categories')
        ->where('id', $id)
        ->update(['name' => $request->name, 'desc' => $request->desc]);

        return redirect('/category');

    }
    public function destroy($id){
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/category');
    }

}
