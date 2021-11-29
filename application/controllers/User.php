<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->model('auth');
        // $this->auth->cek_login();

        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['users'] = $this->admin->get('user');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    function add()
    {
        // $data['title'] = "User";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/add');
        $this->load->view('templates/footer');
    }

    function proses_add()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[255]|is_unique[user.nama]', ['is_unique' => 'Nama Anda Sudah Terdaftar']);
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username harus diisi']);
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|is_unique[user.email]', ['is_unique' => 'Email Anda Sudah Terdaftar !']);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required', ['required' => 'No Telpon harus diisi']);
        $this->form_validation->set_rules('role', 'role', 'required', ['required' => 'Role harus diisi']);
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[255]|matches[password2]', ['matches' => 'Password Kamu Tidak Cocok!']);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() == true) {
            $data['title'] = "User";
            $data = [
                'nama'          => $this->input->post('nama'),
                'username'      => $this->input->post('username'),
                'email'         => $this->input->post('email'),
                'no_telp'       => $this->input->post('no_telp'),
                'role'          => $this->input->post('role'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $save = $this->admin->insert('user', $data);
            if ($save) {
                echo "<script>";
                echo "alert('Data berhasil ditambah')";
                echo "</script>";
                redirect(base_url('user'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal ditambah')";
                echo "</script>";
                redirect(base_url('user/add'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('user/add');
        }
    }
    private function _validasi($mode)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        // if ($mode == 'add') {
        //     $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
        //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        //     $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        //     $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        // } else {
        //     $db = $this->admin->get('user', ['id_user' => $this->input->post('id_user', true)]);
        //     $username = $this->input->post('username', true);
        //     $email = $this->input->post('email', true);

        //     $uniq_username = $db['username'] == $username ? '' : '|is_unique[user.username]';
        //     $uniq_email = $db['email'] == $email ? '' : '|is_unique[user.email]';

        //     $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric' . $uniq_username);
        //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' . $uniq_email);
        // }
    }
    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit User";
            $data['user'] = $this->admin->get('user', ['id_user' => $id]);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'nama'          => $input['nama'],
                'username'      => $input['username'],
                'email'         => $input['email'],
                'no_telp'       => $input['no_telp'],
                'role'          => $input['role']
            ];

            if ($this->admin->update('user', 'id_user', $id, $input_data)) {
                echo "<script>";
                echo "alert('Data berhasil di ubah')";
                echo "</script>";
                redirect('user');
            } else {
                echo "<script>";
                echo "alert('Data gagal di ubah')";
                echo "</script>";
                // set_pesan('data gagal diubah.', false);
                redirect('user/edit/' . $id);
            }
        }
    }


    // public function edit($id_user)
    // {
    //     $where = [
    //         'id_user' => $id_user,
    //     ];
    //     $user = $this->admin->tampilSatu('user', $where)->row();
    //     $data = [
    //         "user" => $user,
    //     ];
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('user/edit', $data);
    //     $this->load->view('templates/footer');
    // }

    // function proses_edit()
    // {

    //     $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[255]|is_unique[user.nama]', ['is_unique' => 'Nama Anda Sudah Terdaftar']);
    //     $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username harus diisi']);
    //     $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|is_unique[user.email]', ['is_unique' => 'Email Anda Sudah Terdaftar !']);
    //     $this->form_validation->set_rules('no_telp', 'no_telp', 'required', ['required' => 'No Telpon harus diisi']);
    //     $this->form_validation->set_rules('role', 'role', 'required', ['required' => 'Role harus diisi']);

    //     $id_user = $this->input->post('id_user');
    //     if ($this->form_validation->run() == true) {
    //         // $data['title'] = "User";
    //         $data = [
    //             'nama'          => $this->input->post('nama'),
    //             'username'      => $this->input->post('username'),
    //             'email'         => $this->input->post('email'),
    //             'no_telp'       => $this->input->post('no_telp'),
    //             'role'          => $this->input->post('role')
    //         ];
    //         $where = [
    //             'id_user'    =>  $id_user
    //         ];
    //         $ubah = $this->admin->update('user', 'id_user', $id_user,);
    //         if ($ubah) {
    //             echo "<script>";
    //             echo "alert('Data berhasil di ubah')";
    //             echo "</script>";
    //             redirect(base_url('user'), 'refresh');
    //         } else {
    //             echo "<script>";
    //             echo "alert('Data gagal di ubah')";
    //             echo "</script>";
    //             redirect(base_url('user/edit' . $id_user), 'refresh');
    //         }
    //     } else {
    //         $this->session->set_flashdata('error', validation_errors());
    //         redirect('user/edit' . $id_user);
    //     }
    // }

    public function delete($id_user)
    {
        $where = ['id_user' => $id_user];
        $this->admin->delete($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        redirect('user');
    }
}
