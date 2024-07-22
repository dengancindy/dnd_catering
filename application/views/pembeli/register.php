<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DnD Catering| Register</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/admin/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/admin/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets/admin/vendors/animate.css/animate.min.css');?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/admin/build/css/custom.min.css');?>" rel="stylesheet">
</head>
<body class="login">
    <div class="pb-5">
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?= form_open('pembeliakun/register') ?>
                        <h1>Register Form</h1>
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <input type="text" class="form-control" name="namaPembeli" placeholder="Nama Pembeli" required>
							<?= form_error('namaPembeli', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="NIK" placeholder="NIK" required>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <select class="form-control" name="gender" required>
                                <option value="">Pilih Gender</option>
                                <option value="P">Perempuan</option>
                                <option value="L">Laki-laki</option>
                            </select>
							<?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
							<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="no_telp" placeholder="No. Telepon" required>
							<?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
							<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>  
                        <div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
							<a href="<?= base_url('pembeliakun/login_akun')?>">Sudah Punya Akun?</a>
                        </div>
                    <?= form_close()?>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
