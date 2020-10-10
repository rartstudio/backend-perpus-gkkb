<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\Books;
use App\CategoriesBook;
use App\Http\Controllers\Controller;
use App\Http\Requests\BooksRequest;
use App\Publisher;
use App\StockMaster;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//import storage
use Illuminate\Support\Facades\Storage;

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
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'title' => 'required',
    //         'description' => 'required|min:20',
    //         'qty' => 'required|numeric',
    //         'cover' => 'file|image',
    //         'author_id' => 'required',
    //         'cbo_id' => 'required',
    //         'pub_id' => 'required',
    //     ],[
    //         'title.required' => 'Judul buku harus diisi',
    //         'description.required' => 'Deskripsi buku harus diisi',
    //         'qty.required' => 'Qty buku harus diisi',
    //         'author_id.required' => 'Penulis buku harus diisi',
    //         'cbo_id.required' => 'Kategori buku harus diisi',
    //         'pub_id.required' => 'Penerbit buku harus diisi',
    //     ]);

    //     //set default null if user dont submit a cover image
    //     $cover = null;

    //     //checking if user pass a file cover image
    //     if($request->hasFile('cover')){
    //         $cover = $request->file('cover')->store('assets/covers');
    //     }

    //     Books::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'author_id' => $request->author_id,
    //         'pub_id' => $request->pub_id,
    //         'cbo_id' => $request->cbo_id,
    //         'qty' => $request->qty,
    //         'cover' => $cover
    //     ]);

    //     return redirect()->route('admin.books.index')->with('success','Data buku berhasil ditambahkan');
    // }

    public function store(BooksRequest $request)
    {
        $validated= $request->validated();
        $validated['slug'] = Str::slug($validated['title']);

        //set default null if user dont submit a cover image
        $cover = null;

        //checking if user pass a file cover image
        if($request->hasFile('cover')){
            $cover = $request->file('cover')->store('assets/covers');
        }

        $admin_id = Auth::user()->id;

        $book = Books::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'author_id' => $validated['author_id'],
            'pub_id' => $validated['pub_id'],
            'cbo_id' => $validated['cbo_id'],
            'qty' => $validated['qty'],
            'admin_id' => $admin_id,
            'cover' => $cover
        ]);

        //get book id
        $book_id = $book->id;

        StockMaster::create([
            'book_id' => $book_id,
            'beginning' => $validated['qty'],
            'ending' => $validated['qty'],
            'admin_id' => $admin_id
        ]);

        return redirect()->route('admin.books.index')->with('success','Data buku berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        return view('admin.book.show',[
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        return view('admin.book.edit',[
            'title' => 'Edit Buku',
            'book' => $book,
            'authors' => Authors::orderBy('author_name','ASC')->get(),
            'publishers' => Publisher::orderBy('pub_name','ASC')->get(),
            'categories_book' => CategoriesBook::orderBy('cbo_name','ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Books $book)
    // {
    //     $this->validate($request, [
    //         'title' => 'required',
    //         'description' => 'required|min:20',
    //         'qty' => 'required|numeric',
    //         'cover' => 'file|image',
    //         'author_id' => 'required',
    //         'cbo_id' => 'required',
    //         'pub_id' => 'required',
    //     ],[
    //         'title.required' => 'Judul buku harus diisi',
    //         'description.required' => 'Deskripsi buku harus diisi',
    //         'qty.required' => 'Qty buku harus diisi',
    //         'author_id.required' => 'Penulis buku harus diisi',
    //         'cbo_id.required' => 'Kategori buku harus diisi',
    //         'pub_id.required' => 'Penerbit buku harus diisi',
    //     ]);

    //     //if user dont change previous image
    //     $cover = $book->cover;

    //     //checking $request cover if exist
    //     if($request->hasFile('cover')){
    //         //delete previous image if user update new one
    //         Storage::delete($book->cover);

    //         //storing file image to assets/cover on public path (check filesystem.php)
    //         $cover = $request->file('cover')->store('assets/cover');
    //     }

    //     //updating data to table
    //     $book->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'author_id' => $request->author_id,
    //         'pub_id' => $request->pub_id,
    //         'cover' => $cover,
    //         'cbo_id' => $request->cbo_id,
    //         'qty' => $request->qty
    //     ]);

    //     return redirect()->route('admin.books.index')
    //             ->with('info', 'data buku berhasil diubah');
    // }

    public function update(BooksRequest $request, Books $book)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['title']);

        //if user dont change previous image
        $cover = $book->cover;

        //checking $request cover if exist
        if($request->hasFile('cover')){
            //delete previous image if user update new one
            Storage::delete($book->cover);

            //storing file image to assets/cover on public path (check filesystem.php)
            $cover = $request->file('cover')->store('assets/cover');
        }

        //updating data to table
        $book->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'author_id' => $validated['author_id'],
            'pub_id' => $validated['pub_id'],
            'cover' => $cover,
            'cbo_id' => $validated['cbo_id'],
            'qty' => $validated['qty']
        ]);

        return redirect()->route('admin.books.index')
                ->with('info', 'data buku berhasil diubah');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')
                ->with('danger','data buku berhasil dihapus');
    }
}
