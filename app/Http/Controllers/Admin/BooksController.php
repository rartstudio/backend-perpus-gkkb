<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\Books;
use App\CategoriesBook;
use App\Http\Controllers\Controller;
use App\Publisher;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index',[
            'title'=> 'Daftar Buku'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create',[
            'title' => 'Tambah Buku',
            'authors' => Authors::orderBy('author_name','ASC')->get(),
            'publishers' => Publisher::orderBy('pub_name','ASC')->get(),
            'categories_book' => CategoriesBook::orderBy('cbo_name','ASC')->get()
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:20',
            'qty' => 'required|numeric',
            'cover' => 'file|image',
            'author_id' => 'required',
            'cbo_id' => 'required',
            'pub_id' => 'required',
        ],[
            'title.required' => 'Judul buku harus diisi',
            'description.required' => 'Deskripsi buku harus diisi',
            'qty.required' => 'Qty buku harus diisi',
            'author_id.required' => 'Penulis buku harus diisi',
            'cbo_id.required' => 'Kategori buku harus diisi',
            'pub_id.required' => 'Penerbit buku harus diisi',
        ]);

        //set default null if user dont submit a cover image
        $cover = null;

        //checking if user pass a file cover image
        if($request->hasFile('cover')){
            $cover = $request->file('cover')->store('assets/covers');
        }

        Books::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'pub_id' => $request->pub_id,
            'cbo_id' => $request->cbo_id,
            'qty' => $request->qty,
            'cover' => $cover
        ]);

        return redirect()->route('admin.books.index')->with('success','Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
