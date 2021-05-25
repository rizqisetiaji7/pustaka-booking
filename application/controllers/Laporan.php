<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller {
   public function __construct() {
      parent::__construct();
      cek_login();
      cek_user();
      $this->load->library('dompdf_gen');
   }

   public function laporan_buku() {
   	$data = [
   		'judul'		=> 'Laporan Data Buku',
   		'user'		=> $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(),
   		'buku'		=> $this->ModelBuku->getBuku()->result_array(),
   		'kategori'	=> $this->ModelBuku->getKategori()->result_array()
   	];

   	$this->load->view('templates/header', $data);
   	$this->load->view('templates/sidebar', $data);
   	$this->load->view('templates/topbar', $data);
   	$this->load->view('buku/laporan_buku', $data);
   	$this->load->view('templates/footer');
   }

   public function cetak_laporan_buku() {
      $data = [
         'judul' => 'Laporan Buku',
         'buku'   => $this->ModelBuku->getBuku()->result_array(),
         'kategori' => $this->ModelBuku->getKategori()->result_array()
      ];

      $this->load->view('buku/laporan_print_buku', $data);
   }

   public function laporan_buku_pdf() {
      $data['buku'] = $this->ModelBuku->getBuku()->result_array();
      $data['judul'] = 'Cetak PDF Laporan Buku';
      $filename = uniqid('Laporan_data_buku-');

      // Dompdf Print
      $this->dompdf_gen->print('buku/laporan_pdf_buku', $data, $filename, 'A4', 'landscape');
   }

   public function export_excel() {
      $data['buku'] = $this->ModelBuku->getBuku()->result_array();
      $data['judul'] = 'Cetak Excel Laporan Buku';
      $data['namafile'] = 'Laporan Buku '.date('Y-m-d').'.xls';
      $this->load->view('buku/export_excel_buku', $data);
   }

   public function laporan_pinjam() {
      $data = [
         'judul'     => 'Laporan Data Pinjam',
         'user'      => $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(),
         'laporan'   => $this->db->query("SELECT * FROM pinjam p, detail_pinjam d, buku b, user u WHERE d.id_buku=b.id AND p.id_user=u.id AND p.no_pinjam=d.no_pinjam")->result_array()
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('pinjam/laporan-pinjam', $data);
      $this->load->view('templates/footer');
   }

   public function cetak_laporan_pinjam() {
      $data = [
         'judul' => 'Cetak Data Laporan Peminjaman Buku',
         'laporan'   => $this->db->query("SELECT * FROM pinjam p, detail_pinjam d, buku b, user u WHERE d.id_buku=b.id AND p.id_user=u.id AND p.no_pinjam=d.no_pinjam")->result_array()
      ];

      $this->load->view('pinjam/laporan-print-pinjam', $data);
   }

   public function laporan_pinjam_pdf() {
      $data = [
         'judul' => 'Laporan Peminjaman Buku - PDF',
         'laporan'   => $this->db->query("SELECT * FROM pinjam p, detail_pinjam d, buku b, user u WHERE d.id_buku=b.id AND p.id_user=u.id AND p.no_pinjam=d.no_pinjam")->result_array()
      ];

      $filename = 'Laporan-peminjaman-';
      $filename .= trim(substr(md5(date('Y-m-d H:i:s', time())), 0, 10));

      // Dompdf Print
      $this->dompdf_gen->print('pinjam/laporan_pdf_pinjam',$data, $filename, 'A4', 'landscape');
   }

   public function export_excel_pinjam() {
      $data['judul'] = 'Laporan Data Peminjaman Buku';
      $data['namafile'] = 'Laporan-Peminjaman-Buku-'.date('YmdHis').'.xls';
      $data['laporan'] = $this->db->query("SELECT * FROM pinjam p, detail_pinjam d, buku b, user u WHERE d.id_buku=b.id AND p.id_user=u.id AND p.no_pinjam=d.no_pinjam")->result_array();
      $this->load->view('pinjam/export-excel-pinjam', $data);
   }
}