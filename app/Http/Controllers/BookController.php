<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function create(Request $request) {
        $validateData = $request->validate([
            'image' => 'required | image | mimes:jpeg,png,jpg | max:2048',
            'judul' => 'required | min:5 | max:255',
            'penulis' => 'required | min:5 | max:255',
            'penerbit' => 'required | min:5 | max:255',
            'tahun_terbit' => 'required',
            'isbn' => 'required | min:13',
        ]);

        if($validateData) {
            return redirect('/form')
                    ->with("title", "Store Data")
                    ->with("status", "Data buku berhasil ditambah!");
        }
    }
}
