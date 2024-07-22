  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

              <div class="col-md-25 col-sm-25 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Manajemen Data Pesanan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>ID Pesanan</th>
                          <th>Nama Pembeli</th>
                          <th>Alamat Pengiriman</th>
                          <th>Tanggal Pesan</th>
                          <th>Tanggal Pengiriman</th>
                          <th>Jam</th>
                          <th>Nama Paket</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($pesanan as $pesan){?>
													<!-- <?= var_dump($pesan) ?> -->
                        <tr>
													<td><?= $pesan->idPesanan?></td>
													<td><?= $pesan->namaPembeli?></td>
													<td><?= $pesan->alamatPengiriman?></td>
													<td><?= $pesan->tglPesan?></td>
													<td><?= $pesan->tglPengiriman?></td>
													<td><?= $pesan->jam?></td>
													<td><?= $pesan->namaPaketMenu?></td>
													<td><div class="btn-group">
														<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalEdit<?= $pesan->idPesanan?>">Edit</button>
<a href="<?php echo site_url('pesanan/delete/'.$pesan->idPesanan);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
</div></td>
                  </tr>
                  <?php } ?>
                    
                  </tbody>
                    </table>
                  </div>
                  <a href="<?php echo site_url('pesanan/add');?>" class="btn btn-success">Tambah Pesanan</a>
                </div>
              </div>
            </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

				<!-- Modal -->
				 <?php foreach($pesanan as $pesan) { ?>

				
<div class="modal fade" id="modalEdit<?= $pesan->idPesanan?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo site_url('pesanan/update/'.$pesan->idPesanan);?>" enctype="multipart/form-data">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaPembeli">Nama Pembeli<span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" id="idPembeli" name="idPembeli">
										<option>Pilih Nama Pembeli</option>
										<?php foreach($user as $items) { ?>
											<option selected value="<?= $items->idPembeli ?>"><?= $items->namaPembeli ?></option>
										<?php } ?>
									</select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamatPengiriman" >Alamat Pengiriman<span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="alamatPengiriman" name="alamatPengiriman"  class="form-control" placeholder="Alamat pengiriman catering" value="<?=$pesan->alamatPengiriman?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tglPesan">Tanggal Pemesanan<span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="date" id="tglPesan" name="tglPesan"  class="form-control" placeholder="Tanggal pesan" value="<?= $pesan->tglPesan?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tglPengiriman">Tanggal Pengiriman<span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="date" id="tglPengiriman" name="tglPengiriman"  class="form-control" placeholder="Tanggal catering dikirim" value="<?= $pesan->tglPengiriman?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jam">Jam Tiba<span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="time" id="jam" name="jam"  class="form-control" placeholder="Jam catering sampai" value="<?= $pesan->jam?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaPaketMenu">Nama Paket Menu <span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                <select name="idPaketMenu" class="form-control" >
                                    <option>Pilih Paket Menu</option>
                                      <?php foreach($paketmenu as $items) { ?>
										<option selected value="<?= $items->idPaketMenu ?>"><?= $items->namaPaketMenu?> </option>
										<?php } ?>
                                </select>
                                </div>
                            </div>
                        
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="quantity">Quantity<span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="quantity" name="quantity"  class="form-control" placeholder="Tuliskan jumlah porsi" value="<?=$pesan->quantity?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="harga">Harga <span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="harga" name="harga"  class="form-control" placeholder="Tuliskan harga" value="<?=$pesan->harga?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="totalHarga">Total Harga <span ></span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="totalHarga" name="totalHarga"  class="form-control" placeholder="Tulis total harga" value="<?=$pesan->totalHarga?>">
                                </div>
                            </div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
														<button type="submit" class="btn btn-primary">Simpan</button>
													</div>
												</form>
    </div>
  </div>
</div>
<?php  } ?>
