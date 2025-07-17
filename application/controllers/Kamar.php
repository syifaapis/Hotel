<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

  public function index()
  {
    $data['title'] = 'Data Kamar';
    $data['kamar'] = $this->db->get('kamar')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('kamar/index', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $data['title'] = 'Tambah Kamar';
  
    if ($this->input->post()) {
      $data_insert = [
        'nomor_kamar' => $this->input->post('nomor_kamar'),
        'tipe_kamar'  => $this->input->post('tipe_kamar'),
        'harga'       => $this->input->post('harga'),
        'status'      => 'Tersedia'
      ];
  
      $this->db->insert('kamar', $data_insert);
      redirect('kamar');
    }
  
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('kamar/create', $data);
    $this->load->view('templates/footer');
  }
  

  public function edit($id_kamar)
  {
    $data['title'] = 'Edit Kamar';
    $data['kamar'] = $this->db->get_where('kamar', ['id_kamar' => $id_kamar])->row();

    if (!$data['kamar']) {
      show_404();
    }

    if ($this->input->post()) {
      $data_update = [
        'nomor_kamar' => $this->input->post('nomor_kamar'),
        'tipe_kamar'  => $this->input->post('tipe_kamar'),
        'harga'       => $this->input->post('harga'),
        'status'      => $this->input->post('status')
      ];
      $this->db->where('id_kamar', $id_kamar)->update('kamar', $data_update);
      redirect('kamar');
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('kamar/edit', $data);
    $this->load->view('templates/footer');
  }

  public function delete($id_kamar)
  {
    $this->db->delete('kamar', ['id_kamar' => $id_kamar]);
    redirect('kamar');
  }
}
