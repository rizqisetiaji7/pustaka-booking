<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $this->_login();
   }

   private function _login() {
      $email = htmlspecialchars($this->input->post('email', true));
      $password = $this->input->post('password', true);

      $user = $this->ModelUser->cekData(['email' => $email])->row_array();

      // Cek jika user ada
      if ($user) {
         // jika user sudah aktif
         if ($user['is_active'] == 1) {
            // Cek Password
            if (password_verify($password, $user['password'])) {
               $data = [
                  'email' => $user['email'],
                  'role_id' => $user['role_id'],
                  'id_user' => $user['id'],
                  'nama' => $user['nama'],
               ];

               $this->session->set_userdata($data);
               redirect(base_url());
            } else {
               $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">Password salah!</div>');
               redirect(base_url());
            }
         } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">User belum di aktifasi!</div>');
            redirect(base_url());
         }
      } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!</div>');
         redirect(base_url());
      }

   }

   public function daftar() {
      $this->form_validation->set_rules('nama','Nama Lengkap','required', ['required' => 'Nama wajib di isi!']);
      $this->form_validation->set_rules('alamat','Alamat Lengkap','required',['required' => 'Alamat wajib di isi!']);
      $this->form_validation->set_rules('email','Alamat Email','required|valid_email|trim|is_unique[user.email]', [
         'required' => 'Email wajib di isi!',
         'valid_email' => 'Email tidak valid!',
         'is_unique' => 'Email sudah terdaftar!'
      ]);
      $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]', [
         'matches' => 'Password tidak sama!',
         'min_length' => 'Password terlalu pendek!'
      ]);
      $this->form_validation->set_rules('password2','Repeat Password', 'required|matches[password1]|trim');
      $data = [
         'nama' => htmlspecialchars($this->input->post('nama', true)),
         'alamat' => htmlspecialchars($this->input->post('alamat', true)),
         'email' => htmlspecialchars($this->input->post('email', true)),
         'image' => 'default.jpg',
         'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
         'role_id' => 2,
         'is_active' => 1,
         'tanggal_input' => now('Asia/Jakarta')
      ];

      $this->ModelUser->simpanData($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat, akun anggota anda berhasil terdaftar.</div>');
      redirect(base_url());
   }

   public function myProfile() {
      $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
      $data = [
         'judul' => 'Profile Saya',
         'image' => $user['image'],
         'user' => $user['nama'],
         'email' => $user['email'],
         'tanggal_input' => $user['tanggal_input']
      ];

      $this->load->view('templates/templates-user/header', $data);
      $this->load->view('member/index', $data);
      $this->load->view('templates/templates-user/modal');
      $this->load->view('templates/templates-user/footer', $data);
   }

   public function ubahprofile() {
      $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
      $data = [
         'judul' => 'Ubah Profile',
         'image' => $user['image'],
         'user' => $user['nama'],
         'email' => $user['email'],
         'tanggal_input' => $user['tanggal_input']
      ];

      $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
         'required' => 'Nama tidak boleh kosong!'
      ]);

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/templates-user/header', $data);
         $this->load->view('member/ubah-anggota', $data);
         $this->load->view('templates/templates-user/modal');
         $this->load->view('templates/templates-user/footer', $data);
      } else {
         $nama = $this->input->post('nama', true);
         $email = $this->input->post('email', true);

         // Jika ada gambar yang di upload
         $upload_image = $_FILES['image']['name'];

         if ($upload_image) {
            $config = [
               'upload_path' => './assets/img/profile/',
               'allowed_types' => 'gif|jpg|jpeg|png',
               'max_size' => '3000',
               'max-width' => '1024',
               'max_height' => '1000',
               'file_name' => 'pro-'.time()
            ];

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
               $gambar_lama = $user['image'];
               if ($gambar_lama != 'default.jpg') {
                  unlink(FCPATH.'assets/img/profile/'.$gambar_lama);
               }

               $gambar_baru = $this->upload->data('file_name');
               $this->db->set('image', $gambar_baru);
            }
         }

         $this->db->set('nama', $nama);
         $this->db->where('email', $email);
         $this->db->update('user');

         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-message" role="alert">Profile berhasil diubah</div>');
         redirect('member/myprofile');
      }
   }

   public function logout() {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!</div>');
      redirect(base_url());
   }

}