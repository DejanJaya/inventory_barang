<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->auth->cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function perhitungan_eoq()
    {
        // $data['title'] = "Barang";
        $data['barang'] = $this->admin->getBarang();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perhitungan/perhitungan_eoq', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_perhitungan($id_barang)
    {
        $data['barang'] = $this->admin->get('barang', ['id_barang' => $id_barang]);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perhitungan/lihatperhitungan_eoq', $data);
        $this->load->view('templates/footer');
    }

    public function printlaporan()
    {
        // $data['skck'] = $this->M_surat_aparat->surat_pengantar_skck($id);
        // $data['ktp'] = $this->M_surat_aparat->surat_permohonan_ktp($id);
        // $data['kk'] = $this->M_surat_aparat->surat_permohonan_kk($id);
        // $data['domisili'] = $this->M_surat_aparat->surat_keterangan_domisili($id);
        // $data['kelahiran'] = $this->M_surat_aparat->surat_keterangan_kelahiran($id);
        // $data['kematian'] = $this->M_surat_aparat->surat_keterangan_kematian($id);
        // $data['tidakmampu'] = $this->M_surat_aparat->surat_keterangan_tidakmampu($id);
        // $data['usaha'] = $this->M_surat_aparat->surat_keterangan_usaha($id);

        $this->load->library('pdf');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-eoq.pdf";
        $this->pdf->load_view('perhitungan/laporan_eoq');
    }
}
