<x-UserDashboard-Layout title="Order">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pesanan Saya</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body {{ count($orders) > 0 ? ' p-0' : '' ; }}">
                        @if(count($orders) > 0)
                            <table class=" table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">ID Pesanan</th>
                                        <th scope="col">Jumlah Pesanan</th>
                                        <th scope="col">Total Pesanan</th>
                                        <th scope="col">Metode Pembayaran</th>
                                        <th scope="col">Tanggal Pesanan</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id}}</td>
                                            <td><a href="{{route('user.order_view', $order->id)}}">{{'#' . $order->order_number }}</a></td>
                                            <td>{{ $order->total_items; }} barang</td>
                                            <td>Rp {{number_format($order->total_price); }}</td>
                                            <td>{{ ($order->payment_method == 1) ? 'Transfer bank' : 'Bayar ditempat'; }}</td>
                                            @php
                                                setlocale(LC_TIME, 'ID_id');
                                            @endphp
                                            <td>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans()}} <br> {{\Carbon\Carbon::parse($order->created_at)->formatLocalized('%A %d %B %Y')}} <br> {{\Carbon\Carbon::parse($order->created_at)->formatLocalized('%H:%M:%S')}}</td>
                                            @if($order->order_status == 'pending' || $order->order_status == "")
                                                <td>Belum dibayar</td>

                                            @elseif($order->pesanan_status == 0 && $order->order_status == 'settlement')
                                                <td>Menunggu konfirmasi</td>
                                            @elseif($order->pesanan_status == 2)
                                                <td>Sedang diproses</td>
                                            @elseif ($order->pesanan_status == 3)
                                                <td>Sedang dikirim</td>
                                            @elseif ($order->pesanan_status == 4)
                                                <td>Selesai</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert alert-info">
                                        Belum ada data order.
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    {{-- <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <p>Apabila mau Mengecek Resi dapat mengklik link dibawah ini :</p>
                        <a href="https://rajaongkir.com/">Klik Disini</a>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>
</x-UserDashboard-Layout>