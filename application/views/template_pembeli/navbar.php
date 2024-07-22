<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DnD Catering</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="<?php echo base_url('assets1/images/food.png');?>" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets1/css/open-iconic-bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/animate.css');?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/magnific-popup.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets1/css/aos.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets1/css/ionicons.min.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets1/css/bootstrap-datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/jquery.timepicker.css');?>">

    
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/flaticon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/icomoon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets1/css/style.css');?>">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo site_url(); ?>">DnD Catering</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('HalamanUtama')?>">Home</a>
        </li>
					<?php 
				$keranjang = $this->cart->contents();
				$jml_item = 0;
				

				foreach($keranjang as $item) {
					$jml_item = $jml_item + $item['qty'];
				}
				?>

<li class="nav-item"><a href="<?php echo site_url('HalamanUtama/contact'); ?>" class="nav-link">Contact</a></li>

       <li class="nav-item">
				<a href="<?= base_url('HalamanUtama/lihat_keranjang') ?>" class="nav-link">Lihat Keranjang
					<span class="badge bg-primary"><?= $jml_item ?></span>
				</a>
			 </li>
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Kategori
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		<?php foreach($kategori_item as $items) { ?>
        <li><a class="dropdown-item" href="<?= base_url('HalamanUtama/kategori/'.$items->idKat) ?>"><?= $items->namaKat?></a></li>
			<?php } ?>
        <!-- Tambahkan lebih banyak item dropdown sesuai kebutuhan -->
    </ul>
</li>
      <li class="nav-item">
    <?php if($this->session->userdata('namaPembeli')) { ?>
        <a href="<?= base_url('pembeliakun/logout') ?>" class="nav-link">
            <button class="btn btn-danger">Logout</button>
        </a>
    <?php } else { ?>
        <a href="<?= base_url('pembeliakun/login_akun') ?>" class="nav-link">
            <button class="btn btn-primary">Login</button>
        </a>
    <?php } ?>
</li>

      </ul>
     
    </div>
  </div>
</nav>

<!-- End Navbar	 -->
