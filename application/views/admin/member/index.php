<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Member</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Member</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Member</h4><a href="<?= site_url('member/add'); ?>" class="btn btn-primary"> Tambah Member</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No. </th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama Konsumen</th>
                                        <th>Alamat</th>
                                        <th>IdKota</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Status Aktif</th>
                                    </tr>
                                    <?php foreach ($member as $item) { ?>
                                        <tr>
                                            <td><?= $item->idKonsumen; ?></td>
                                            <td><?= $item->username; ?></td>
                                            <td><?= $item->password; ?></td>
                                            <td><?= $item->namaKonsumen; ?></td>
                                            <td><?= $item->alamat; ?></td>
                                            <td><?= $item->namaKota; ?></td>
                                            <td><?= $item->email; ?></td>
                                            <td><?= $item->tlpn; ?></td>
                                            <td>
                                                <?php
                                                if ($item->statusAktif == 'Y') {
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
                                                if ($item->statusAktif == 'Y') {
                                                ?>
                                                    <a href="<?= site_url('member/non_aktif/' . $item->idKonsumen); ?>" class="btn btn-danger">Tidak Aktif</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= site_url('member/aktif/' . $item->idKonsumen); ?>" class="btn btn-success">Aktif</a>
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