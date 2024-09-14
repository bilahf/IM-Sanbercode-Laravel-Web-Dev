<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Borrow;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;



class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);

    }
    public function index()
    {
        $books= Books::get();
        return view('books.index',['books' => $books]);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('books.create',['category'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'title' => 'required',
            'summary'=> 'required',
            'category_id'=> 'required',
            'stock'=> 'required',
            'image'=> 'required|image|mimes:png,jpg,jpeg'
        ]);
        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $fileName);



        $books = new Books;
        $books->title = $request->title;
        $books->summary = $request->summary;
        $books->category_id = $request->category_id;
        $books->stock = $request->stock;
        $books->image = $fileName;
        $books->save();
        return redirect('/books');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::find($id);
        $borrow = Borrow::where('book_id', $id)->with('user')->get();
        return view('books.detail',['books'=> $books, 'borrow'=>$borrow]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Books::find($id);
        $categories = Category::get();
        return view('books.update',['books'=> $books,'categories'=> $categories]);



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'title' => 'required',
            'summary'=> 'required',
            'category_id'=> 'required',
            'stock'=> 'required',
            'image'=> 'required|image|mimes:png,jpg,jpeg'
        ]);
        $books = Books::find($id);
        if ($request->has('image')) {
            $path ='images/';
            File::delete($path. $books->image);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $fileName);
            $books->image = $fileName;



            # code...
        }
        $books->title = $request['title'];
        $books->summary = $request['summary'];
        $books->category_id = $request['category_id'];
        $books->stock = $request['stock'];
        $books->save();
        return redirect('/books');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        $path ='images/';
        File::delete($path. $books->image);
        $books->delete();
        return redirect('/books');

    }
    public function storeBorrow(Request $request,$id){
        $request->validate([
            'tanggal_peminjaman'=>'required|date',
            'tanggal_pengembalian'=>'required|date'
        ]);
        $borrow=new Borrow();
        $borrow->book_id=$id;
        $borrow->user_id=Auth::id();
        $borrow->tanggal_peminjaman=$request['tanggal_peminjaman'];
        $borrow->tanggal_pengembalian=$request['tanggal_pengembalian'];
        $borrow->save();
        return redirect('/books');

    }
}
