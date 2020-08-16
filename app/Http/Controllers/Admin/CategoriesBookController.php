<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesBook;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesBookRequest;
use Illuminate\Http\Request;

class CategoriesBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories_book.index',
        [
            'title' => 'Data Kategori Buku'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories_book.create',[
            'title' => 'Tambah Kategori Buku'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesBookRequest $request)
    {
        // $this->validate($request, [
        //     'cbo_name' => 'required|min:2'
        // ],[
        //     'cbo_name.required' => 'Nama kategori harus diisi',
        //     'cbo_name.min' =>'Nama kategori minimal 2 huruf'
        // ]);

        $validated = $request->validated();

        CategoriesBook::create($validated);

        return redirect()->route('admin.categories_book.index')->with('success', 'data kategori buku berhasil disimpan');
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
    public function edit(CategoriesBook $categories_book)
    {
        return view('admin.categories_book.edit',[
            'categories_book'=> $categories_book,
            'title'=> 'Edit Kategori Buku'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesBookRequest $request, CategoriesBook $categories_book)
    {
        $validated = $request->validated();

        $categories_book->update($validated);
        return redirect()->route('admin.categories_book.index')->with('success','Data Kategori Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriesBook $categories_book)
    {
        $categories_book->delete();
        return redirect()->route('admin.categories_book.index')->with('danger','Data kategori buku berhasil dihapus');
    }
}
