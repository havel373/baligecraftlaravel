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
        @foreach ($produk as $i => $product)
            <tr>
                <td>{{ $produk->firstItem() + $i}}</td>
                <td style="padding: 30px 50px;">{{ $product->nama }}</td>
                <td style="padding: 30px 50px;"><img src="{{asset('assets/upload/image/' . $product->gambar)}}" style="width:45%;" /></td>
                <td style="padding: 30px 50px;">{{$product->category->kategori_nama }}</td>
                <td style="padding: 30px 50px;">
                    @if ($product->produk_status == 1)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-danger">Unpublished</span>
                    @endif
                </td>
                <td style="padding: 30px 20px;">
                    <a class="btn btn-primary" href="javascript:;" onclick="load_input('{{route('penjual.produk.edit',$product->id)}}');" style="border-color: #e99c2e;">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal{{$product->id}}">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            <div class="modal fade" id="myModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
            
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Hapus data?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            
                        </div>
                        <div class="modal-body">
                            <p>Yakin ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" onclick="handle_delete('{{route('penjual.produk.destroy', $product->id)}}')" class="btn btn-danger">
                                <i class="fa fa-trash-o"></i> Ya, Hapus data</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
{{$produk->links('vendor.pagination.bootstrap-4')}}