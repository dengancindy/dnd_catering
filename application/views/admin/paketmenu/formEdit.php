<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Ubah Data Paket Menu</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Data Paket Menu</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="edit-form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/paketmenu/edit/' . $paketmenu->idPaketMenu); ?>" enctype="multipart/form-data">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idPaketMenu">Kode Paket Menu</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="idPaketMenu" name="idPaketMenu" class="form-control" value="<?= $paketmenu->idPaketMenu; ?>" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaKat">Nama Kategori<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="namaKat" class="form-control">
                                        <?php foreach($kategori as $kat) { ?>
                                            <option value="<?php echo $kat->namaKat; ?>"><?php echo $kat->namaKat; ?></option>
                                        <?php } ?>
                                        </select>
                                </div>
                                </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaPaketMenu">Nama Paket Menu<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="namaPaketMenu" name="namaPaketMenu" required="required" class="form-control" value="<?= $paketmenu->namaPaketMenu; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="deskripsi">Deskripsi<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                <textarea id="deskripsi" name="deskripsi" required="required" class="form-control"><?= $paketmenu->deskripsi; ?></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="harga">Harga<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="harga" name="harga" required="required" class="form-control" value="<?= $paketmenu->harga; ?>">
                                </div>
                            </div>
                           <!-- Input hidden untuk gambar lama -->
    <input type="hidden" name="gambar_lama" value="<?= $paketmenu->gambar; ?>">

<!-- Pilih Gambar Baru -->
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Pilih Gambar Baru</label>
    <div class="col-md-6 col-sm-6">
        <input type="file" id="gambar" name="gambar">
    </div>
</div>

<!-- Preview gambar yang sudah ada -->
<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Gambar</label>
    <div class="col-md-6 col-sm-6">
        <?php if (!empty($paketmenu->gambar)) : ?>
            <img src="<?= base_url('assets/admin/images/' . $paketmenu->gambar); ?>" alt="Gambar" style="max-width: 150px;">
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
