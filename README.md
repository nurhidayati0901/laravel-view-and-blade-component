# Laravel View and Blade Component

Nama Anggota:
1. Helsa Nesta Dhaifullah
2. Nur Hidayati (05111940000028)

Link Youtube : 

---

## A. Laravel Views

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


