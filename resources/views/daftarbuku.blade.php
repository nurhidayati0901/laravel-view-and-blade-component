@extends('layout')

@section('container')
    <div class="card mt-3">
        <div class="card-body">
            <div class="h3">Daftar Buku</div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            {{-- <th>Cover Buku</th> --}}
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>ISBN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($books as $book)
                    <tbody>
                        <tr>
                            <td>{{ $i }}</td>
                            {{-- <td>
                                @if($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}" class="rounded mx-auto d-block top" style="width: 5cm">
                                @endif
                            </td> --}}
                            <td>{{ $book["judul"] }}</td>
                            <td>{{ $book["penulis"] }}</td>
                            <td>{{ $book["isbn"] }}</td>
                            <td>
                                <a href="/lists/{{ $book["slug"] }}" class="badge badge-info">detail</a>
                            </td>
                        </tr>
                    </tbody>
                    @php
                        $i += 1
                    @endphp
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

