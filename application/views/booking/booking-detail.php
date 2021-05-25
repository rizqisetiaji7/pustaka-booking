<div class="container">
   <div class="row">
      <div class="col-sm-12 col-md-11">
         <table>
            <?php foreach($agt_booking as $ab) { ?>
            <tr>
               <td>Data Anggota</td>
               <td> : </td>
               <td><?= $ab['nama'] ?></td>
            </tr>
            <?php } ?>
            <tr>
               <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="3">
                  <hr>
               </td>
            </tr>
         </table>

         <table class="table table-bordered table-striped table-hover" id="table-datatable"">
            <tr>
               <td>No.</td>
               <td>ID Buku</td>
               <td>Judul Buku</td>
               <td>Pengarang</td>
               <td>Penerbit</td>
               <td>Tahun</td>
            </tr>
            <?php $no=1; foreach($detail as $d) { ?>
            <tr>
               <td><?= $no++ ?></td>
               <td><?= $d['id_buku'] ?></td>
               <td><?= $d['judul_buku'] ?></td>
               <td><?= $d['pengarang'] ?></td>
               <td><?= $d['penerbit'] ?></td>
               <td><?= $d['tahun_terbit'] ?></td>
            </tr>
            <?php } ?>
         </table>
      </div>
      <div class="col-sm-12 col-md-11 text-center">
         <a href="#" onclick="window.history.go(-1)" class="btn btn-outline-dark"><i class="fas fa-fw fa-reply"></i> Kembali</a>
      </div>
   </div>
</div>