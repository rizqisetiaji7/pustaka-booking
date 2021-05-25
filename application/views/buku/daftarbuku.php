<?= $this->session->flashdata('pesan'); ?>

<div style="padding: 25px;">
  <div class="x-panel">
    <div class="x_content">
      <!-- Tampilkan Semua Produk -->
      <div class="row">
        <!-- Looping Produk -->
        <?php foreach ($buku as $bku) { ?>
          <div class="col-md-2 col-md-3 mb-4">
            <div class="thumbnail" style="height: 370px;">
              <img src="<?= base_url('assets/img/upload/') . $bku->image; ?>" style="max-width:100%; max-height: 100%; height: 200px; width: 180px;">
              <div class="caption">
                <h5 class="mt-2" style="min-height: 30px"><?= $bku->pengarang ?></h5>
                <small class="mb-0"><b>Penerbit</b> : <?= $bku->penerbit ?></small> <br>
                <small class="mb-3 d-block"><b>Tahun</b> : <?= substr($bku->tahun_terbit, 0, 4) ?></small>

                <p>
                  <?php if ($bku->stok < 1) { ?>
                    <i class="btn btn-outline-primary fas fw fa-shopping-cart">Booking&nbsp;&nbsp; 0</i>
                  <?php } else { ?>
                    <a class="btn btn-outline-primary fas fw fa-shopping-cart" href="<?= base_url('booking/tambahBooking/' . $bku->id) ?>">Booking</a>
                  <?php } ?>

                  <a class="btn btn-outline-warning fas fw fa-search" href="<?= base_url('detail-buku/' . $bku->id) ?>">Detail</a>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- End looping -->
      </div>
    </div>
  </div>
</div>