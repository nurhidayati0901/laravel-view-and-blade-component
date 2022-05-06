@extends('layout')

@section('container')
<div class="card mt-3">
    <div class="card-body">
        <div class="h3">Daftar Penulis</div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Pen Name</th>
                        <th>Born</th>
                    </tr>
                </thead>
                @php
                    $i = 1
                @endphp
                @foreach ($authors as $author)
                <tbody>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $author["name"] }}</td>
                        <td>{{ $author["penname"] }}</td>
                        <td>{{ $author["born"] }}</td>
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