<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <a href="<?php echo base_url('penjual/tambahproduk') ?>" class="btn btn-success btn-lg" style="margin-bottom: 30px;">
                                <i class="fa fa-plus"></i> Tambah Produk
                            </a>
                        </div>
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
                                <?php
                                $i = 0;
                                foreach ($produk as $produk) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="padding: 30px 50px;"><?php echo $produk->produk_nama; ?></td>
                                        <td style="padding: 30px 50px;"><img src="<?php echo base_url('assets/upload/image/' . $produk->produk_gambar); ?>" style="width:45%;" /></td>
                                        <td style="padding: 30px 50px;"><?php echo $produk->kategori_nama; ?></td>
                                        <td style="padding: 30px 50px;">
                                            <?php

                                            if ($produk->produk_status == 1) { ?>
                                                <span class="badge badge-success">Published</span>
                                            <?php
                                            } else { ?>
                                                <span class="badge badge-danger">Unpublished</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td style="padding: 30px 20px;">
                                            <a class="btn btn-primary" href="<?php echo base_url('penjual/edit/' . $produk->produk_id); ?>" style="border-color: #e99c2e;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $produk->produk_id; ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer text-right">
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
                    </div>
                </div>
            </div>
    </section>
</div>