<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Gambar</th>
            <th scope="col">Kategori</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $i => $product)
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $product->nama; ?></td>
                <td><img src="{{asset('assets/upload/image/' . $product->gambar)}}" style="width:30%;" /></td>
                <td>{{ $product->category->kategori_nama}}</td>
                <td>
                    @if ($product->status == 1) 
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-danger">Unpublished</span>
                    @endif
                </td>
                <td>
                    @if($product->status == 0)
                        <a class="btn btn-success" href="
                        {{-- {{('admin/published_product/' . $product->produk_id)}} --}}
                        ">
                            <i class="fa fa-upload"></i>
                        </a>
                    @else 
                        <a class="btn btn-danger" href="<?php //('admin/unpublished_product/' . $product->produk_id); ?>">
                            <i class="fa fa-upload"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$produk->links('vendor.pagination.bootstrap-4')}}