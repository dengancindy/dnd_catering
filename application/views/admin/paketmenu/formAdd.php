<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Tambah Data Paket Menu</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Paket Menu</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('paketmenu/save');?>" enctype="multipart/form-data">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="idPaketMenu">Kode Paket Menu <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="idPaketMenu" name="idPaketMenu" required="required" class="form-control" placeholder="Id Paket Menu">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaKat">Kategori <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select id="namaKat" name="namaKat" class="form-control" required="required">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach($kategori as $kat) { ?>
                                            <option value="<?php echo $kat->namaKat; ?>"><?php echo $kat->namaKat; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaPaketMenu">Nama Paket Menu <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="namaPaketMenu" name="namaPaketMenu" required="required" class="form-control" placeholder="Tuliskan nama paket">
                                </div>
                            </div>
                            <div class="item form-group">
							    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi <span class="required"></span></label>
						        <div class="col-md-6 col-sm-6 ">
							<textarea class="form-control" rows="3" id="message" name="deskripsi" placeholder="Tuliskan deskripsi"></textarea>
						</div>
						</div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="harga">Harga <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="harga" name="harga" required="required" class="form-control" placeholder="Tuliskan harga">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar">Gambar<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" name="gambar" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" accept="image/*"/>
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
