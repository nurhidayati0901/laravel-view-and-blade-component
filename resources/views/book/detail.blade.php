<x-content_detail type="error" :title="$title" :book="$book">
    <div class="justify-content-center mt-4 card">
        <div class="card-body">
            <div class="h3">Detail Buku</div>
            <br>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $book["judul"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $book["penulis"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $book["penerbit"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $book["tahun_terbit"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book["isbn"] }}">
                    </div>
                </div>
                <div class="mb-2">
                    <a href="/" class="btn btn-secondary float-right mr-3">Kembali</a>
                </div>
        </div>
    </div>
</x-content_detail>