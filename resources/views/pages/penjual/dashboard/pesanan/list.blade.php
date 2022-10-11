@if(count($orders) > 0)
<div class="card-body">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah Item</th>
                <th scope="col">Jumlah Harga</th>
                <th scope="col">Order Status</th>
                <th scope="col">Pembayaran Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="col">
                        <a href="{{route('penjual.pesanan.show',$order->id)}}">{{'#' . $order->order_number}}</a>
                    </th>
                    <td>{{$order->user->nama_lengkap}}</td>
                    <td>
                        {{ ($order->order_date) }}
                    </td>
                    <td>
                        {{ $order->total_items }}
                    </td>
                    <td>
                        Rp {{number_format($order->total_price) }}
                    </td>

                    @if($order->pesanan_status == 0)
                        <td>Belum di proses</td>
                    @elseif($order->pesanan_status == 1)
                        <td>Belum diproses</td>
                    @elseif($order->pesanan_status == 2)
                        <td>Sedang diproses</td>
                    @elseif($order->pesanan_status == 3)
                        <td>Sedang dikirim</td>
                    @elseif($order->pesanan_status == 4)
                        <td>Selesai</td>
                    @endif
                    @if($order->order_status == 'pending')
                        <td>Belum dibayar</td>
                    @elseif($order->order_status == 'settlement')
                        <td>Lunas</td>
                    @elseif($order->order_status == 'cancel')
                        <td>Dibatalkan</td>
                    @elseif($order->order_status == 'failure')
                        <td>Gagal</td>
                    @else
                        <td>Belum dibayar</td>
                    @endif

                    <td>
                        <a href="{{route('penjual.pesanan.show',$order->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                        <a href="javascript:;" onclick="handle_confirm('{{route('penjual.pesanan.update',$order->id)}}');">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                <button class="btn btn-success">Pembayaran Selesai</button>
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$orders->links('vendor.pagination.bootstrap-4')}}
@else
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-primary">
                Belum ada data pesanan pembeli
            </div>
        </div>
    </div>
</div>
@endif