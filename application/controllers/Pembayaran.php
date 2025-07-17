<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

  public function index()
  {
    $data['title'] = 'Data Pembayaran';
    $this->db->select('pembayaran.id_pembayaran, pembayaran.tgl_bayar, pembayaran.jumlah_bayar, pembayaran.metode, reservasi.id_reservasi as kode_reservasi, tamu.nama_tamu');
    $this->db->from('pembayaran');
    $this->db->join('reservasi', 'pembayaran.id_reservasi = reservasi.id_reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');

    $tanggal_mulai = $this->input->get('tanggal_mulai');
    $tanggal_selesai = $this->input->get('tanggal_selesai');

    if ($tanggal_mulai && $tanggal_selesai) {
      $this->db->where('pembayaran.tgl_bayar >=', $tanggal_mulai);
      $this->db->where('pembayaran.tgl_bayar <=', $tanggal_selesai);
    }

    $this->db->order_by('pembayaran.tgl_bayar', 'DESC');
    $data['pembayaran'] = $this->db->get()->result();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('pembayaran/index', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $data['title'] = 'Input Pembayaran';

 
    $this->db->select('reservasi.*, kamar.harga');
    $this->db->from('reservasi');
    $this->db->join('kamar', 'reservasi.id_kamar = kamar.id_kamar');
    $this->db->where('reservasi.status', 'checkin');
    $data['reservasi'] = $this->db->get()->result();

    if ($this->input->post()) {
      $id_reservasi = $this->input->post('id_reservasi');

      $data_bayar = [
        'id_reservasi' => $id_reservasi,
        'tgl_bayar'    => $this->input->post('tanggal'),
        'jumlah_bayar' => $this->input->post('jumlah'),
        'metode'       => $this->input->post('metode')
      ];
      $this->db->insert('pembayaran', $data_bayar);
      $reservasi = $this->db->get_where('reservasi', ['id_reservasi' => $id_reservasi])->row();
      $this->db->where('id_reservasi', $id_reservasi)->update('reservasi', ['status' => 'checkout']);
      if ($reservasi) {
        $this->db->where('id_kamar', $reservasi->id_kamar)->update('kamar', ['status' => 'Tersedia']);
      }

      redirect('pembayaran');
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('pembayaran/create', $data);
    $this->load->view('templates/footer');
  }

  public function invoice($id)
  {
    $this->db->select('pembayaran.*, reservasi.*, tamu.nama_tamu, kamar.nomor_kamar, kamar.tipe_kamar');
    $this->db->from('pembayaran');
    $this->db->join('reservasi', 'pembayaran.id_reservasi = reservasi.id_reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
    $this->db->join('kamar', 'reservasi.id_kamar = kamar.id_kamar');
    $this->db->where('pembayaran.id_pembayaran', $id);
    $data['data'] = $this->db->get()->row();

    if (!$data['data']) {
      show_404();
    }

    $this->load->view('pembayaran/invoice', $data);
  }

  public function cetak()
  {
    $this->db->select('pembayaran.id_pembayaran, pembayaran.tgl_bayar, pembayaran.jumlah_bayar, pembayaran.metode, reservasi.id_reservasi AS kode_reservasi, tamu.nama_tamu');
    $this->db->from('pembayaran');
    $this->db->join('reservasi', 'pembayaran.id_reservasi = reservasi.id_reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');

    $tanggal_mulai   = $this->input->get('tanggal_mulai');
    $tanggal_selesai = $this->input->get('tanggal_selesai');

    if ($tanggal_mulai && $tanggal_selesai) {
      $this->db->where('tgl_bayar >=', $tanggal_mulai);
      $this->db->where('tgl_bayar <=', $tanggal_selesai);
    }

    $data['title'] = 'Laporan Pembayaran';
    $data['pembayaran'] = $this->db->get()->result();

    $this->load->view('pembayaran/cetak', $data);
  }
}
