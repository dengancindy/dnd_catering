<div class="hero-wrap" style="background-image: url(<?php echo base_url('assets1/images/bg.jpg');?>">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo site_url(); ?>">Kategori Paket Menu</a></span></p>
	            <h1 class="mb-4 bread">DnD Catering</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container pt-3">
	<h1 class="text-center">Menu Kami</h1>

	<?php if ($this->session->flashdata('pesan')) { ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('pesan') ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

</div>



<!-- Card -->
<section class="container py-3">
	<div class="row">
		<?php foreach($kategori as $items) { ?>
			
			<div class="col-md-3 col-sm-6 mb-4">
				<?php 
				echo form_open('HalamanUtama/add_to_cart');
				echo form_hidden('id', $items->idPaketMenu);
				echo form_hidden('qty', 1);
				echo form_hidden('price', $items->harga);
				echo form_hidden('name', $items->namaPaketMenu);
			?>
				<div class="card h-100">
					<img src="<?= base_url('assets/admin/images/'.$items->gambar)?>" class="card-img-top" alt="...">
					<div class="card-body d-flex flex-column">
						<h3 class="card-title text-center"><?= $items->namaPaketMenu ?></h3>
						<div class="d-flex justify-content-center align-items-center mb-3">
							<p class="px-2"><b>Rp. <?= number_format($items->harga, 2) ?></b></p>
							<p class="px-2 text-secondary" style="font-size: 14px;">Per Porsi</p>
						</div>
						<div class="d-flex justify-content-center mt-auto">
							<?php if($this->session->userdata('namaPembeli')) { ?>
								<div class="px-2">
								<button class="btn btn-primary" type="submit">🛒</button>
							</div>
							<?php } else { ?>
								<div class="px-2">
								<button class="btn btn-primary" type="submit" disabled>🛒</button>
							</div>
							<?php } ?>
							
							<div class="px-2">
								<a href="<?= base_url('PaketMenu/detail_paket/'.$items->idPaketMenu)?>" class="btn btn-warning">🔍</a>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
		<?php } ?>
	</div>
</section>
