<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest;
use App\Publisher;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.publisher.index',[
            'title'=> 'Data Penerbit',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publisher.create',[
            'title' => 'Tambah Penerbit'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        // $this->validate($request, [
        //     'pub_name' => 'required|min:2'
        // ],[
        //     'pub_name.required' => 'Nama Penerbit Buku harus diisi',
        //     'pub_name.min' => 'Nama penerbit minimal 2 huruf'
        // ]);

        $validated = $request->validated();

        Publisher::create($validated);

        return redirect()->route('admin.publishers.index')->with('success', 'data penerbit berhasil ditambahkan');
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
    public function edit(Publisher $publisher)
    {
        return view('admin.publisher.edit',[
            'title' => 'Edit Data Penerbit',
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $validated = $request->validated();
        
        $publisher->update($validated);
        return redirect()->route('admin.publishers.index')->with('success','Data Publisher berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('admin.publishers.index')->with('danger','Data Penerbit berhasil dihapus');
    }
}
