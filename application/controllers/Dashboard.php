<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {
    public function index()
{
    $data['title'] = 'Dashboard';

    $data['jumlah_kamar']     = $this->db->count_all('kamar');
    $data['jumlah_tamu']      = $this->db->count_all('tamu');
    $data['reservasi_aktif']  = $this->db->where_in('status', ['Booked', 'Check-in'])->count_all_results('reservasi');
    $data['total_pendapatan'] = $this->db->select_sum('jumlah')->get('pembayaran')->row()->jumlah;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
}
}