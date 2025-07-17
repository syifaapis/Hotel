<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index() {
        $data['title'] = 'Login';
        $this->load->view('auth/login', $data);
    }

    public function login() {
        $username = $this->input->post('username');
        $password_input = $this->input->post('password'); 

        // Ambil user berdasarkan username
        $user = $this->db->get_where('users', ['username' => $username])->row();

        if ($user) {
            // Jika password di DB adalah hash
            if (password_verify($password_input, $user->password)) {
                $this->_set_login_session($user);
            } 
            // Jika password lama masih md5
            elseif (md5($password_input) === $user->password) {
                // Auto update ke password_hash
                $new_hash = password_hash($password_input, PASSWORD_DEFAULT);
                $this->db->where('id_user', $user->id_user)->update('users', ['password' => $new_hash]);

                $this->_set_login_session($user);
            } 
            else {
                $this->session->set_flashdata('error', 'Password salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Username tidak ditemukan.');
            redirect('auth');
        }
    }

    private function _set_login_session($user) {
        $this->session->set_userdata([
            'is_login'     => true,
            'level'        => $user->level,
            'id_user'      => $user->id_user,
            'nama_lengkap' => $user->nama_lengkap
        ]);

        // Redirect sesuai level
        if ($user->level == 'admin') {
            redirect('dashboard_admin');
        } elseif ($user->level == 'resepsionis') {
            redirect('dashboard_resepsionis');
        } else {
            $this->session->set_flashdata('error', 'Level pengguna tidak dikenali.');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
