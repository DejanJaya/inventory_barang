<?php

class Jenis extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();

        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');
    }


    function jenis_barang()
    {
        $data['title'] = "Jenis";
        $data['jenis'] = $this->admin->get('jenis');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/jenis_barang', $data);
        $this->load->view('templates/footer');
    }

    function tambah_jenis()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/jenis/add');
        $this->load->view('templates/footer');
    }

    function proses_add()
    {
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim', ['required' => 'Nama jenis harus diisi']);

        if ($this->form_validation->run() == true) {
            $data['title'] = "Jenis";
            $data = [
                'nama_jenis' => $this->input->post('nama_jenis'),
            ];
            $save = $this->admin->insert('jenis', $data);
            if ($save) {
                echo "<script>";
                echo "alert('Data berhasil ditambah')";
                echo "</script>";
                redirect(base_url('jenis/jenis_barang'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal ditambah')";
                echo "</script>";
                redirect(base_url('jenis/tambah_jenis'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('jenis/tambah_jenis');
        }
    }

    function edit($id_jenis)
    {
        $where = [
            'id_jenis' => $id_jenis,
        ];
        $jenis = $this->admin->tampilSatu('jenis', $where)->row();
        $data = [
            "jenis" => $jenis,
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/jenis/edit', $data);
        $this->load->view('templates/footer');
    }

    function proses_edit()
    {
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|trim', ['required' => 'Nama Jenis harus diisi']);
        $id_jenis       = $this->input->post('id_jenis');
        if ($this->form_validation->run() == true) {
            $data['title'] = "jenis";
            $data = [
                'nama_jenis'          => $this->input->post('nama_jenis')
            ];
            $where = [
                'id_jenis'    =>  $id_jenis
            ];
            $ubah = $this->admin->ubah('jenis', $data, $where);
            if ($ubah) {
                echo "<script>";
                echo "alert('Data berhasil di ubah')";
                echo "</script>";
                redirect(base_url('jenis/jenis_barang'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal di ubah')";
                echo "</script>";
                redirect(base_url('jenis/edit'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('jenis/edit');
        }
    }

    public function delete($id_jenis)
    {
        $where = ['id_jenis' => $id_jenis];
        $this->admin->delete($where, 'jenis');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        redirect('jenis/jenis_barang');
    }
}
