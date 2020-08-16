<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesState;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesStateRequest;
use Illuminate\Http\Request;

class CategoriesStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories_state.index',[
            'title' => 'Tambah Kategori Status'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories_state.create',[
            'title' => 'Tambah Kategori Status'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesStateRequest $request)
    {
        // $this->validate($request,[
        //     'cst_name'=> 'required|min:3'
        // ],[
        //     'cst_name.required' => 'Nama Kategori Status harus diisi',
        //     'cst_name.min' => 'Nama Kategori Status minimal 3 huruf'
        // ]);
        $validated = $request->validated();

        CategoriesState::create($validated);

        return redirect()->route('admin.categories_state.index')->with('success','Data Kategori Status berhasil disimpan');
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
    public function edit(CategoriesState $categories_state)
    {
        return view('admin.categories_state.edit',[
            'title' => 'Edit Kategori Status',
            'categories_state' => $categories_state
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesStateRequest $request, CategoriesState $categories_state)
    {
        
        $validated = $request->validated();
        
        $categories_state->update($validated);
        return redirect()->route('admin.categories_state.index')->with('success','Data Kategori Status berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriesState $categories_state)
    {
        $categories_state->delete();
        return redirect()->route('admin.categories_state.index')->with('danger','Data kategori status berhasil disimpan');
    }
}
