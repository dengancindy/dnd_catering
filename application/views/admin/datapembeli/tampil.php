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
                <h2>Manajemen Data Pembeli</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pembeli</th>
                            <th>NIK</th>
                            <th>Nama Pembeli</th>
                            <th>Gender</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datpem as $datapembeli){?>
                            <tr>
                                <td><?php echo $datapembeli->idPembeli;?></td>
                                <td><?php echo $datapembeli->NIK;?></td>
                                <td><?php echo $datapembeli->namaPembeli;?></td>
                                <td><?php echo $datapembeli->gender;?></td>
                                <td><?php echo $datapembeli->alamat;?></td>
                                <td><?php echo $datapembeli->no_telp;?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo site_url('datapembeli/get_by_id/'.$datapembeli->idPembeli);?>" class="btn btn-warning">Edit</a>
                                        <a href="<?php echo site_url('datapembeli/delete/'.$datapembeli->idPembeli);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo site_url('datapembeli/add');?>" class="btn btn-success">Tambah Pembeli</a>
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
