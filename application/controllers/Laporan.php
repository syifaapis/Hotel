<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Laporan Pembayaran';

        if ($this->input->get('dari') && $this->input->get('sampai')) {
            $this->db->where('tgl_checkin >=', $this->input->get('dari'));
            $this->db->where('tgl_checkout <=', $this->input->get('sampai'));
        }

        $this->db->join('reservasi', 'pembayaran.id_reservasi = reservasi.id_reservasi');
        $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
        $data['laporan'] = $this->db->get('pembayaran')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function print()
    {
        $data['title'] = 'Cetak Laporan Pembayaran';
    
        if ($this->input->get('dari') && $this->input->get('sampai')) {
            $this->db->where('tgl_checkin >=', $this->input->get('dari'));
            $this->db->where('tgl_checkout <=', $this->input->get('sampai'));
        }
    
        $this->db->join('reservasi', 'pembayaran.id_reservasi = reservasi.id_reservasi');
        $this->db->join('tamu', 'reservasi.id_tamu = tamu.id_tamu');
        $data['laporan'] = $this->db->get('pembayaran')->result();

        $this->load->view('laporan/print', $data);
    }
    
}
