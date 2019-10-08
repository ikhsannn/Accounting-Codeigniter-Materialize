<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

    public function index()
    {
        $data['jurnal'] = $this->Jurnal_Models->getJurnal()  ? $this->Jurnal_Models->getJurnal() : NULL;

        $data['title'] = 'Jurnal Umum';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('front/pembelian/index');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Jurnal Umum';
        $this->form_validation->set_rules('tanggal[]', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_transaksi[]', 'Nomor Transaksi', 'required');
        $this->form_validation->set_rules('keterangan[]', 'Keterangan', 'required');
        $this->form_validation->set_rules('kode_akun[]', 'Kode Akun', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $data['akun'] = $this->Akun_Models->get();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('front/pembelian/buat', $data);
            $this->load->view('template/footer');
        }
        else {
            $input_data = [
                'tanggal' => $this->input->post('tanggal'),
                'nomor_transaksi' => $this->input->post('no_transaksi'),
                'keterangan' => $this->input->post('keterangan'),
                'kode_akun' => $this->input->post('kode_akun'),
                'debit' => $this->input->post('debit'),
                'kredit' => $this->input->post('kredit')
            ];

            $debit = array_sum($this->input->post('debit'));
            $kredit = array_sum($this->input->post('kredit'));

            if ($debit == $kredit) {
                $this->Jurnal_Models->createJurnal($input_data);
                $this->session->set_flashdata('flashdata', 'ditambahkan');
                redirect('jurnal');
            }else {
                $this->session->set_flashdata('flashdata', 'tidak balance');
                redirect('jurnal/tambah');                
            }

            
        }
    }

    public function edit()
    {
        $data['title'] = 'Jurnal Umum';
        $this->form_validation->set_rules('keterangan[]', 'Keterangan', 'required');
        $this->form_validation->set_rules('kode_akun[]', 'Kode Akun', 'required');
        $where = ['nomor_transaksi' => $this->uri->segment(3)];
        if ($this->form_validation->run() === FALSE) {
            $data['akun'] = $this->Akun_Models->get();
            $data['jurnal'] = $this->Jurnal_Models->getJurnal($where);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('front/pembelian/ubah', $data);
            $this->load->view('template/footer');
        } else {
            $input_data = [
                'id_jurnal' => $this->input->post('id_jurnal'),
                'tanggal' => $this->input->post('tanggal'),
                'nomor_transaksi' => $this->input->post('no_transaksi'),
                'keterangan' => $this->input->post('keterangan'),
                'kode_akun' => $this->input->post('kode_akun'),
                'debit' => $this->input->post('debit'),
                'kredit' => $this->input->post('kredit')
            ];
            $debit = array_sum($this->input->post('debit'));
            $kredit = array_sum($this->input->post('kredit'));

            if ($debit == $kredit) {
                $this->Jurnal_Models->updateJurnal($input_data);
                $this->session->set_flashdata('flashdata', 'diedit');
                redirect('jurnal');
            } else {
                $jurnal = $this->Jurnal_Models->getJurnal($where);
                foreach ($jurnal as $row) {
                    $this->session->set_flashdata('flashdata', 'tidak balance');
                    redirect('jurnal/edit/'.$row['nomor_transaksi']);
                }
            }
        }
    }
}
