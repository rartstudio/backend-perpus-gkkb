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

//author index
Breadcrumbs::for('admin.categories_book.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Buku', route('admin.categories_book.index'));
});

//author tambah
Breadcrumbs::for('admin.categories_book.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Buku', route('admin.categories_book.index'));
    $trail->push('Tambah Kategori Buku', route('admin.categories_book.create'));
});

//author edit
Breadcrumbs::for('admin.categories_book.edit',function($trail,$author){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Buku', route('admin.categories_book.index'));
    $trail->push('Edit Kategori Buku', route('admin.categories_book.edit', $author));
});

//author index
Breadcrumbs::for('admin.publishers.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penerbit', route('admin.publishers.index'));
});

//author tambah
Breadcrumbs::for('admin.publishers.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penerbit', route('admin.publishers.index'));
    $trail->push('Tambah Penerbit', route('admin.publishers.create'));
});

//author edit
Breadcrumbs::for('admin.publishers.edit',function($trail,$author){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penerbit', route('admin.publishers.index'));
    $trail->push('Edit Penerbit', route('admin.publishers.edit', $author));
});

//author index
Breadcrumbs::for('admin.categories_state.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Status', route('admin.categories_state.index'));
});

//author tambah
Breadcrumbs::for('admin.categories_state.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Status', route('admin.categories_state.index'));
    $trail->push('Tambah Kategori Status', route('admin.categories_state.create'));
});

//author edit
Breadcrumbs::for('admin.categories_state.edit',function($trail,$author){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Status', route('admin.categories_state.index'));
    $trail->push('Edit Kategori Status', route('admin.categories_state.edit', $author));
});