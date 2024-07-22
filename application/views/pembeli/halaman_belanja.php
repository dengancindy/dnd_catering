<div class="hero-wrap" style="background-image: url(<?php echo base_url('assets1/images/bg.jpg');?>">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo site_url(); ?>">Checkout</a></span></p>
	            <h1 class="mb-4 bread">DnD Catering</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container mt-5">
        <h2 class="mb-4">Checkout</h2>
        
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
                        <td><?= number_format($items['price'], 2) ?></td>
                        <td><?= $items['qty'] ?></td>
                        <td><?= number_format($items['subtotal'], 2) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="card py-3 shadow-lg container">
			<h3 class="mb-3">Detail Pengiriman</h3>
			<hr>
        <div class="row">
            <?= form_open('belanja/process') ?>
            <?php
                // Ensure $idPaketMenu and $totalHarga are set even if the cart is empty
                $idPaketMenu = isset($items['id']) ? $items['id'] : '';
                $totalHarga = isset($items['subtotal']) ? $items['subtotal'] : 0;
            ?>
            <?= form_hidden('idPaketMenu', $idPaketMenu) ?>
            <?= form_hidden('totalHarga', $totalHarga) ?>
            <!-- <input name="idPembeli" type="hidden"> -->

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="alamatPengiriman" class="form-label">Alamat Pengiriman</label>
                    <input type="text" class="form-control" id="alamatPengiriman" name="alamatPengiriman" placeholder="Masukan Alamat" required>
                </div>
                <div class="col-md-6">
                    <label for="tglPesan" class="form-label">Tanggal Pesan</label>
                    <input type="date" class="form-control" id="tglPesan" name="tglPesan" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tglPengiriman" class="form-label">Tanggal Pengiriman</label>
                    <input type="date" class="form-control" id="tglPengiriman" name="tglPengiriman" required>
                </div>
                <div class="col-md-6">
                    <label for="jam" class="form-label">Jam Pengiriman</label>
                    <input type="time" class="form-control" id="jam" name="jam" required>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-success">Pesan</button>
            </div>
            <?= form_close() ?>
        </div>
		</div>
    </div>
