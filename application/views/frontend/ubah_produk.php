<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Menu Utama Dashboard Toko "<?= $namaToko->namaToko; ?>"</h1>

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
                    <form id="setting-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('tokohome/Toko/input_produk/' . $namaToko->idToko) ?>">
                        <input type="hidden" name="id_toko" value="<?php echo $idToko; ?>">
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Form Mengedit Produk</h4>
                            </div>


                            <div class="card-body">
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kategori</label>
                                    <div class="col-sm-6 col-md-9">
                                        <select class="form-control" name="idKat">
                                            <option value="0">-Pilih Kategori-</option>
                                            <?php foreach ($kategori as $val) { ?>
                                                <option value="<?= $val->idKat; ?>"><?= $val->namaKat; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="namaProduk" class="form-control" id="site-title">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Harga</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="harga" class="form-control" id="site-title">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Stok</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="stok" class="form-control" id="site-title">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Berat Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="berat" class="form-control" id="site-title">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Deskripsi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea type="text" name="deskripsiProduk" class=" form-control" id="site-description"></textarea>
                                    </div>
                                </div>

                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button class="btn btn-primary" id="save-btn">Save</button>
                                    <button class="btn btn-secondary" type="button">Reset</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
    </section>
</div>