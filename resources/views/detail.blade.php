@extends('layout')

@section('container')
    <article>
        <h2>{{ $buku["judul"] }}</h2>
        <h5>By: {{ $buku["penulis"] }}</h5>
        <p>{{ $buku["deskripsi"] }}</p>
    </article>

    <a href="/list">Kembali ke daftar buku</a>
@endsection