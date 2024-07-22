<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Tambah Data Pesanan Manual</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Pesanan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('pesanan/save');?>" enctype="multipart/form-data">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaPembeli">Nama Pembeli<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" id="idPembeli" name="idPembeli">
										<option>Pilih Nama Pembeli</option>
										<?php foreach($user as $items) { ?>
											<option value="<?= $items->idPembeli ?>"><?= $items->namaPembeli ?></option>
										<?php } ?>
									</select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamatPengiriman">Alamat Pengiriman<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="alamatPengiriman" name="alamatPengiriman" required="required" class="form-control" placeholder="Alamat pengiriman catering">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tglPesan">Tanggal Pemesanan<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="date" id="tglPesan" name="tglPesan" required="required" class="form-control" placeholder="Tanggal pesan">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tglPengiriman">Tanggal Pengiriman<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="date" id="tglPengiriman" name="tglPengiriman" required="required" class="form-control" placeholder="Tanggal catering dikirim">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jam">Jam Tiba<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="time" id="jam" name="jam" required="required" class="form-control" placeholder="Jam catering sampai">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaPaketMenu">Nama Paket Menu <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                <select name="idPaketMenu" class="form-control" required>
                                    <option value="">Pilih Paket Menu</option>
                                      <?php foreach($paketmenu as $items) { ?>
										<option value="<?= $items->idPaketMenu ?>"><?= $items->namaPaketMenu?> </option>
										<?php } ?>
                                </select>
                                </div>
                            </div>
                        
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Quantity<span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="quantity" name="quantity" required="required" class="form-control" placeholder="Tuliskan jumlah porsi">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="harga">Harga <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="harga" name="harga" required="required" class="form-control" placeholder="Tuliskan harga">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="totalHarga">Total Harga <span class="required"></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="totalHarga" name="totalHarga" required="required" class="form-control" placeholder="Tulis total harga">
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
