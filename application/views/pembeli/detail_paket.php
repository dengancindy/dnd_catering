<div class="hero-wrap" style="background-image: url(<?php echo base_url('assets1/images/bg.jpg');?>">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo site_url(); ?>">Detail Paket</a></span></p>
	            <h1 class="mb-4 bread">DnD Catering</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container mt-5 py-4">
        <div class="row pb-4 shadow-lg py-3 border border-secondary justify-content-center">
            <!-- Bagian Gambar Produk -->
            <div class="col-md-6">
				<img src="<?= base_url('assets/admin/images/'.$paketDetail->gambar)?>" class="w-100" alt="Produk 1" style="width: 400px;">
            </div>
            <!-- Bagian Detail Produk -->
            <div class="col-md-6">
                <h1 class="display-5"><?= $paketDetail->namaPaketMenu?></h1>
                <p class="lead">Rp <?= number_format($paketDetail->harga, 2) ?></p>
                <!-- <p class="text-muted">Stok Tersedia: 20</p> -->
                <p class="mt-4"><?= $paketDetail->deskripsi ?></p>
                <p class="mt-4"> NB: Pesan min 20 porsi, hubungi contact jika custom.</p>
                <p class="mt-4"> BELUM TERMASUK ONGKIR Rp 10.000/5 km</p><br>
        <?php 
				echo form_open('HalamanUtama/add_to_cart');
				echo form_hidden('id', $paketDetail->idPaketMenu);
				echo form_hidden('qty', 1);
				echo form_hidden('price', $paketDetail->harga);
				echo form_hidden('name', $paketDetail->namaPaketMenu);
			?>
			<?php if($this->session->userdata('namaPembeli')) { ?>
				<div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary btn-lg" type="submit">Tambah ke Keranjang</button>
                </div>
			<?php } else { ?>
				<div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary btn-lg" type="submit" disabled>Tambah ke Keranjang</button>
                </div>
			<?php } ?>
                
				<?= form_close() ?>
                
            </div>
        </div>
    </div>
