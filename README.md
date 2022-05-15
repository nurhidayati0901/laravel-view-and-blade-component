# Laravel View and Blade Component

Nama Anggota:
1. Helsa Nesta Dhaifullah - 5025201005
2. Nur Hidayati - 05111940000028

Link Youtube : [here](https://www.youtube.com/watch?v=Fkhm5jv8gYI)

---

## A. Laravel Views

### Latar Belakang Topik
Untuk mempermudah perawatan suatu aplikasi, biasanya terdapat pemisahan terhadap bagian logika bisnis dan juga bagian presentasi atau bagian yang ditampilkan ke pengguna. Pada Laravel, untuk bagian presentasi ini ditangani oleh View. Sebenarnya kita bisa saja langsung menuliskan kode HTML pada route ataupun controller, namun hal ini akan membuat perawatan aplikasi menjadi semakin sulit. View pada Laravel ini biasanya disimpan di folder `resource/views`, dan biasanya berisi kode HTML.

### Konsep-konsep
Laravel merupakan kerangka kerja berbasis MVC, dimana dalam V dalam MVC tersebut merupakan kependekan dari View. View ini adalah data yang akan ditampilkan kepada pengguna pada browser mereka dan pengguna juga dapat berinteraksi dengan View ini. Pada tutorial di bawah akan dijelaskan cara membuat, menampilkan, dan memberikan data ke dalam View. 

### Langkah-langkah Tutorial

Langkah pertama yaitu membuat view. Untuk membuat view, kita dapat langsung membuat file pada folder `resource/views`. Nama yang diberikan harus diakhiri dengan `.blade.php` untuk dapat menggunakan templating engine Laravel yaitu Blade.

Setelah membuat file view, selanjutnya kita bisa mulai mengisi file tersebut dengan kode HTML dan merender view tersebut dengan menggunakan global `view` helper atau juga dapat menggunakan `View` facade.

Isi dari view yang kita tampilkan bisa saja berubah sesuai dengan data yang diinginkan. Kita dapat memberikan data ke dalam view yang dapat ditampilkan dengan bantuan templating engine Blade.
Untuk mengirimkan data ke view, dapat digunakan beberapa cara :
- Menggunakan Associative Array
```ruby
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
Berikut tampilannya:

![image](https://drive.google.com/uc?export=view&id=1L14xprIy4rZWcaPqg6ycp9QoaXEt3zLl)

- Menggunakan fungsi `with` milik `view` helper
```ruby
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
Berikut tampilannya:

![image](https://drive.google.com/uc?export=view&id=1rJsi6i2FFvbeqyOEyZyP5eaxc_7U93lz)

- Menggunakan fungsi `compact` PHP

Fungsi ini membuat array yang mengandung variable dan nilai dari variable itu.
```ruby
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
Berikut tampilannya:

![image](https://drive.google.com/uc?export=view&id=16SKt2Keqc58_7kGkg-fxZkhbrn7xsilY)

## B. Blade Component

### Latar Belakang Topik

Blade adalah fitur yang disediakan Laravel untuk proses templating sederhana. Fitur ini sangat bermanfaat dalam proses pengembangan tampilan halaman web. Tidak seperti fitur templating PHP populer lainnya, Blade tidak membatasi pemrogram untuk menggunakan kode PHP biasa dalam membuat kode untuk tampilan. Semua tampilan Blade dikompilasi ke dalam kode PHP biasa dan kemudian disimpan dalam cache hingga diubah, yang berarti Blade pada dasarnya tidak menambahkan beban atau overhead pada saat aplikasi dijalankan. File tampilan blade menggunakan ekstensi file `.blade.php` dan biasanya disimpan di direktori `resources/views`. 

### Konsep-konsep

Component di blade pada laravel bermanfaat untuk membuat satu grup tampilan yang sering muncul di banyak halaman atau muncul beberapa kali di satu halaman. Component bagus digunakan untuk membangun sebuah view pada laravel dikarenakan kita bisa melakukan pengehematan waktu dan tenaga untuk tidak menulisakan code yang berulang-ulang. Selain itu, component bermanfaat agar kualitas code yang kita buat menjadi mudah dipahami dan menjadi lebih rapi.

### Langkah-langkah Tutorial
Saat membuat tampilan web, biasanya kita melakukan pembuatan card yang berulang-ulang pada sebuah view blade, misalnya kita akan membuat menu daftar editor pada sebuah web penyedia buku bacaan. 
```ruby
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

#### Creating Component

Pertama, mengetikkan perintah berikut pada terminal untuk membuat component.
```ruby
php artisan make:component card
```

Setelah berhasil menjalankan perintah tersebut, kita akan mendapatkan dua file baru pada project laravel kita yaitu pada direktori `App\View\Components\card.php`
untuk Kelasnya dan pada direktori `resources/views/components/card.blade.php` untuk tampilannya atau blade filenya.

Selanjutnya, memodifikasi code pada file `card.blade.php` pada direktori `resources/views/components/card.blade.php` menjadi sebagai berikut:
```ruby
<div class="justify-content-center mt-4 card">
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
```
Terkadang kita membutuhkan konten yang berbeda untuk ditampilkan pada component yang telah dibuat, maka untuk mengatasinya kita dapat menggunakan `$slot` variable. Melalui variable ini kita dapat menambahkan konten pada component kita melalui variable `$slot`. 

Setelah selesai melakukan modifikasi file tersebut, kita dapat memanggil component tersebut pada semua view yang kita miliki.

#### Passing Data ke Component

Saat melakukan passing data, terkadang kita menghendaki value yang dinamis dimana content akan berubah-ubah tergantung value pada variabel tersebut. Kita perlu menambahkan route berikut pada file `web.php` agar valuenya bisa dinamis.
```ruby
Route::get('/editor', function() {
    $title = 'Editor';
    $editors = array('Nama1', 'Nama2');
    return view('editor', compact('title', 'editors'));
});
```

Selanjutnya, kita perlu memodifikasi file `card.php` pada direktori `App\View\Components\card.php`. Jika kita perhatikan, pada code di file tersebut terdapat fungsi `__contruct()` yang dapat kita gunakan untuk passing data sedangkan fungsi `render()` untuk memanggil atau menampilkan file view yang telah dibuatkan laravel tadi.

Berikut hasil modifikasi pada kelas `card.php` pada direktori `App\View\Components\card.php`:
```ruby
<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    public $title;
    public $editors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $editors)
    {
        //
        $this->title = $title;
        $this->editors = $editors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
```
Untuk passing data ke component dapat kita lakukan melalui fungsi `__contruct()`. Pada contoh kali ini kita melakukan passing data dengan variabel `$title` dan `$editors` yang valuenya kita ambil dari route. Hal penting yang harus diperhatikan adalah hak akses yang kita berikan harus public agar dapat diakses oleh kelas lain.

#### Rendering Component

Untuk menampilkan conponent yang telah kita buat, kita cukup memanggilnya pada file view yang memerlukan component tersebut dengan menggunakan syntax `<x-componentname>`. Kita akan mencoba memanggil component card tersebut pada view `editor.blade.php`, maka kita cukup memanggil dengan `<x-card>`.
```ruby
@extends('layout')

@section('container')
    <div class="card mt-3">
        <div class="card-body">
            <div class="h3">Daftar Editor</div>
            <br>
            @foreach($editors as $editor)
                <x-card type='error' :title="$title" :editors="$editors">
                    {{ $editor }}
                </x-card>
            @endforeach
        </div>
    </div>
@endsection
```
Tidak lupa pula, untuk menampilkan data yang telah di passing dengan menggunakan syntax `:propertyname`. Pada kode tersebut, data `title` dan `editors` dapat dinamis, tergantung value pada variabel tersebut yang sebelumnya telah di-setting pada route.

Berikut tampilan menu editor yang telah dibuat menggunakan blade component:

![image](https://drive.google.com/uc?export=view&id=1PdOfC2-j2VoH_oiSt17_ZOI7ss3EwG9E)

