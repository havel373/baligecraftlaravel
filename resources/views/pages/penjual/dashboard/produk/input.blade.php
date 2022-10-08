<div class="section-header">
    <h1>Tambah Produk</h1>
</div>
<div class="row">
<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
        <form class="needs-validation" id="form_submit">
            <div class="card-header">
                <h4>Tambah Produk</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Nama Produk</label>
                        <input type="text" name="produk_nama" id="produk_nama" class="form-control" value="{{$data->nama}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Gambar Produk</label>
                        <input type="file" name="produk_gambar" id="produk_gambar" class="form-control" >

                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Harga Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" name="produk_harga" id="produk_harga" class="form-control currency" value="{{$data->harga}}">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Kuantitas/Stok</label>
                        <input type="text" name="produk_kuantitas" id="produk_kuantitas" class="form-control" value="{{$data->kuantitas}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Berat Barang</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Kg
                                </div>
                            </div>
                            <input type="text" name="produk_berat" id="produk_berat" class="form-control currency" value="{{$data->berat}}">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Warna</label>
                        <input type="text" name="produk_warna" id="produk_warna" class="form-control" value="{{$data->warna}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Produk Terbaik</label>
                        <div class="controls">
                            <select id="produk_terbaik" name="produk_terbaik" class="form-control">
                                <option value="1" {{$data->terbaik == 1 ? 'selected' : ''}}>Terbaik</option>
                                <option value="0"  {{$data->terbaik == 0 ? 'selected' : ''}}>Tidak Terbaik</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Kategori</label>
                        <div class="controls">
                            <select name="produk_kategori" class="form-control">
                                @foreach ($kategori as $kategori)
                                    <option value="{{$kategori->id}}" {{$kategori->id == $data->kategori_id ? 'selected' : ''}}>{{$kategori->kategori_nama}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Status</label>
                        <div class="controls">
                            <select id="produk_status" name="produk_status" class="form-control">
                                <option value="1" {{$data->publish == 1 ? 'selected' : ''}}>Published</option>
                                <option value="0" {{$data->publish == 0 ? 'selected' : ''}}>UnPublished</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Deskripsi Pendek</label>
                        <textarea name="produk_deskripsi_pendek" class="form-control summernote-simple">{{$data->deskripsi_pendek}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Deskripsi Panjang</label>
                        <textarea name="produk_deskripsi_panjang" class="form-control summernote-simple">{{$data->deskripsi_panjang}}</textarea>

                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="button" id="submit" class="btn btn-primary" onclick="handle_upload('#submit','#form_submit','{{route('penjual.produk.store')}}','POST','Simpan');">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="load_list(1);">Kembali</button>
            </div>
        </form>
    </div>
</div>
</div>