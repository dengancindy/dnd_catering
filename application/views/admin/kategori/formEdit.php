<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Ubah Data Kategori</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Data Kategori</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="edit-form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/kategori/edit/' . $kategori->idKat); ?>" enctype="multipart/form-data">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idKat">ID Kategori</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="idKat" name="idKat" class="form-control" value="<?= $kategori->idKat; ?>" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaKat">Nama Kategori <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="namaKat" name="namaKat" required="required" class="form-control" value="<?= $kategori->namaKat; ?>">
                                </div>
                            </div>

                            <!-- Input file untuk gambar baru -->
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambarKat">Pilih Gambar Baru</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="gambarKat" name="gambarKat">
                                </div>
                            </div>

                            <!-- Preview gambar yang sudah ada -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambarKat">Gambar Kategori</label>
                                <div class="col-md-6 col-sm-6">
                                    <?php if (!empty($kategori->gambarKat)) : ?>
                                        <img src="<?= base_url('assets/admin/images/' . $kategori->gambarKat); ?>" alt="Gambar Kategori" style="max-width: 150px;">
                                    <?php else : ?>
                                        <p>Tidak ada gambar yang tersedia.</p>
                                    <?php endif; ?>
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
