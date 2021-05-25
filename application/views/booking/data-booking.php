<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-11 m-auto">
            <div class="table-responsive full-width">
                <table class="table table-bordered table-stripped table-hover" id="table-datatable">
                    <tr>
                        <th>No.</th>
                        <th>Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Pilihan</th>
                    </tr>

                    <?php $no = 1; foreach ($temp as $tmp) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <img src="<?= base_url('assets/img/upload/'.$tmp['image']) ?>" class="rounded" alt="No Picture" height="40">
                            </td>
                            <td nowrap><?=$tmp['penulis']?></td>
                            <td nowrap><?=$tmp['penerbit']?></td>
                            <td nowrap><?= substr($tmp['tahun_terbit'], 0, 4) ?></td>
                            <td>
                                <a class="btn btn-sm btn-outline-danger" href="<?= base_url('booking/hapusbooking/'.$tmp['id_buku']) ?>" onclick="return_konfirm('Yakin tidak jadi booking?'<?= $tmp['judul_buku']?>)">
                                    <i class="fas fw fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-11 m-auto">
            <hr>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-11 m-auto">
            <a class="btn btn-sm btn-outline-primary" href="<?= base_url() ?>">
                <i class="fas fw fa-play mr-1"></i> Lanjutkan Booking Buku
            </a>

            <a class="btn btn-sm btn-outline-success" href="<?= base_url('booking/bookingselesai/'.$this->session->userdata('id_user')); ?>">
                <i class="fas fw fa-stop mr-1"></i> Selesaikan Booking
            </a>
        </div>
    </div>
</div>