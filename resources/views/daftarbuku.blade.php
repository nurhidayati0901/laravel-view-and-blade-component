@extends('layout')

@section('container')
    <h1 class="mb-3">{{ $title }}</h1>
    @foreach ($buku as $b)
        <article class="mb-5">
            <h2>
                <a href="/lists/{{ $b["slug"] }}">{{ $b["judul"] }}</a>
            </h2>
            <h5>By: {{ $b["penulis"] }}</h5>
            <p>{{ $b["deskripsi"] }}</p>
        </article>
    @endforeach
@endsection

