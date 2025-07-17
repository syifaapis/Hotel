<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_resepsionis extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('is_login') || $this->session->userdata('level') != 'resepsionis') {
      redirect('auth');
    }
  }

  public function index() {
    $tanggal = date('Y-m-d');
    $this->db->select('tamu.nama_tamu, kamar.nomor_kamar, reservasi.tgl_checkin, reservasi.tgl_checkout');
    $this->db->from('reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
    $this->db->join('kamar', 'reservasi.id_kamar = kamar.id_kamar');
    $this->db->where('DATE(reservasi.tgl_checkin)', $tanggal);
    $query = $this->db->get();

    $data['tamu_hari_ini'] = $query->result();
    $data['total_tamu'] = count($data['tamu_hari_ini']);
    $data['total_checkin'] = $data['total_tamu'];

    $this->db->select_sum('jumlah_bayar');
    $this->db->where('DATE(tgl_bayar)', $tanggal);
    $row = $this->db->get('pembayaran')->row();
    $data['total_pendapatan'] = $row && $row->jumlah_bayar ? $row->jumlah_bayar : 0;

    // Ambil data untuk grafik pendapatan 7 hari terakhir
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

    // Ambil 5 reservasi terbaru
    $this->db->select('reservasi.*, tamu.nama_tamu');
    $this->db->from('reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
    $this->db->order_by('id_reservasi', 'DESC');
    $this->db->limit(5);
    $data['reservasi'] = $this->db->get()->result();

    $data['title'] = 'Dashboard Resepsionis';
    $this->load->view('resepsionis/dashboard_resepsionis', $data);
  }
}
