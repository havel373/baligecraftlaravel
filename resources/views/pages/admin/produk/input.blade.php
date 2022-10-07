<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Produk</h1>
        </div>

        <div class="row">

            <div class="col-12 col-md-6 col-lg-12">

                <div class="card">
                    <form id="form_submit" class="needs-validation" >
                        <div class="card-header">
                            <h4>Tambah Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Nama Produk</label>
                                    <input type="text" name="produk_nama" id="produk_nama" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Gambar Produk</label>
                                    <div class="custom-file">
                                        <input type="file" name="produk_gambar" class="form-control" id="produk_gambar">
                                    </div>

                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Harga Produk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" name="produk_harga" id="produk_harga" class="form-control currency">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Kuantitas/Stok</label>
                                    <input type="text" name="produk_kuantitas" id="produk_kuantitas" class="form-control">

                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Berat</label>
                                    <input type="text" name="produk_berat" id="produk_berat" class="form-control">

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Warna</label>
                                    <input type="text" name="produk_warna" id="produk_warna" class="form-control">

                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Produk Terbaik</label>
                                    <div class="controls">
                                        <select id="produk_terbaik" name="produk_terbaik" class="form-control">
                                            <option value="1">Terbaik</option>
                                            <option value="0">Tidak Terbaik</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Kategori</label>
                                    <div class="controls">
                                        <select name="produk_kategori" class="form-control">
                                           @foreach ($category as $kategori)
                                                <option value="{{$kategori->id}}">{{$kategori->kategori_nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Status</label>
                                    <div class="controls">
                                        <select id="produk_status" name="produk_status" class="form-control">
                                            <option value="1">Published</option>
                                            <option value="0">UnPublished</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Deskripsi Pendek</label>
                                    <textarea name="produk_deskripsi_pendek" class="form-control summernote-simple"></textarea>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Deskripsi Panjang</label>
                                    <textarea name="produk_deskripsi_panjang" class="form-control summernote-simple"></textarea>

                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>