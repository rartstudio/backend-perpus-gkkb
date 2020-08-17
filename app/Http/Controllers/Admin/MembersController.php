<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesState;
use App\Http\Controllers\Controller;
use App\Http\Requests\MembersRequest;
use App\Members;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index',
        [
            'title' => 'Data Member'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create',[
            'title' => 'Tambah Member',
            'categories_state' => CategoriesState::orderBy('cst_name','ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembersRequest $request)
    {

        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['first_name'].' '.$request['last_name']);
        $validated['date_of_birth'] = date('yy-m-d',strtotime($validated['date_of_birth']));
        $validated['member_code'] = $request['member_code'];
        $validated['last_name'] = $request['last_name'];
        $validated['cst_id']= $request['cst_id'];
        $validated['user_id'] = Auth::id();

        Members::create($validated);

        return redirect()->route('admin.members.index')->with('success', 'Data member berhasil ditambahkan');
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
    public function edit(Members $member)
    {
        return view('admin.author.edit',[
            'members' => $member,
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
    public function update(MembersRequest $request, Members $member)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['author_name']);

        $member->update($validated);
        return redirect()->route('admin.authors.index')
                ->with('info','Data Penulis berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $member)
    {
        $member->delete();
        return redirect()->route('admin.member.index')
            ->with('danger','Data member berhasil dihapus');
    }
}
