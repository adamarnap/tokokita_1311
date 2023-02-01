<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>toko</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">toko</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data toko</h4><a href="<?= site_url('toko/add'); ?>" class="btn btn-primary"> Tambah toko</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No. </th>
                                        <th>Konsumen</th>
                                        <th>Nama Toko</th>
                                        <th>Logo</th>
                                        <th>Deskripsi</th>
                                        <th>Status Aktif</th>

                                    </tr>
                                    <?php foreach ($toko as $item) { ?>
                                        <tr>
                                            <td><?= $item->idToko; ?></td>
                                            <td><?= $item->namaKonsumen; ?></td>
                                            <td><?= $item->namaToko; ?></td>
                                            <td><?= $item->logo; ?></td>
                                            <td><?= $item->deskripsi; ?></td>
                                            <td>
                                                <?php
                                                if ($item->StatusAktif == 'Y') {
                                                ?>
                                                    <div class="badge badge-success">Aktif</div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="badge badge-danger">Tidak Aktif</div>
                                                <?php
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($item->StatusAktif == 'Y') {
                                                ?>
                                                    <a href="<?= site_url('toko/non_aktif/' . $item->namaKonsumen); ?>" class="btn btn-danger">Tidak Aktif</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= site_url('toko/aktif/' . $item->namaKonsumen); ?>" class="btn btn-success">Aktif</a>
                                                <?php
                                                }
                                                ?>
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
    </section>
</div>