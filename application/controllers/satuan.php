<?php

class Satuan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();

        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');
    }

    function satuan_barang()
    {
        // $data['title'] = "satuan";
        $data['satuan'] = $this->admin->get('satuan');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/satuan_barang', $data);
        $this->load->view('templates/footer');
    }

    function tambah_satuan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/satuan/add');
        $this->load->view('templates/footer');
    }

    function proses_add()
    {
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim', ['required' => 'Nama satuan harus diisi']);


        if ($this->form_validation->run() == true) {
            $data['title'] = "Satuan";
            $data = [
                'nama_satuan'          => $this->input->post('nama_satuan')
            ];
            $save = $this->admin->insert('satuan', $data);
            if ($save) {
                echo "<script>";
                echo "alert('Data berhasil ditambah')";
                echo "</script>";
                redirect(base_url('satuan/satuan_barang'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal ditambah')";
                echo "</script>";
                redirect(base_url('satuan/tambah_satuan'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('satuan/tambah_satuan');
        }
    }

    function edit_satuan($id_satuan)
    {
        $where = [
            'id_satuan' => $id_satuan,
        ];
        $satuan = $this->admin->tampilSatu('satuan', $where)->row();
        $data = [
            "satuan" => $satuan,
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/satuan/edit', $data);
        $this->load->view('templates/footer');
    }
    function proses_edit()
    {
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required|trim', ['required' => 'Nama satuan harus diisi']);
        $id_satuan       = $this->input->post('id_satuan');
        if ($this->form_validation->run() == true) {
            $data['title'] = "Satuan";
            $data = [
                'nama_satuan'          => $this->input->post('nama_satuan')
            ];
            $where = [
                'id_satuan'    =>  $id_satuan
            ];
            $ubah = $this->admin->ubah('satuan', $data, $where);
            if ($ubah) {
                echo "<script>";
                echo "alert('Data berhasil di ubah')";
                echo "</script>";
                redirect(base_url('satuan/satuan_barang'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal di ubah')";
                echo "</script>";
                redirect(base_url('satuan/edit_satuan'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('satuan/edit_satuan');
        }
    }

    public function delete($id_satuan)
    {
        $where = ['id_satuan' => $id_satuan];
        $this->admin->delete($where, 'satuan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        redirect('satuan/satuan_barang');
    }
}
