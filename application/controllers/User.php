<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index() {
        $data['title'] = 'Manajemen Akun Pengguna';
        $data['users'] = $this->db->get('users')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $data['title'] = 'Tambah Akun Pengguna';

        if ($this->input->post()) {
            $dataInput = [
                'username'      => $this->input->post('username'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'level'         => $this->input->post('level')
            ];

            if ($dataInput['username'] && $dataInput['password'] && $dataInput['nama_lengkap'] && $dataInput['level']) {
                $this->db->insert('users', $dataInput);
                $this->session->set_flashdata('success', 'Akun berhasil ditambahkan.');
                redirect('user/index');
            } else {
                $this->session->set_flashdata('error', 'Semua data wajib diisi!');
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/create', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id) {
        $data['title'] = 'Edit Akun Pengguna';
        $data['user'] = $this->db->get_where('users', ['id_user' => $id])->row();

        if (!$data['user']) {
            show_404();
        }

        if ($this->input->post()) {
            $update = [
                'username'     => $this->input->post('username'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'level'        => $this->input->post('level')
            ];

            $password = $this->input->post('password');
            if (!empty($password)) {
                $update['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->db->where('id_user', $id)->update('users', $update);
            $this->session->set_flashdata('success', 'Akun berhasil diupdate.');
            redirect('user/index');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id) {
        $this->db->delete('users', ['id_user' => $id]);
        $this->session->set_flashdata('success', 'Akun berhasil dihapus.');
        redirect('user/index');
    }
}
