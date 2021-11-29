<?php

class Barangkeluar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    function barang_keluar()
    {
        $data['barangkeluar'] = $this->admin->getBarangkeluar();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/barang_keluar', $data);
        $this->load->view('templates/footer');
    }

    function tambah_barang_keluar()
    {
        $data['barang'] = $this->admin->get('barang', null, ['stok >' => 0]);

        // Mendapatkan dan men-generate kode transaksi barang keluar
        $kode = 'T-BK-' . date('ymd');
        $kode_terakhir = $this->admin->getMax('barang_keluar', 'id_barang_keluar', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        $data['id_barang_keluar'] = $kode . $number;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/barang_keluar/add', $data);
        $this->load->view('templates/footer');
    }

    function proses_add()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');

        $input = $this->input->post('barang_id', true);
        $stok = $this->admin->get('barang', ['id_barang' => $input])['stok'];
        $stok_valid = $stok + 1;

        $this->form_validation->set_rules(
            'jumlah_keluar',
            'Jumlah Keluar',
            "required|trim|numeric|greater_than[0]|less_than[{$stok_valid}]",
            [
                'less_than' => "Jumlah Keluar tidak boleh lebih dari {$stok}"
            ]
        );

        if ($this->form_validation->run() == true) {
            $data = [
                'id_barang_keluar' => $this->input->post('id_barang_keluar'),
                'user_id' => $this->input->post('user_id'),
                'tanggal_keluar'         => $this->input->post('tanggal_keluar'),
                'barang_id'        => $this->input->post('barang_id'),
                'jumlah_keluar'          => $this->input->post('jumlah_keluar')
            ];
            $save = $this->admin->insert('barang_keluar', $data);
            if ($save) {
                echo "<script>";
                echo "alert('Data berhasil ditambah')";
                echo "</script>";
                redirect(base_url('barangkeluar/barang_keluar'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal ditambah')";
                echo "</script>";
                redirect(base_url('barangkeluar/tambah_barang_keluar'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('barangkeluar/tambah_barang_keluar');
        }
    }

    public function delete($id_barang_keluar)
    {
        $where = ['id_barang_keluar' => $id_barang_keluar];
        $this->admin->delete($where, 'barang_keluar');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        redirect('barangkeluar/barang_keluar');
    }
}
