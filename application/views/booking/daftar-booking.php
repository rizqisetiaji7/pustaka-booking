<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-11 m-auto">
            <div class="table-responsive full-width">
                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                    <tr>
                        <th>No.</th>
                        <th>ID Booking</th>
                        <th>Tanggal Booking</th>
                        <th>ID User</th>
                        <th>Aksi</th>
                        <th>Denda / Buku / Hari</th>
                        <th>Lama Pinjam</th>
                    </tr>

                    <?php $no = 1; foreach($pinjam as $p) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <a href="<?= base_url('pinjam/bookingdetail/'.$p['id_booking']); ?>" class="btn btn-link">
                                <?= $p['id_booking']; ?>
                            </a>    
                        </td>
                        <td><?= $p['tgl_booking']; ?></td>
                        <td><?= $p['id_user'] ?></td>
                        <form action="<?= base_url('pinjam/pinjamAct/'.$p['id_booking']) ?>" method="post">
                            <td nowrap>
                                <button type="submit" class="btn btn-sm btn-outline-info"><i class="fas fa-fw fa-cart-plus"></i> Pinjam</button>
                            </td>
                            <td>
                                <input type="text" class="form-check-user rounded-sm" style="width: 100px" name="denda" id="denda" value="5000">
                                <?= form_error() ?>
                            </td>
                            <td>
                                <input type="text" class="form-check-user rounded-sm" style="width: 100px" name="lama" id="lama" value="3">
                                <?= form_error() ?>
                            </td>
                        </form>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="text-center">
                <a href="<?= base_url('pinjam/daftarbooking') ?>" class="btn btn-link"><i class="fas fa-fw fa-refresh"></i> Refresh</a>
            </div>
        </div>
    </div>
</div>