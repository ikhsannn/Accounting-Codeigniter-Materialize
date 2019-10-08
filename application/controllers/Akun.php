<?php

class Akun extends CI_Controller{



    public function index() {
        $data['akun'] = $this->Akun_Models->get();
        $data['title'] = 'Akun';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('front/akun/index');
        $this->load->view('template/footer');
    }

    public function tambah() {
        $data['title'] = 'Akun';

        $this->form_validation->set_rules('kode_akun', 'Kode Akun', 'required|max_length[9]');
        $this->form_validation->set_rules('induk_akun', 'Kode Akun', 'max_length[9]');
        $this->form_validation->set_rules('tipe_akun', 'Tipe Akun', 'required');
        $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');

        if($this->form_validation->run() === FALSE){

            $data['tipe_akun'] = [];
            foreach($this->Akun_Models->get_tipe() as $option){
                $data['tipe_akun'] += [
                        $option['id'] => $option['nama_tipe'],
                ];
            }

            $data['induk_akun'] = ['' => 'Tidak ada'];
            foreach ($this->Akun_Models->get() as $option) {
                $data['induk_akun'] += [
                    $option['kode_akun'] => $option['nama_akun'],
                ];
            }

            $data['kode_akun'] = [
                'name' => 'kode_akun',
                'id' => 'kode_akun',
                'type' => 'text',
                'placeholder' => 'Contoh : 900.00.00'

            ];

            $data['nama_akun'] = [
                'name' => 'nama_akun',
                'id' => 'nama_akun',
                'type' => 'text',
                'placeholder' => 'Contoh : Kas & Bank'

            ];

            $data['deskripsi'] = [
                'name' => 'deskripsi',
                'id' => 'deskripsi',
                'class' => 'materialize-textarea',
                'placeholder' => 'Contoh : Induk'

            ];

            $data['saldo_awal'] = [
                'name' => 'saldo_awal',
                'id' => 'saldo_awal',
                'type' => 'number',
                'placeholder' => 'Contoh : 500000000'
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('front/akun/tambah');
            $this->load->view('template/footer');
        }
        else {
            $form = [
                'kode_akun'     => $this->input->post('kode_akun'),
                'nama_akun'     => $this->input->post('nama_akun'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'tipe_akun'     => $this->input->post('tipe_akun'),
                'saldo_awal'    => $this->input->post('saldo_awal'),
                'induk_akun'    => $this->input->post('induk_akun')
            ];

            $this->Akun_Models->tambah($form);
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('akun');
        }
    }

    function hapus($kode_akun){
        $this->Akun_Models->hapus($kode_akun);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('akun');
    }

    function edit($kode_akun){
        $data['title'] = 'Akun';

        $this->form_validation->set_rules('kode_akun', 'Kode Akun', 'required|max_length[9]');
        $this->form_validation->set_rules('induk_akun', 'Kode Akun', 'max_length[9]');
        $this->form_validation->set_rules('tipe_akun', 'Tipe Akun', 'required');
        $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['tipe_akun'] = [];
            foreach ($this->Akun_Models->get_tipe() as $option) {
                $data['tipe_akun'] += [
                    $option['id'] => $option['nama_tipe'],
                ];
            }

            $data['induk_akun'] = ['' => 'Tidak ada'];
            foreach ($this->Akun_Models->get() as $option) {
                $data['induk_akun'] += [
                    $option['kode_akun'] => $option['nama_akun'],
                ];
            }
            $akun = $this->Akun_Models->getAkunById($kode_akun);

            $data['kode_akun'] = [
                'name' => 'kode_akun',
                'id' => 'kode_akun',
                'type' => 'text',
                'placeholder' => 'Contoh : 900.00.00',
                'value' => $akun['kode_akun']
            ];

            $data['nama_akun'] = [
                'name' => 'nama_akun',
                'id' => 'nama_akun',
                'type' => 'text',
                'placeholder' => 'Contoh : Kas & Bank',
                'value' => $akun['nama_akun']
            ];

            $data['deskripsi'] = [
                'name' => 'deskripsi',
                'id' => 'deskripsi',
                'class' => 'materialize-textarea',
                'placeholder' => 'Contoh : Induk',
                'value' => $akun['deskripsi']

            ];

            $data['saldo_awal'] = [
                'name' => 'saldo_awal',
                'id' => 'saldo_awal',
                'type' => 'number',
                'placeholder' => 'Contoh : 500000000',
                'value' => $akun['saldo_awal']
            ];

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('front/akun/edit');
            $this->load->view('template/footer');
        }else {
            $form = [
                'kode_akun'     => $this->input->post('kode_akun'),
                'nama_akun'     => $this->input->post('nama_akun'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'tipe_akun'     => $this->input->post('tipe_akun'),
                'saldo_awal'    => $this->input->post('saldo_awal'),
                'induk_akun'    => $this->input->post('induk_akun')
            ];

            $this->Akun_Models->edit($form, $kode_akun);
            $this->session->set_flashdata('flashdata', 'diedit');
            redirect('akun');
        }
    }


}