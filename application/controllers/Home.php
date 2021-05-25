<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {
   public function __construct() {
      parent::__construct();
   }

   public function index() {
      // Jika sudah login dan jika belum login
      if ($this->session->userdata('email')) {
         $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
         $data = [
            'judul' => 'Pustaka Booking',
            'user' => $user['nama'],
            'buku' => $this->ModelBuku->getBuku()->result()
         ];

         $this->load->view('templates/templates-user/header', $data);
         $this->load->view('buku/daftarbuku', $data);
         $this->load->view('templates/templates-user/modal');
         $this->load->view('templates/templates-user/footer', $data);
      } else {
         $data = [
            'judul' => 'Pustaka Booking | Katalog Buku',
            'user' => 'Pengunjung',
            'buku' => $this->ModelBuku->getBuku()->result()
         ];
         $this->load->view('templates/templates-user/header', $data);
         $this->load->view('buku/daftarbuku', $data);
         $this->load->view('templates/templates-user/modal');
         $this->load->view('templates/templates-user/footer', $data);
      }
   }

   public function detailBuku($id = null) {
      $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
      if ($this->session->userdata('email')) {
         $data = [
            'user' => $user['nama'],
            'judul' => 'Detail Buku',
            'buku' => $this->ModelBuku->joinKategoriBuku($id)->result()[0]
         ];
      } else {
         $data = [
            'user' => 'Pengunjung',
            'title' => 'Detail Buku',
            'buku' => $this->ModelBuku->joinKategoriBuku($id)->result()[0]
         ];
      }
      $this->load->view('templates/templates-user/header', $data);
      $this->load->view('buku/detail-buku', $data);
      $this->load->view('templates/templates-user/modal');
      $this->load->view('templates/templates-user/footer');
   }
}