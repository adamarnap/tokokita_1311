<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-val$val active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-val$val"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-val$val">Form</div>
            </div>
        </div>



        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <form method="POST" action="<?= site_url('ongkir/edit'); ?>">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Ongkir</h4>
                        </div>


                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kurir</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="kurir">
                                        <option value="0">-Pilih Nama Kurir-</option>
                                        <?php foreach ($kurir as $val) { ?>
                                            <option value="<?= $val->idKurir; ?>"><?= $val->namaKurir; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kota Asal</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="asal">
                                        <option value="0">-Pilih Kota Asal-</option>
                                        <?php foreach ($kota as $val) { ?>
                                            <option value="<?= $val->idKota; ?>"><?= $val->namaKota; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kota Tujuan</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="tujuan">
                                        <option value="0">-Pilih Kota Tujuan-</option>
                                        <?php foreach ($kota as $val) { ?>
                                            <option value="<?= $val->idKota; ?>"><?= $val->namaKota; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Biaya</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="biaya">
                                </div>
                            </div>



                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</div>