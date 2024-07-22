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
                    <h2>Manajemen Data Kategori</h2>
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
                          <th>ID Kategori</th>
                          <th>Nama Kategori</th>
                          <th>Gambar Kategori</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($kat as $datakat){?>
                        <tr>
                          <td><?php echo $datakat->idKat;?></td>
                          <td><?php echo $datakat->namaKat;?></td>
                          <td><img src="<?php echo base_url('assets/admin/images/'.$datakat->gambarKat); ?>" width="150" height="110"></td>
                          <td><div class="btn-group">
<a href="<?php echo site_url('kategori/get_by_id/'.$datakat->idKat);?>" class="btn btn-warning">Edit</a>
<a href="<?php echo site_url('kategori/delete/'.$datakat->idKat);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
</div></td>
                  </tr>
                  <?php } ?>
                    
                  </tbody>
                    </table>
                  </div>
                  <a href="<?php echo site_url('kategori/add');?>" class="btn btn-success">Tambah Kategori</a>
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