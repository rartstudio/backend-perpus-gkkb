<?php

namespace App\Http\Controllers\Admin;

use App\Books;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecommendationBooksRequest;
use App\RecomendationBooks;
use Illuminate\Http\Request;

class RecomendationBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.recommendation.index',
        [
            'title' => 'Data Buku Rekomendasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recommendation.create',[
            'title' => 'Tambah Member',
            'books' => Books::orderBy('title','ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecommendationBooksRequest $request)
    {
        $validated = $request->validated();
        //$validated['slug'] = Str::slug($validated['first_name'].' '.$request['last_name']);
        $validated['date_of_birth'] = date('yy-m-d',strtotime($validated['date_of_birth']));
        $validated['member_code'] = $request['member_code'];
        $validated['last_name'] = $request['last_name'];
        $validated['cst_id']= $request['cst_id'];
        //$validated['user_id'] = Auth::id();

        //Members::create($validated);

        return redirect()->route('admin.members.index')->with('success', 'Data member berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RecomendationBooks $recommendation_book)
    {
        return view('admin.recommendation.edit',[
            'recommendation_book' => $recommendation_book,
            'books' => Books::orderBy('title','ASC')->get(),
            'title' => 'Edit Rekomendasi Buku'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecomendationBooks $request, RecomendationBooks $recommendation_book)
    {
        $validated = $request->validated();
        //$validated['slug'] = Str::slug($validated['first_name'].' '.$request['last_name']);
        $validated['date_of_birth'] = date('yy-m-d',strtotime($validated['date_of_birth']));
        $validated['member_code'] = $request['member_code'];
        $validated['last_name'] = $request['last_name'];
        $validated['cst_id']= $request['cst_id'];
        //$validated['user_id'] = Auth::id();

        $recommendation_book->update($validated);
        return redirect()->route('admin.members.index')
                ->with('info','Data Member berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecomendationBooks $recommendation_book)
    {
        $recommendation_book->delete();
        return redirect()->route('admin.members.index')
            ->with('danger','Data member berhasil dihapus');
    }
}
