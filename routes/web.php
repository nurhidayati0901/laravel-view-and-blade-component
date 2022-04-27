<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', [
        "title" => "Penulis",
        "name1" => "Helsa Nesta Dhaifullah",
        "github1" => "helsanesta",
        "name2" => "Nur Hidayati",
        "github2" => "nurhidayati0901",
    ]);
});

Route::get('/list', function () {
    $daftar_buku = [
        [
            "judul" => "Harry Potter",
            "slug" => "harry-potter",
            "penulis" => "J.K.Rowling",
            "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde ad voluptates ab molestias et tempora quisquam eum nostrum magnam porro!"
        ],
        [
            "judul" => "Bumi Manusia",
            "slug" => "bumi-manusia",
            "penulis" => "Pramoedya Ananta Toer",
            "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde ad voluptates ab molestias et tempora quisquam eum nostrum magnam porro!"
        ],
    ];

    return view('daftarbuku', [
        "title" => "Dafar Buku",
        "buku" => $daftar_buku
    ]);
});

Route::get('lists/{slug}', function($slug) {
    $daftar_buku = [
        [
            "judul" => "Harry Potter",
            "slug" => "harry-potter",
            "penulis" => "J.K.Rowling",
            "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde ad voluptates ab molestias et tempora quisquam eum nostrum magnam porro!"
        ],
        [
            "judul" => "Bumi Manusia",
            "slug" => "bumi-manusia",
            "penulis" => "Pramoedya Ananta Toer",
            "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde ad voluptates ab molestias et tempora quisquam eum nostrum magnam porro!"
        ],
    ];

    $store_book = [];
    foreach($daftar_buku as $b){
        if($b["slug"] === $slug){
            $store_book = $b;
        }
    }
    return view('detail', [
        "title" => "Detail Buku",
        "buku" => $store_book
    ]);
});