<?php


//home

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin.dashboard',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
});


Breadcrumbs::for('admin.authors.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.authors.index'));
});


Breadcrumbs::for('admin.authors.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.authors.index'));
    $trail->push('Tambah Penulis', route('admin.authors.create'));
});


Breadcrumbs::for('admin.authors.edit',function($trail,$author){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penulis', route('admin.authors.index'));
    $trail->push('Edit Penulis', route('admin.authors.edit', $author));
});


Breadcrumbs::for('admin.categories_book.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Buku', route('admin.categories_book.index'));
});


Breadcrumbs::for('admin.categories_book.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Buku', route('admin.categories_book.index'));
    $trail->push('Tambah Kategori Buku', route('admin.categories_book.create'));
});


Breadcrumbs::for('admin.categories_book.edit',function($trail,$category_book){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Buku', route('admin.categories_book.index'));
    $trail->push('Edit Kategori Buku', route('admin.categories_book.edit', $category_book));
});


Breadcrumbs::for('admin.publishers.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penerbit', route('admin.publishers.index'));
});


Breadcrumbs::for('admin.publishers.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penerbit', route('admin.publishers.index'));
    $trail->push('Tambah Penerbit', route('admin.publishers.create'));
});


Breadcrumbs::for('admin.publishers.edit',function($trail,$publisher){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Penerbit', route('admin.publishers.index'));
    $trail->push('Edit Penerbit', route('admin.publishers.edit', $publisher));
});


Breadcrumbs::for('admin.categories_state.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Status', route('admin.categories_state.index'));
});


Breadcrumbs::for('admin.categories_state.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Status', route('admin.categories_state.index'));
    $trail->push('Tambah Kategori Status', route('admin.categories_state.create'));
});


Breadcrumbs::for('admin.categories_state.edit',function($trail,$category_state){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Kategori Status', route('admin.categories_state.index'));
    $trail->push('Edit Kategori Status', route('admin.categories_state.edit', $category_state));
});


//books

Breadcrumbs::for('admin.books.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.books.index'));
});


Breadcrumbs::for('admin.books.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.books.index'));
    $trail->push('Tambah Buku', route('admin.books.create'));
});


Breadcrumbs::for('admin.books.edit',function($trail,$book){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.books.index'));
    $trail->push('Edit Buku', route('admin.books.edit', $book));
});

Breadcrumbs::for('admin.books.show',function($trail,$book){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Buku', route('admin.books.index'));
    $trail->push('Detail Buku', route('admin.books.show', $book));
});


//members

Breadcrumbs::for('admin.members.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Member', route('admin.members.index'));
});


Breadcrumbs::for('admin.members.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Member', route('admin.members.index'));
    $trail->push('Tambah Member', route('admin.members.create'));
});


Breadcrumbs::for('admin.members.edit',function($trail,$member){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Member', route('admin.members.index'));
    $trail->push('Edit Member', route('admin.members.edit', $member));
});

Breadcrumbs::for('admin.members.show',function($trail,$member){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Member', route('admin.members.index'));
    $trail->push('Detail Member', route('admin.members.show', $member));
});

//recommendation books
Breadcrumbs::for('admin.recommendation-books.index',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Rekomendasi Buku', route('admin.recommendation-books.index'));
});

Breadcrumbs::for('admin.recommendation-books.create',function($trail){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Rekomendasi Buku', route('admin.recommendation-books.index'));
    $trail->push('Tambah Rekomendasi Buku', route('admin.recommendation-books.create'));
});

Breadcrumbs::for('admin.recommendation-books.edit',function($trail,$recommendation_book){
    $trail->push('Beranda', route('admin.dashboard'));
    $trail->push('Rekomendasi Buku', route('admin.recommendation-books.index'));
    $trail->push('Edit Rekomendasi Buku', route('admin.recommendation-books.edit', $recommendation_book));
});