<?php


//home

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.dashboard',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
});

//author index
Breadcrumbs::for('admin.authors.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.authors.index'));
});

//author tambah
Breadcrumbs::for('admin.authors.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.authors.index'));
    $trail->push('Tambah Penulis', route('admin.authors.create'));
});

//author edit
Breadcrumbs::for('admin.authors.edit',function($trail,$author){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.authors.index'));
    $trail->push('Edit Penulis', route('admin.authors.edit', $author));
});