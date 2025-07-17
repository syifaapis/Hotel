<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('is_login') || $this->session->userdata('level') != 'admin') {
      redirect('auth');
    }
  }

  public function index() {
    $data['title'] = 'Dashboard Admin';

    $today = date('Y-m-d');
    $this->db->where('DATE(tgl_checkin)', $today);
    $data['total_tamu'] = $this->db->count_all_results('reservasi');

    $this->db->select_sum('jumlah_bayar');
    $this->db->where('DATE(tgl_bayar)', $today);
    $query = $this->db->get('pembayaran')->row();
    $data['total_pendapatan'] = $query ? $query->jumlah_bayar : 0;

    // Data Grafik Pendapatan 7 Hari Terakhir
    $pendapatan = [];
    for ($i = 6; $i >= 0; $i--) {
      $tgl = date('Y-m-d', strtotime("-$i days"));
      $this->db->select_sum('jumlah_bayar');
      $this->db->where('DATE(tgl_bayar)', $tgl);
      $row = $this->db->get('pembayaran')->row();
      $pendapatan[] = [
        'tanggal' => date('d M', strtotime($tgl)),
        'jumlah' => $row && $row->jumlah_bayar ? $row->jumlah_bayar : 0
      ];
    }
    $data['grafik'] = $pendapatan;

    // Reservasi Terbaru (5 terbaru)
    $this->db->select('reservasi.*, tamu.nama_tamu');
    $this->db->from('reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu', 'left');
    $this->db->order_by('reservasi.id_reservasi', 'DESC');
    $this->db->limit(5);
    $data['reservasi'] = $this->db->get()->result();

    $this->load->view('admin/dashboard', $data);
  }
}
