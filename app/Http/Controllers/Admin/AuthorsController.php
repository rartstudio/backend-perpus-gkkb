<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorsRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.author.index',
        [
            'title' => 'Data Penulis'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create',[
            'title' => 'Tambah Penulis'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        // $this->validate($request, [
        //     'author_name' => 'required|min:3'
        // ],[
        //     'author_name.required' => 'Nama penulis harus diisi',
        //     'author_name.min' => 'Nama penulis minimal 3 huruf'
        // ]);

        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['author_name']);

        Authors::create($validated);

        return redirect()->route('admin.authors.index')->with('success', 'Data penulis berhasil ditambahkan');
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
    public function edit(Authors $author)
    {
        return view('admin.author.edit',[
            'author' => $author,
            'title' => 'Edit Penulis'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Authors $author)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['author_name']);

        $author->update($validated);
        return redirect()->route('admin.authors.index')
                ->with('info','Data Penulis berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authors $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index')
            ->with('danger','Data penulis berhasil dihapus');
    }
}
