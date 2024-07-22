  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Manajemen Data Paket Menu</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Pembeli</th>
                          <th>Alamat Kirim</th>
                          <th>Tgl Pesan</th>
                          <th>Tgl Kirim</th>
                          <th>Nama Paket</th>
						  <th>Jumlah</th>
						  <th>Total Harga</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php $i=1;?>
                        <?php foreach($laporan as $lap){?>
                        <tr>
                          <td><?=$i++?></td>
                          <td><?=$lap->namaPembeli?></td>
                          <td><?=$lap->alamatPengiriman?></td>
                          <td><?=$lap->tglPesan?></td>
                          <td><?=$lap->tglPengiriman?></td>
                          <td><?=$lap->namaPaketMenu?></td>
                          <td><?=$lap->quantity?></td>
                          <td><?=$lap->totalHarga?></td>
                          
                  </tr>
                  <?php } ?>
                    
                  </tbody>
                    </table>
                  </div>
                  <!-- <a href="<?php echo site_url('paketmenu/add');?>" class="btn btn-success">Tambah Paket Menu</a> -->
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
