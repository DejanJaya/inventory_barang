<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    function data_barang()
    {
        $data['title'] = "Barang";
        $data['barang'] = $this->admin->getBarang();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/data_barang', $data);
        $this->load->view('templates/footer');
    }

    function tambah_barang()
    {
        $data['title'] = "Barang";
        $data['jenis'] = $this->admin->get('jenis');
        $data['satuan'] = $this->admin->get('satuan');

        // Mengenerate ID Barang
        $kode_terakhir = $this->admin->getMax('barang', 'id_barang');
        $kode_tambah = substr($kode_terakhir, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $data['id_barang'] = 'B' . $number;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/data_barang/add', $data);
        $this->load->view('templates/footer');
    }

    function proses_add()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', ['required' => 'Nama barang harus diisi']);
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');



        if ($this->form_validation->run() == true) {
            // $data['id_barang'] = 'B' . $number;
            $data = [
                'id_barang'         => $this->input->post('id_barang'),
                'nama_barang'          => $this->input->post('nama_barang'),
                'jenis_id'          => $this->input->post('jenis_id'),
                'satuan_id'        => $this->input->post('satuan_id')
            ];
            $save = $this->admin->insert('barang', $data);
            if ($save) {
                echo "<script>";
                echo "alert('Data berhasil ditambah')";
                echo "</script>";
                redirect(base_url('barang/data_barang'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal ditambah')";
                echo "</script>";
                redirect(base_url('barang/tambah_barang'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('barang/tambah_barang');
        }
    }

    function edit($id_barang)
    {
        $data['jenis'] = $this->admin->get('jenis');
        $data['satuan'] = $this->admin->get('satuan');
        $data['barang'] = $this->admin->get('barang', ['id_barang' => $id_barang]);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('barang/data_barang/edit', $data);
        $this->load->view('templates/footer');
    }

    function proses_edit()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', ['required' => 'Nama barang harus diisi']);
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');
        $id_barang       = $this->input->post('id_barang');
        if ($this->form_validation->run() == true) {
            $data['title'] = "Barang";
            $data = [
                'nama_barang'      => $this->input->post('nama_barang'),
                'jenis_id'         => $this->input->post('jenis_id'),
                'satuan_id'        => $this->input->post('satuan_id')
            ];
            $where = [
                'id_barang'    =>  $id_barang
            ];
            $ubah = $this->admin->ubah('barang', $data, $where);
            if ($ubah) {
                echo "<script>";
                echo "alert('Data berhasil di ubah')";
                echo "</script>";
                redirect(base_url('barang/data_barang'), 'refresh');
            } else {
                echo "<script>";
                echo "alert('Data gagal di ubah')";
                echo "</script>";
                redirect(base_url('barang/edit'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('barang/edit');
        }
    }

    public function delete($id_barang)
    {
        $where = ['id_barang' => $id_barang];
        $this->admin->delete($where, 'barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');
        redirect('barang/data_barang');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
