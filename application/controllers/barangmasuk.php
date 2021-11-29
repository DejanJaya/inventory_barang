<?php

class Barangmasuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();
        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    function barang_masuk()
    {
        $data['barangmasuk'] = $this->admin->getBarangMasuk();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    function tambah_barang_masuk()
    {
        $data['title'] = "Barang Masuk";
        $data['supplier'] = $this->admin->get('supplier');
        $data['barang'] = $this->admin->get('barang');

        // Mendapatkan dan men-generate kode transaksi barang masuk
        $kode = 'T-BM-' . date('ymd');
        $kode_terakhir = $this->admin->getMax('barang_masuk', 'id_barang_masuk', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        $data['id_barang_masuk'] = $kode . $number;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/barang_masuk/add', $data);
        $this->load->view('templates/footer');
    }

    function proses_add()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required|trim|numeric|greater_than[0]');

        if ($this->form_validation->run() == true) {
            $data = [
                'id_barang_masuk' => $this->input->post('id_barang_masuk'),
                'user_id' => $this->input->post('user_id'),
                'tanggal_masuk'         => $this->input->post('tanggal_masuk'),
                'supplier_id'          => $this->input->post('supplier_id'),
                'barang_id'        => $this->input->post('barang_id'),
                'jumlah_masuk'          => $this->input->post('jumlah_masuk')
            ];
            $save = $this->admin->insert('barang_masuk', $data);
            if ($save) {
                echo "<script>";
                echo "alert('Data berhasil ditambah')";
                echo "</script>";
                redirect(base_url('barangmasuk/barang_masuk'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal ditambah')";
                echo "</script>";
                redirect(base_url('barangmasuk/tambah_barang_masuk'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('barangmasuk/tambah_barang_masuk');
        }
    }
    public function delete($id_barang_masuk)
    {
        $where = ['id_barang_masuk' => $id_barang_masuk];
        $this->admin->delete($where, 'barang_masuk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        redirect('barangmasuk/barang_masuk');
    }
}
