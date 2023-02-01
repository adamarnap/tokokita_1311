<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>

        <div class="section-body">


            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Produk</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="" class="nav-link">Beranda</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Produk</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Pesanan</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Laporan</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">

                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Produk</h4>
                                    <div class="card-header-action">

                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>

                                            <?php foreach ($produk as $val) { ?>

                                                <tr>
                                                    <td><?= $val->namaProduk; ?></td>
                                                    <td><?= $val->harga; ?></td>
                                                    <td><?= $val->stok; ?></td>

                                                    <td>
                                                        <a href="<?= site_url('tokohome/Toko/getid/' . $val->idProduk . '/' . $val->idToko); ?>" class="btn btn-warning">Edit</a>
                                                        <a href="<?php echo site_url('tokohome/Toko/del/' . $val->idProduk . '/' . $val->idToko); ?>" class="btn btn-danger">Hapus</a>
                                                        <a href="<?= site_url('home/index/' . $val->idToko); ?>" class="btn btn-primary">Detail</a>

                                                    </td>
                                                </tr>

                                            <?php } ?>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>