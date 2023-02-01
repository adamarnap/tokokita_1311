<!-- Main Content -->
<div class="main-content">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data kota <strong>berhasil!</strong> <?php echo $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data kota <?php echo $this->session->flashdata('pesan'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <section class="section">
        <div class="section-header">
            <h1>Kota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kota</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Kota</h2>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Kota</h4>
                            <td><a href="<?= site_url('kota/add'); ?>" class="btn btn-primary">Tambah Kota<a></td>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kota</th>
                                        <th>Action</th>
                                    </tr>

                                    <?php foreach ($kota as $item) { ?>
                                        <tr>
                                            <td><?= $item->idKota; ?></td>
                                            <td><?= $item->namaKota; ?></td>
                                            <td>
                                                <a href="<?= site_url('kota/getid/' . $item->idKota); ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= site_url('kota/delete/' . $item->idKota); ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
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
            </div>
        </div>
</div>
</div>
</div>
</section>
</div>