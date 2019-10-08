<?php

use Dompdf\Dompdf;
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function index()
    {
        
        $data['title'] = 'Laporan';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('front/laporan/index');
        $this->load->view('template/footer');
    }

    function neraca(){

        $pretgl = $this->input->get('pretgl');
        $posttgl = $this->input->get('posttgl');

        

        if($pretgl && $posttgl){
            $data['neraca'] = $this->laporan->Neraca(['tanggal >=' => $pretgl, 'tanggal <=' => $posttgl ]);
        }
        else {
            $data['neraca'] = $this->laporan->Neraca();
        }

        if($this->input->get('ekspor') == TRUE)
        {
            $this->load->view('front/laporan/lapneraca', $data);
            
            $paper_size = 'A4';
            $orientasi = 'landscape';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientasi);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('laporan_neraca.pdf', ['Attachment' => 0]);
        }

        else {
            $data['title'] = 'Neraca';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('front/laporan/neraca');
            $this->load->view('template/footer');
        }
        
    }

    function buku_besar()
    {
        
        $pretgl = $this->input->get('pretgl');
        $posttgl = $this->input->get('posttgl');
        
        if ($pretgl && $posttgl) {
            $data['buku_besar'] = $this->laporan->BukuBesar(['tanggal >=' => $pretgl, 'tanggal <=' => $posttgl]);
        }
        else {
            $data['buku_besar'] = $this->laporan->BukuBesar();
        }

        if ($this->input->get('ekspor') == TRUE)
        {
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-petanikode.pdf";
            $this->pdf->load_view('front/laporan/lapbuku', $data);
        }
        else {
            $data['title'] = 'Buku Besar';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('front/laporan/buku_besar');
            $this->load->view('template/footer');
        }
        
        
    }

    function jurnal()
    {
        $pretgl = $this->input->get('pretgl');
        $posttgl = $this->input->get('posttgl');
        
        if ($pretgl && $posttgl) {
            $data['jurnal'] = $this->laporan->Jurnal(['tanggal >=' => $pretgl, 'tanggal <=' => $posttgl]);
        }
        else {
            $data['jurnal'] = $this->laporan->Jurnal();
        }
        $data['title'] = 'Jurnal';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('front/laporan/jurnal');
        $this->load->view('template/footer');
    }

    function trial_balance()
    {
        // $this->load->view('front/laporan/header');        
        $pretgl = $this->input->get('pretgl');
        $posttgl = $this->input->get('posttgl');

        if ($pretgl && $posttgl) {
            $data['trial_balance'] = $this->laporan->TrialBalance(['tanggal >=' => $pretgl, 'tanggal <=' => $posttgl]);
        } else {
            $data['trial_balance'] = $this->laporan->TrialBalance();
        }
        
        $data['title'] = 'Trial Balance';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('front/laporan/trial_balance');
        $this->load->view('template/footer');
    }

    function arus_kas(){
        $pretgl = $this->input->get('pretgl');
        $posttgl = $this->input->get('posttgl');

        if ($pretgl && $posttgl) {
            $data['arus_kas'] = $this->laporan->ArusKas(['tanggal >=' => $pretgl, 'tanggal <=' => $posttgl]);
        } else {
            $data['arus_kas'] = $this->laporan->ArusKas();
        }

        $data['title'] = 'Arus Kas';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('front/laporan/arus_kas');
        $this->load->view('template/footer');
    }

    function laba_rugi(){
        $pretgl = $this->input->get('pretgl');
        $posttgl = $this->input->get('posttgl');

        if ($pretgl && $posttgl) {
            $data['laba_rugi'] = $this->laporan->LabaRugi(['tanggal >=' => $pretgl, 'tanggal <=' => $posttgl]);
        } else {
            $data['laba_rugi'] = $this->laporan->LabaRugi();
        }

        $data['title'] = 'Laba Rugi';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('front/laporan/laba_rugi', $data);
        $this->load->view('template/footer');
    }
}
