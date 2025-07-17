<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {

  public function index()
  {
    $data['title'] = 'Data Tamu';
    $data['tamu'] = $this->db->get('tamu')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('tamu/index', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $data['title'] = 'Tambah Tamu';

    if ($this->input->post()) {
      $data_insert = [
        'nama_tamu' => $this->input->post('nama_tamu'),
        'alamat'    => $this->input->post('alamat'),
        'no_hp'     => $this->input->post('no_hp'),
        'no_ktp'    => $this->input->post('no_ktp'), 
      ];
      $this->db->insert('tamu', $data_insert);
      redirect('tamu');
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('tamu/create');
    $this->load->view('templates/footer');
  }

  public function edit($id_tamu)
  {
    $data['title'] = 'Edit Tamu';
    $data['tamu'] = $this->db->get_where('tamu', ['id_tamu' => $id_tamu])->row();

    if (!$data['tamu']) {
      show_404();
    }

    if ($this->input->post()) {
      $data_update = [
        'nama_tamu' => $this->input->post('nama_tamu'),
        'alamat'    => $this->input->post('alamat'),
        'no_hp'     => $this->input->post('no_hp'),
        'no_ktp'    => $this->input->post('no_ktp'),
      ];
      $this->db->where('id_tamu', $id_tamu)->update('tamu', $data_update);
      redirect('tamu');
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('tamu/edit', $data);
    $this->load->view('templates/footer');
  }

  public function delete($id_tamu)
  {
    $this->db->delete('tamu', ['id_tamu' => $id_tamu]);
    redirect('tamu');
  }
}
