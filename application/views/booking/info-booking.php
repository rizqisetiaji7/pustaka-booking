<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-11 m-auto">
            <h5>Terima Kasih <b><?= $useraktif[0]->nama?></b></h5>
            <p>Buku yang ingin anda pinjam adalah sebagai berikut:</p>
        </div>
        <div class="col-sm-12 col-md-11 m-auto">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                    <tr>
                        <th>No.</th>
                        <th>Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                    </tr>

                    <?php $no = 1; foreach($items as $it) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/upload/'.$it['image']) ?>" class="rounded" alt="No Picture" height="40">
                            </td>
                            <td nowrap><?= $it['pengarang'] ?></td>
                            <td nowrap><?= $it['penerbit'] ?></td>
                            <td nowrap><?= $it['tahun_terbit'] ?></td>
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
            <a class="btn btn-sm btn-outline-danger" onclick="information('Waktu pengambilan buku 1x24 jam dari booking!')" href="<?= base_url('printpdf/'.$this->session->userdata('id_user')) ?>">
                <i class="fas fa-lg fa-fw fa-file-pdf"></i> Cetak PDF
            </a>
        </div>
    </div>
</div>