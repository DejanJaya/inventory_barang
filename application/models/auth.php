<?php
class Auth extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function register($id, $nama, $username,  $email, $no_telp, $role, $password)
    {
        $data_user = array(
            'id_user' => $id,
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'no_telp' => $no_telp,
            'role' => $role,
            'password' => password_hash($password, PASSWORD_DEFAULT)

        );
        $this->db->insert('user', $data_user);
    }

    function login_user($email, $password)
    {
        $query = $this->db->get_where('user', array('email' => $email));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('nama', $data_user->nama);
                $this->session->set_userdata('role', $data_user->role);
                $this->session->set_userdata('id_user', $data_user->id_user);
                $this->session->set_userdata('username', $data_user->username);
                $this->session->set_userdata('is_login', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function cek_login()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('login');
        }
    }
}
