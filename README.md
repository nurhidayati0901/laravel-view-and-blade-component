# Laravel View and Blade Component

Nama Anggota:
1. Helsa Nesta Dhaifullah
2. Nur Hidayati (05111940000028)

Link Youtube : 

---

## A. Laravel Views

### Latar Belakang Topik
Untuk mempermudah perawatan suatu aplikasi, biasanya terdapat pemisahan terhadap bagian logika bisnis dan juga bagian presentasi atau bagian yang ditampilkan ke pengguna. Pada Laravel, untuk bagian presentasi ini ditangani oleh View. Sebenarnya kita bisa saja langsung menuliskan kode HTML pada route ataupun controller, namun hal ini akan membuat perawatan aplikasi menjadi semakin sulit. View pada Laravel ini biasanya disimpan di folder `resource/views`, dan biasanya berisi kode HTML.

### Konsep-konsep
Laravel merupakan kerangka kerja berbasis MVC, dimana dalam V dalam MVC tersebut merupakan kependekan dari View. View ini adalah data yang akan ditampilkan kepada pengguna pada browser mereka dan pengguna juga dapat berinteraksi dengan View ini.
Pada tutorial di bawah akan dijelaskan cara membuat, menampilkan, dan memberikan data ke dalam View. 

### Langkah-langkah Tutorial

Langkah pertama yaitu membuat view. Untuk membuat view, kita dapat langsung membuat file pada folder `resource/views`. Nama yang diberikan harus diakhiri dengan `.blade.php` untuk dapat menggunakan templating engine Laravel yaitu Blade.

Setelah membuat file view, selanjutnya kita bisa mulai mengisi file tersebut dengan kode HTML dan merender view tersebut dengan menggunakan global `view` helper.


Selain menggunakan helper `view`, kita juga dapat menggunakan `View` facade


Isi dari view yang kita tampilkan bisa saja berubah sesuai dengan data yang diinginkan. Kita dapat memberikan data ke dalam view yang dapat ditampilkan dengan bantuan templating engine Blade.
Untuk mengirimkan data ke view, dapat digunakan beberapa cara :
- Menggunakan Associative Array:
```
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
```
- Menggunakan fungsi `with` milik `view` helper:
```
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
```

- Menggunakan fungsi `compact` PHP:
Fungsi ini membuat array yang mengandung variable dan nilai dari variable itu.
```
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
```

## B. Blade Component

### Latar Belakang Topik

Blade adalah fitur yang disediakan Laravel untuk proses templating sederhana. Fitur ini sangat bermanfaat dalam proses pengembangan tampilan halaman web. Tidak seperti fitur templating PHP populer lainnya, Blade tidak membatasi pemrogram untuk menggunakan kode PHP biasa dalam membuat kode untuk tampilan. Semua tampilan Blade dikompilasi ke dalam kode PHP biasa dan kemudian disimpan dalam cache hingga diubah, yang berarti Blade pada dasarnya tidak menambahkan beban atau overhead pada saat aplikasi dijalankan. File tampilan blade menggunakan ekstensi file `.blade.php` dan biasanya disimpan di direktori `resources/views`. 

### Konsep-konsep

Component di blade pada laravel bermanfaat untuk membuat satu grup tampilan yang sering muncul di banyak halaman atau muncul beberapa kali di satu halaman. Component bagus digunakan untuk membangun sebuah view pada laravel dikarenakan kita bisa melakukan pengehematan waktu dan tenaga untuk tidak menulisakan code yang berulang-ulang. Selain itu, component bermanfaat agar kualitas code yang kita buat menjadi mudah dipahami dan menjadi lebih rapi.

### Langkah-langkah Tutorial
Saat membuat tampilan web, biasanya kita melakukan pembuatan card yang berulang-ulang pada sebuah view blade, misalnya kita akan membuat menu daftar editor pada sebuah web penyedia buku bacaan. 
```
@extends('layout')

@section('container')
    <div class="card mt-3">
        <div class="card-body">
            <div class="h3">Daftar Editor</div>
            <br>
            <div class="justify-content-center mt-4 card">
                <div class="card-body">
                    Nama1
                </div>
            </div>
            <div class="justify-content-center mt-4 card">
                <div class="card-body">
                    Nama2
                </div>
            </div>
        </div>
    </div>
@endsection
```
Pada view `editor.blade.php`, akan menggunakan card untuk menampilkan masing-masing data editor. Apabila kita menerapkan contoh kode di atas, tentu akan cukup merepotkan bila kita melakukan hal yang sama terus menerus, maka untuk mengatasi masalah tersebut kita akan memanfaatkan salah satu fitur laravel yaitu menggunakan blade component.

Pertama, mengetikkan perintah berikut pada terminal untuk membuat component.
```
php artisan make:component card
```


