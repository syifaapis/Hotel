<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {

  public function index()
  {
    $data['title'] = 'Data Reservasi';
  
    $this->db->select('reservasi.*, tamu.nama_tamu, kamar.nomor_kamar, kamar.tipe_kamar');
    $this->db->from('reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
    $this->db->join('kamar', 'reservasi.id_kamar = kamar.id_kamar');
  
    // Filter tanggal & status
    if ($this->input->get('tanggal_mulai')) {
      $this->db->where('tgl_checkin >=', $this->input->get('tanggal_mulai'));
    }
    if ($this->input->get('tanggal_selesai')) {
      $this->db->where('tgl_checkout <=', $this->input->get('tanggal_selesai'));
    }
    if ($this->input->get('status')) {
      $this->db->where('reservasi.status', $this->input->get('status'));
    }
  
    $data['reservasi'] = $this->db->get()->result();
  
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('reservasi/index', $data);
    $this->load->view('templates/footer');
  }
  

  public function create()
  {
    $data['title'] = 'Tambah Reservasi';
    $data['tamu'] = $this->db->get('tamu')->result();
    $data['kamar'] = $this->db->get_where('kamar', ['status' => 'Tersedia'])->result();
  
    if ($this->input->post()) {
      $data_insert = [
        'id_tamu'      => $this->input->post('id_tamu'),
        'id_kamar'     => $this->input->post('id_kamar'),
        'tgl_checkin'  => $this->input->post('tgl_checkin'),
        'tgl_checkout' => $this->input->post('tgl_checkout'),
        'jumlah_tamu'  => $this->input->post('jumlah_tamu'),
        'status'       => $this->input->post('status') // status diambil dari input user
      ];
  
      $this->db->insert('reservasi', $data_insert);
  
      // Jika status yang diinput adalah "checkin", baru ubah status kamar ke "Terisi"
      if ($data_insert['status'] === 'checkin') {
        $this->db->where('id_kamar', $data_insert['id_kamar'])->update('kamar', ['status' => 'Terisi']);
      }
  
      redirect('reservasi');
    }
  
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('reservasi/create', $data);
    $this->load->view('templates/footer');
  }
  
  

  public function edit($id_reservasi)
  {
    $data['title'] = 'Edit Reservasi';

    $this->db->select('reservasi.*, tamu.nama_tamu, kamar.nomor_kamar');
    $this->db->from('reservasi');
    $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
    $this->db->join('kamar', 'reservasi.id_kamar = kamar.id_kamar');
    $this->db->where('reservasi.id_reservasi', $id_reservasi);
    $data['reservasi'] = $this->db->get()->row();

    if (!$data['reservasi']) {
      show_404();
    }

    $data['tamu'] = $this->db->get('tamu')->result();
    $data['kamar'] = $this->db->query("SELECT * FROM kamar WHERE status = 'Tersedia' OR id_kamar = " . (int)$data['reservasi']->id_kamar)->result();

    if ($this->input->post()) {
      $old_id_kamar = $data['reservasi']->id_kamar;
      $new_id_kamar = $this->input->post('id_kamar');

      $data_update = [
        'id_tamu'      => $this->input->post('id_tamu'),
        'id_kamar'     => $new_id_kamar,
        'tgl_checkin'  => $this->input->post('tgl_checkin'),
        'tgl_checkout' => $this->input->post('tgl_checkout'),
        'jumlah_tamu'  => $this->input->post('jumlah_tamu'),
        'status'       => $this->input->post('status')
      ];

      $this->db->where('id_reservasi', $id_reservasi)->update('reservasi', $data_update);

      if ($old_id_kamar != $new_id_kamar) {
        $this->db->where('id_kamar', $old_id_kamar)->update('kamar', ['status' => 'Tersedia']);
      }
      
      if ($data_update['status'] === 'checkin') {
        $this->db->where('id_kamar', $new_id_kamar)->update('kamar', ['status' => 'Terisi']);
      } else {
        $this->db->where('id_kamar', $new_id_kamar)->update('kamar', ['status' => 'Tersedia']);
      }
      

      redirect('reservasi');
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('reservasi/edit', $data);
    $this->load->view('templates/footer');
  }

  public function delete($id_reservasi)
  {
    $this->db->where('id_reservasi', $id_reservasi)->delete('pembayaran');
      $reservasi = $this->db->get_where('reservasi', ['id_reservasi' => $id_reservasi])->row();
  
    if ($reservasi) {
      $this->db->where('id_reservasi', $id_reservasi)->delete('reservasi');
        $this->db->where('id_kamar', $reservasi->id_kamar)->update('kamar', ['status' => 'Tersedia']);
    }
  
    redirect('reservasi');
  }
  public function cetak()
{
  $data['title'] = 'Laporan Reservasi';

  $this->db->select('reservasi.*, tamu.nama_tamu, kamar.nomor_kamar, kamar.tipe_kamar');
  $this->db->from('reservasi');
  $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
  $this->db->join('kamar', 'reservasi.id_kamar = kamar.id_kamar');

  if ($this->input->get('tanggal_mulai')) {
    $this->db->where('tgl_checkin >=', $this->input->get('tanggal_mulai'));
  }
  if ($this->input->get('tanggal_selesai')) {
    $this->db->where('tgl_checkout <=', $this->input->get('tanggal_selesai'));
  }
  if ($this->input->get('status')) {
    $this->db->where('reservasi.status', $this->input->get('status'));
  }

  $data['reservasi'] = $this->db->get()->result();

  $this->load->view('reservasi/cetak', $data);
}

  
}
