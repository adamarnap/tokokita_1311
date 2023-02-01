<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
              <div class="breadcrumb-item">Form</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <p class="section-lead">
              Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.
            </p>

            <div class="row">
              <!-- <div class="col-12 col-md-6 col-lg-6">         
              </div> -->

              <div class="col-12 col-md-6 col-lg-6">   
                <form method="POST" action="<?php echo site_url('member/save') ?> ">          
                    <div class="card">
                        <div class="card-header">
                            <h4>Horizontal Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Username </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="Username">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Password </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" name="password" placeholder="Password..">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Nama Konsumen </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" name="namaKonsumen" placeholder="Nama Konsumen">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Id Kota </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" name="idKota" placeholder="idKota..">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Alamat </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" name="alamat" placeholder="Alamat">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Email </label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email...">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Telepon </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" name="tlpn" placeholder="Masukkan tiga digit angka">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label"> StatusAktif  </label>
                                    <div class="col-sm-9">
                                                  
                                              <div class="form-check">
                                            <input class="form-check-input" type="radio" name="statusAktif"  checked>
                                            <label class="form-check-label" for="gridRadios1">
                                          Y
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="statusAktif">
                                            <label class="form-check-label" for="gridRadios2">
                                              N
                                            </label>
                                          </div>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> Tambahkan </button>
                    </div>
                    </div> 
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>