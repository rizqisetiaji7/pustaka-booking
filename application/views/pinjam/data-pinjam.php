<div class="container">
   <div class="row">
      <div class="col-sm-12 col-md-11">
         <div class="table-reponsive full-width">
            <table class="table table-bordered table-striped table-hover" id="table-datatable">
               <tr>
                  <td>No Pinjam</td>
                  <td>Tanggal Pinjam</td>
                  <td>ID User</td>
                  <td>ID Buku</td>
                  <td>Tanggal Kembali</td>
                  <td>Tanggal Pengembalian</td>
                  <td>Terlamabat</td>
                  <td>Denda</td>
                  <td>Status</td>
                  <td>Total Denda</td>
                  <td>Pilihan</td>
               </tr>

               <?php foreach($pinjam as $p) { ?>
                  <tr>
                     <td><?= $p['no_pinjam'] ?></td>
                     <td><?= $p['tgl_pinjam'] ?></td>
                     <td><?= $p['id_user'] ?></td>
                     <td><?= $p['id_buku'] ?></td>
                     <td><?= $p['tgl_kembali'] ?></td>
                     <td>
                        <?= date('Y-m-d') ?>
                        <input type="hidden" name="tgl_pengembalian" id="tgl_pengembalian" value="<?= date('Y-m-d') ?>">
                     </td>
                     <td>
                        <?php 
                           $tgl1 = new DateTime($p['tgl_kembali']);
                           $tgl2 = new DateTime();

                           if (date('Y-m-d') > $p['tgl_kembali']) {
                              $selisih = $tgl2->diff($tgl1)->format("%a");  
                           } else {
                              $selisih = 0;
                           }
                           
                           echo $selisih;
                        ?> Hari
                     </td>
                     <td><?= $p['denda'] ?></td>

                     <?php if($p['status'] == 'Pinjam') { $status ='warning'; } else { $status = 'secondary'; } ?>
                     <td><i class="<?= "btn btn-outline-".$status ?>"><?= $p['status'] ?></i></td>
                     <?php
                        if ($selisih < 0) {
                           $total_denda = $p['denda'] * 0;
                        } else {
                           $total_denda = $p['denda'] * $selisih;
                        }
                     ?>
                     <td><?= $total_denda; ?> <input type="hidden" name="totaldenda" id="totaldenda" value="<?= $total_denda ?>"></td>
                     <td nowrap>
                        <?php if($p['status'] == 'Kembali') { ?>
                        <span class="btn btn-sm btn-outline-secondary">
                           <i class="fas fa-fw fa-edit"></i>
                        </span>
                        <?php } else { ?>
                        <a class="btn btn-sm btn-outline-info" href="<?= base_url('pinjam/ubahStatus/'.$p['id_buku'].'/'.$p['no_pinjam']) ?>">
                           <i class="fas fa-fw fa-edit"></i> Ubah Status
                        </a>
                        <?php } ?>
                     </td>
                  </tr>
               <?php } ?>
            </table>
         </div>
      </div>
   </div>
</div>