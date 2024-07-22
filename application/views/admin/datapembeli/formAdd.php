<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Tambah Data Pembeli</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Pembeli</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('datapembeli/save');?>" enctype="multipart/form-data">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="NIK">NIK<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="NIK" name="NIK" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaKat">Nama Pembeli<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="namaPembeli" name="namaPembeli" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gender">Gender<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="gender" required>
                                        <option value="">Pilih Gender</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="alamat" name="alamat" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_telp">Telepon<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="no_telp" name="no_telp" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md- -1">
                                    <button type="submit" class="btn btn-success" id="sendMesrsageButton">Tambahkan</button>
                                    <button type="reset" class="btn btn-success">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .x_content -->
                </div> <!-- .x_panel -->
            </div> <!-- .col -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .right_col -->
