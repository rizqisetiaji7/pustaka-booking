<!-- Login Modal -->
<div class="modal fade" tabindex="-1" id="loginModal" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Login member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <form action="<?= base_url('member'); ?>" method="POST">
            <div class="modal-body">
               <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="email" id="email" placeholder="Alamat Email">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                  </div>
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-outline-primary">Log in</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- Daftar Modal -->
<div class="modal fade" tabindex="-1" id="daftarModal" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Daftar Anggota</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <form action="<?= base_url('member/daftar'); ?>" method="POST">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Lengkap">
               </div>

               <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat Lengkap">
               </div>

               <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Alamat Email">
               </div>

               <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password">
               </div>

               <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ulangi Password">
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!-- Modal Info -->
<div class="modal fade" tabindex="-1" id="modalinfo" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-header">
         <h5 class="modal-title">Informasi</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
         <span class="alert alert-message alert-success">Waktu Pengambilan Buku 1x24 jam dari Booking!!!</span>
      </div>
      <div class="modal-footer">
         <a href="<?= base_url() ?>" class="btn btn-outline-info">OK</a>
      </div>
   </div>
</div>

<!-- Modal Logout -->
<div class="modal fade" id="modalUserLogout" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin akan logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="<?= base_url('member/logout'); ?>" class="btn btn-danger">Log out</a>
      </div>
    </div>
  </div>
</div>