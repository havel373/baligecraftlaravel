<!-- Modal -->
<div class="modal fade" id="checkStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>transaction/process" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cek Status Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="orderid" col-form-label">Order ID/Invoice</label>
                        <input type="text" required class="form-control" name="order_id" id="orderid" autocomplete="off">
                    </div>
                    <input type="hidden" name="action" value="status">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div>
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#checkStatus">Status</button>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">

                <div class="card">
                    <?php if (count($orders) > 0) : ?>
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
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <th scope="col">
                                                <?php echo anchor('penjual/pesanan_view/' . $order->id, '#' . $order->order_number); ?>
                                            </th>
                                            <td><?php echo $order->user; ?></td>
                                            <td>
                                                <?php echo get_formatted_date($order->order_date); ?>
                                            </td>
                                            <td>
                                                <?php echo $order->total_items; ?>
                                            </td>
                                            <td>
                                                Rp <?php echo format_rupiah($order->total_price); ?>
                                            </td>

                                            <?php if ($order->pesanan_status == 0) { ?>
                                                <td>Belum di proses</td>
                                            <?php } else if ($order->pesanan_status == 1) { ?>
                                                <td>Belum diproses</td>
                                            <?php } else if ($order->pesanan_status == 2) { ?>
                                                <td>Sedang diproses</td>
                                            <?php } else if ($order->pesanan_status == 3) { ?>
                                                <td>Sedang dikirim</td>
                                            <?php } else if ($order->pesanan_status == 4) { ?>
                                                <td>Selesai</td>
                                            <?php } ?>
                                            <?php if ($order->order_status == 'pending') { ?>
                                                <td>Belum dibayar</td>
                                            <?php } else if ($order->order_status == 'settlement') { ?>
                                                <td>Lunas</td>
                                            <?php } else if ($order->order_status == 'cancel') { ?>
                                                <td>Dibatalkan</td>
                                            <?php } else if ($order->order_status == 'failure') { ?>
                                                <td>Gagal</td>
                                            <?php } else { ?>
                                                <td>Belum dibayar</td>
                                            <?php } ?>

                                            <td>
                                                <a href="<?= base_url(); ?>penjual/pesanan_view/<?= $order->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php echo $pagination; ?>
                    <?php else : ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="alert alert-primary">
                                        Belum ada data pesanan pembeli
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
    </section>
</div>