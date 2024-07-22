<div class="hero-wrap" style="background-image: url(<?php echo base_url('assets1/images/bg.jpg');?>">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a>Keranjang</a></span></p>
	            <h1 class="mb-4 bread">DnD Catering</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container mt-5">
        <h2 class="mb-4">Keranjang Belanja</h2>
        <?php if ($this->session->flashdata('pesan')) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $this->session->flashdata('pesan') ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <table class="table table-bordered shadow-lg">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
					<th scope="col">Settings</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $keranjang = $this->cart->contents();
                $i = 1; 
                foreach ($keranjang as $items) { ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= htmlspecialchars($items['name']) ?></td>
                        <td>Rp.<?= number_format($items['price'], 2) ?></td>
                        <td><?= $items['qty'] ?></td>
                        <td>Rp.<?= number_format($items['subtotal'], 2) ?></td>
						<td>
							<a href="<?= base_url('belanja/delete_cart/'.$items['rowid']) ?>" class="btn btn-danger">Delete</a>
						</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-4">
            <a href="<?= base_url('HalamanUtama') ?>" class="btn btn-primary">Lanjutkan Belanja</a>
			<?php if(empty($keranjang)) { ?>
				<button class="btn btn-danger" disabled>Checkout</button>
			<?php } else { ?>
				 <a href="<?= base_url('belanja') ?>" class="btn btn-success">Checkout</a>
			<?php } ?>
            
        </div>
    </div>
