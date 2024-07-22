<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Ubah Data Pembeli</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Data Pembeli</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="edit-form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/datapembeli/edit/' . $datapembeli->idPembeli); ?>" enctype="multipart/form-data">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idPembeli">ID Pembeli</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="idPembeli" name="idPembeli" class="form-control" value="<?= $datapembeli->idPembeli; ?>" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="NIK">NIK<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="NIK" name="NIK" required="required" class="form-control" value="<?= $datapembeli->NIK; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaPembeli">Nama Pembeli<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="namaPembeli" name="namaPembeli" required="required" class="form-control" value="<?= $datapembeli->namaPembeli; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gender">Gender<span class="required"></span></label>
    <div class="col-md-6 col-sm-6">
        <select class="form-control" name="gender" required>
            <option value="">Pilih Gender</option>
            <option value="P" <?= ($datapembeli->gender == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            <option value="L" <?= ($datapembeli->gender == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
        </select>
    </div>
</div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?= $datapembeli->alamat; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp">Telepon<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="no_telp" name="no_telp" required="required" class="form-control" value="<?= $datapembeli->no_telp; ?>">
                                </div>
                            </div>

                          

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md--1">
                                    <button type="submit" class="btn btn-success" id="sendMesrsageButton">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .x_content -->
                </div> <!-- .x_panel -->
            </div> <!-- .col -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .right_col -->
