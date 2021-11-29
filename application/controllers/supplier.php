<?php

class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();

        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['title'] = "Supplier";
        $data['supplier'] = $this->admin->get('supplier');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    // private function _validasi()
    // {
    //     $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim', ['required' => 'Nama supplier harus diisi']);
    //     $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|is_numeric', ['required' => 'Nomor Telepon harus diisi', 'is_numeric' => 'No Telepon harus berupa angka']);
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi']);
    // }

    function add()
    {
        $data['title'] = "Supplier";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supplier/add', $data);
        $this->load->view('templates/footer');
    }

    function proses_add()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim', ['required' => 'Nama supplier harus diisi']);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|is_numeric', ['required' => 'Nomor Telepon harus diisi', 'is_numeric' => 'No Telepon harus berupa angka']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi']);

        if ($this->form_validation->run() == true) {
            $data['title'] = "Supplier";
            $data = [
                'nama_supplier'          => $this->input->post('nama_supplier'),
                'no_telp'          => $this->input->post('no_telp'),
                'alamat'        => $this->input->post('alamat')
            ];
            $save = $this->admin->insert('supplier', $data);
            if ($save) {
                echo "<script>";
                echo "alert('Data berhasil ditambah')";
                echo "</script>";
                redirect(base_url('supplier'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal ditambah')";
                echo "</script>";
                redirect(base_url('supplier/add'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('supplier/add');
        }
    }

    function edit($id_supplier)
    {
        $where = [
            'id_supplier' => $id_supplier,
        ];
        $supplier = $this->admin->tampilSatu('supplier', $where)->row();
        $data = [
            "supplier" => $supplier,
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('supplier/edit', $data);
        $this->load->view('templates/footer');
    }

    function proses_edit()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim', ['required' => 'Nama supplier harus diisi']);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|is_numeric', ['required' => 'Nomor Telepon harus diisi', 'is_numeric' => 'No Telepon harus berupa angka']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi']);
        $id_supplier       = $this->input->post('id_supplier');
        if ($this->form_validation->run() == true) {
            $data['title'] = "Supplier";
            $data = [
                'nama_supplier'          => $this->input->post('nama_supplier'),
                'no_telp'          => $this->input->post('no_telp'),
                'alamat'        => $this->input->post('alamat')
            ];
            $where = [
                'id_supplier'    =>  $id_supplier
            ];
            $ubah = $this->admin->ubah('supplier', $data, $where);
            if ($ubah) {
                echo "<script>";
                echo "alert('Data berhasil di ubah')";
                echo "</script>";
                redirect(base_url('supplier'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal di ubah')";
                echo "</script>";
                redirect(base_url('supplier/edit'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('supplier/edit');
        }
    }

    public function delete($id_supplier)
    {
        $where = ['id_supplier' => $id_supplier];
        $this->admin->delete($where, 'supplier');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        redirect('supplier');
    }
}
