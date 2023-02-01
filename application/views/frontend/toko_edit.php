<!-- Main Content -->
<div class="main-content">
    <section class="section">



        <div class="section-header">
            <div class="col-10 col-md-6 col-lg-20">
                <h1>Menu Utama Dashboard Toko "<?php echo $namaToko->namaToko; ?>"</h1>
            </div>
        </div>



        <div class="row">
            <div class="col-15 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h6>Menu Member</h6>
                    </div>

                    <div class="col-15 col-md-4 col-lg-8">
                        <div class="nav-item active">
                            <a href="<?php echo site_url('home/member'); ?>" class="nav-link">Beranda</a>
                        </div>
                    </div>

                    <div class="col-15 col-md-8 col-lg-8">
                        <div class="nav-item active">
                            <a href="#" class="nav-link">Transaksi</a>
                        </div>
                    </div>

                    <div class="col-15 col-md-8 col-lg-8">
                        <div class="nav-item active">
                            <a href="#" class="nav-link">Riwayat Transaksi</a>
                        </div>
                    </div>

                    <div class="col-15 col-md-8 col-lg-8">
                        <div class="nav-item active">
                            <a href="<?php echo site_url('home/toko'); ?>" class="nav-link">Toko</a>
                        </div>
                    </div>

                    <div class="col-15 col-md-8 col-lg-8">
                        <div class="nav-item active">
                            <a href="#" class="nav-link">Ubah Profil</a>
                        </div>
                    </div>

                    <div class="col-15 col-md-8 col-lg-8">
                        <div class="nav-item active">
                            <a href="#" class="nav-link">Logout</a>
                        </div>
                    </div>

                    <div>
                    </div>



                </div>
            </div>


            <div class="col-md-8">
                <form id="setting-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('tokohome/Toko/edit') ?>">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Form Edit Toko Baru</h4>
                        </div>
                        <input type="hidden" name="idToko" value="<?php echo $idToko; ?>">
                        <input type="hidden" name="idProduk" value="<?php echo $produk->idProduk; ?>">



                        <div class="card-body">
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Produk</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="namaProduk" class="form-control" id="site-title" value="<?php echo $produk->namaProduk; ?>">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kategori</label>
                                    <div class="col-sm-6 col-md-9">
                                        <select class="form-control" name="idKat">
                                            <option>--Pilih Kategori--</option>
                                            <?php foreach ($Produk as $item) { ?>>
                                            <option value="<?php echo $item->idKat; ?>">
                                                <?php echo $item->namaKat ?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="site-logo" value="<?php echo $produk->foto; ?>">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Harga</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="harga" class="form-control" id="site-title" value="<?php echo $produk->harga; ?>">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Stok</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="stok" class="form-control" id="site-title" value="<?php echo $produk->stok; ?>">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Berat</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="berat" class="form-control" id="site-title" value="<?php echo $produk->berat; ?>">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Deskripsi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="deskripsiProduk" class="form-control" id="site-title" value="<?php echo $produk->deskripsiProduk; ?>">
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
</div>
</section>


















<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="../assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="../node_modules/chart.js/dist/Chart.min.js"></script>
<script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="../assets/js/page/index-0.js"></script>
</body>

</html>