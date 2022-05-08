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