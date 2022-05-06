<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

// rendering view using the global view helper (normal)
// and passing data using associative array
Route::get('/penulis', function () {
    $authors = [
        [
            "name" => "Joanne Rowling",
            "penname" => "J. K. Rowling or Robert Galbraith",
            "born" => "Gloucestershire, 31 July 1965", 
        ],
        [
            "name" => "Pramoedya Ananta Toer",
            "penname" => "Pramoedya Ananta Toer",
            "born" => "Blora, 6 February 1925",
        ]
    ];

    return view('penulis', [
        "title" => "Penulis",
        "authors" => $authors
    ]);
});

// rendering view using the View facade
// and passing data using 'with' function
Route::get('/', function () {
    $daftar_buku = [
        [
            "judul" => "Harry Potter and the Philosopher's Stone",
            "slug" => "harry-potter-pilosopher-stone",
            "penulis" => "J.K. Rowling",
            "penerbit" => "Bloomsbury",
            "tahun_terbit" => "1997",
            "isbn" => "0-7475-3269-9",
        ],
        [
            "judul" => "Bumi Manusia",
            "slug" => "bumi-manusia",
            "penulis" => "Pramoedya Ananta Toer",
            "penerbit" => "Hasta Mitra",
            "tahun_terbit" => "1980",
            "isbn" => "9799731232",    
        ],
    ];

    return View::make('daftarbuku')
                ->with('title', 'Daftar Buku')
                ->with('books', $daftar_buku);
});

// nested view directory 
// passing data using 'compact' function
Route::get('lists/{slug}', function($slug) {
    $daftar_buku = [
        [
            "judul" => "Harry Potter and the Philosopher's Stone",
            "slug" => "harry-potter-pilosopher-stone",
            "penulis" => "J.K. Rowling",
            "penerbit" => "Bloomsbury",
            "tahun_terbit" => "1997",
            "isbn" => "0-7475-3269-9",
        ],
        [
            "judul" => "Bumi Manusia",
            "slug" => "bumi-manusia",
            "penulis" => "Pramoedya Ananta Toer",
            "penerbit" => "Hasta Mitra",
            "tahun_terbit" => "1980",
            "isbn" => "9799731232",
        ],
    ];

    $store_book = [];
    foreach($daftar_buku as $b){
        if($b["slug"] === $slug){
            $store_book = $b;
        }
    }

    $title = "Detail Buku";
    $book = $store_book;
    
    return view('book.detail', compact('title', 'book'));
});

// nested view directory
// and passing data using 'with' function
Route::get('/form', function() {
    return view('book.input')->with('title', 'Form Input');
});

Route::post('/store', [BookController::class, 'create']);