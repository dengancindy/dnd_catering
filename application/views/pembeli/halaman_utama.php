<section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(assets1/images/bg.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Welcome To DnD Catering</h1>
	            <h2>Snack &amp; Food</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(assets1/images/bg2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Enjoy The Order Food Experience</h1>
	            <h2>Order Now</h2>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
<br><br>
	<section class="ftco-section ftc-no-pb ftc-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets1/images/thumbnail.png);">
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section heading-section-wo-line pt-md-5 pl-md-5 mb-5">
	          	<div class="ml-md-0">
		          	<span class="subheading">Welcome to DnD Catering</span>
		            <h2 class="mb-4">Welcome To Our Serviced</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
			  <p>Salah satu perusahaan jasa katering terbaik di Yogyakarta, dibangun atas fondasi kepercayaan serta kepuasan konsumen sejak tahun 2006.</p>
							<p>Katering yang menyediakan varian paket menu dan setiap jenis kategori. Mulai dari Wedding/prasmanan, Gubugan, Snack, Nasi box, hingga Tumpengan.</p>
							<p>Kami siap melayani Anda
							Kami senantiasa memberikan produk berkualitas dengan penyajian yang lezat dan cepat.</p>
							<ul class="ftco-social d-flex">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
						</div>
					</div>
				</div>
			</div>
		</section>

<div class="container pt-3">
	<h1 class="text-center">Menu Kami</h1>

	<?php if ($this->session->flashdata('pesan')) { ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('pesan') ?></strong>
    </div>
<?php } ?>


</div>



<!-- Card -->
<section class="container py-3">
    <div class="row">
        <?php foreach ($paket as $items) { ?>

            <div class="col-md-3 col-sm-6 mb-4">
    <?php
    echo form_open('HalamanUtama/add_to_cart');
    echo form_hidden('id', $items->idPaketMenu);
    echo form_hidden('price', $items->harga);
    echo form_hidden('name', $items->namaPaketMenu);
    ?>
                <div class="card h-100">
                    <img src="<?= base_url('assets/admin/images/' . $items->gambar) ?>" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title text-center"><?= $items->namaPaketMenu ?></h3>
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <p class="px-2"><b>Rp. <?= number_format($items->harga, 2) ?></b></p>
                            <p class="px-2 text-secondary" style="font-size: 14px;">Per Porsi</p>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <?php if ($this->session->userdata('namaPembeli')) { ?>
                                <div class="px-2">
                                    <button class="btn btn-primary" type="submit">🛒</button>
                                </div>
                            <?php } else { ?>
                                <div class="px-2">
                                    <button class="btn btn-primary" type="submit" disabled>🛒</button>
                                </div>
                            <?php } ?>

                            <div class="px-2">
                                <a href="<?= base_url('PaketMenu/detail_paket/' . $items->idPaketMenu) ?>" class="btn btn-warning">🔍</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        <?php } ?>
    </div>
</section>

