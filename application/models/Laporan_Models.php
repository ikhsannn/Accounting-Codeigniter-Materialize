<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Models extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function Neraca($where = NULL){

        $this->db->select('jurnal.tanggal, jurnal.kode_akun, SUM(debit) as debit, SUM(kredit) as kredit, akun.nama_akun')
            ->like('jurnal.kode_akun', '1', 'front')
            ->or_like('jurnal.kode_akun', '2', 'front')
            ->group_by('jurnal.kode_akun')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');
        
        if($where !== NULL) {
            $this->db->where($where);
        }

        return $this->db->get()->result_array();
        
    }

    public function BukuBesar($where = NULL){
        $header = $this->db->select('kode_akun');
        if($where !== NULL)
            $header = $header->where($where);
        $header = $header->group_by('kode_akun');
        $header = $header->from('jurnal');
        $header = $header->get()->result_array();

        $data = [];
        foreach ($header as $kode) {
            $where['jurnal.kode_akun'] =  $kode['kode_akun'];
            $data[$kode['kode_akun']] = $this->db->where($where)
                ->from('jurnal')
                ->join('akun', 'jurnal.kode_akun = akun.kode_akun')
                ->get()
                ->result_array();
        }

        return $data ? $data : NULL;
    }

    public function Jurnal($where = NULL)
    {
        $header = $this->db->select('nomor_transaksi');
        if ($where !== NULL)
            $header = $header->where($where);
        $header = $header->group_by('nomor_transaksi');
        $header = $header->from('jurnal');
        $header = $header->get()->result_array();

        $data = [];
        foreach ($header as $kode) {
            
            $where['jurnal.nomor_transaksi'] = $kode['nomor_transaksi'];
            $data[$kode['nomor_transaksi']] = $this->db->where($where)
                ->select('akun.*, jurnal.tanggal, jurnal.nomor_transaksi, jurnal.keterangan, SUM(debit) as debit, SUM(kredit) as kredit')
                ->from('jurnal')
                ->group_by('kode_akun')
                ->join('akun', 'jurnal.kode_akun = akun.kode_akun')
                ->get()
                ->result_array();
        }

        // print_r($data); die();
        return $data ? $data : NULL;
    }

    public function TrialBalance($where = NULL) {
        //--------------  AKTIVA ----------------------
        $aktiva = $this->db->select('jurnal.tanggal, jurnal.kode_akun, SUM(debit) as debit, SUM(kredit) as kredit, akun.nama_akun, 0 as saldo_awal_debit, 0 as saldo_awal_kredit')
            ->like('jurnal.kode_akun', '1', 'front')
            ->group_by('jurnal.kode_akun')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');
        if ($where !== NULL) {
            $aktiva->where($where);
        }

        $aktiva = $aktiva->get()->result_array();
        
        if($where !== NULL) {
            $saldo_aktiva = $this->db->select('SUM(debit) as debit, SUM(kredit) as kredit')
            ->group_by('kode_akun')
            ->get_where('jurnal', ['tanggal <' => $where['tanggal >=']])->result_array();

            if($aktiva) {
                for ($i = 0; $i < count($saldo_aktiva); $i++) {
                    $aktiva[$i]['saldo_awal_debit'] = $saldo_aktiva[$i]['debit'];
                    $aktiva[$i]['saldo_awal_kredit'] = $saldo_aktiva[$i]['kredit'];
                }
            }
        }
        
        $data['aktiva'] = $aktiva ? $aktiva : NULL;
        //--------------  AKTIVA ----------------------

        //--------------  KEWAJIBAN ----------------------
        $kewajiban = $this->db->select('jurnal.tanggal, jurnal.kode_akun, SUM(debit) as debit, SUM(kredit) as kredit, akun.nama_akun, 0 as saldo_awal_debit, 0 as saldo_awal_kredit')
            ->like('jurnal.kode_akun', '21', 'front')
            ->group_by('jurnal.kode_akun')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');
        if ($where !== NULL) {
            $kewajiban->where($where);
        }

        $kewajiban = $kewajiban->get()->result_array();

        if ($where !== NULL) {
            $saldo_kewajiban = $this->db->select('SUM(debit) as debit, SUM(kredit) as kredit')
                ->group_by('kode_akun')
                ->get_where('jurnal', ['tanggal <' => $where['tanggal >=']])->result_array();

            if ($kewajiban) {
                for ($i = 0; $i < count($saldo_kewajiban); $i++) {
                    $kewajiban[$i]['saldo_awal_debit'] = $saldo_kewajiban[$i]['debit'];
                    $kewajiban[$i]['saldo_awal_kredit'] = $saldo_kewajiban[$i]['kredit'];
                }
            }
        }
        

        $data['kewajiban'] = $kewajiban ? $kewajiban : NULL;

        //--------------  KEWAJIBAN ----------------------

        //--------------  EKUITAS ----------------------
        $ekuitas = $this->db->select('jurnal.tanggal, jurnal.kode_akun, SUM(debit) as debit, SUM(kredit) as kredit, akun.nama_akun, 0 as saldo_awal_debit, 0 as saldo_awal_kredit')
            ->like('jurnal.kode_akun', '22', 'front')
            ->group_by('jurnal.kode_akun')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');
        if ($where !== NULL) {
            $ekuitas->where($where);
        }

        $ekuitas = $ekuitas->get()->result_array();

        if ($where !== NULL) {
            $saldo_ekuitas = $this->db->select('SUM(debit) as debit, SUM(kredit) as kredit')
                ->group_by('kode_akun')
                ->get_where('jurnal', ['tanggal <' => $where['tanggal >=']])->result_array();

            if ($ekuitas) {
                for ($i = 0; $i < count($saldo_ekuitas); $i++) {
                    $ekuitas[$i]['saldo_awal_debit'] = $saldo_ekuitas[$i]['debit'];
                    $ekuitas[$i]['saldo_awal_kredit'] = $saldo_ekuitas[$i]['kredit'];
                }
            }
        }

        $data['ekuitas'] = $ekuitas ? $ekuitas : NULL;

        //--------------  EKUITAS ----------------------

        //--------------  PENERIMAAN ----------------------
        $penerimaan = $this->db->select('jurnal.tanggal, jurnal.kode_akun, SUM(debit) as debit, SUM(kredit) as kredit, akun.nama_akun, 0 as saldo_awal_debit, 0 as saldo_awal_kredit')
            ->like('jurnal.kode_akun', '4', 'front')
            ->group_by('jurnal.kode_akun')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');
        if ($where !== NULL) {
            $penerimaan->where($where);
        }

        $penerimaan = $penerimaan->get()->result_array();

        if ($where !== NULL) {
            $saldo_penerimaan = $this->db->select('SUM(debit) as debit, SUM(kredit) as kredit')
                ->group_by('kode_akun')
                ->get_where('jurnal', ['tanggal <' => $where['tanggal >=']])->result_array();

            if ($penerimaan) {
                for ($i = 0; $i < count($saldo_penerimaan); $i++) {
                    $penerimaan[$i]['saldo_awal_debit'] = $saldo_penerimaan[$i]['debit'];
                    $penerimaan[$i]['saldo_awal_kredit'] = $saldo_penerimaan[$i]['kredit'];
                }
            }
        }
        $data['penerimaan'] = $penerimaan ? $penerimaan : NULL;

        //--------------  PENERIMAAN ----------------------

        //--------------  PENGELUARAN ----------------------
        $pengeluaran = $this->db->select('jurnal.tanggal, jurnal.kode_akun, SUM(debit) as debit, SUM(kredit) as kredit, akun.nama_akun, 0 as saldo_awal_debit, 0 as saldo_awal_kredit')
            ->like('jurnal.kode_akun', '5', 'front')
            ->group_by('jurnal.kode_akun')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');
        if ($where !== NULL) {
            $pengeluaran->where($where);
        }

        $pengeluaran = $pengeluaran->get()->result_array();

        if ($where !== NULL) {
            $saldo_pengeluaran = $this->db->select('SUM(debit) as debit, SUM(kredit) as kredit')
                ->group_by('kode_akun')
                ->get_where('jurnal', ['tanggal <' => $where['tanggal >=']])->result_array();

            if ($pengeluaran) {
                for ($i = 0; $i < count($saldo_pengeluaran); $i++) {
                    $pengeluaran[$i]['saldo_awal_debit'] = $saldo_pengeluaran[$i]['debit'];
                    $pengeluaran[$i]['saldo_awal_kredit'] = $saldo_pengeluaran[$i]['kredit'];
                }
            }
        }

        $data['pengeluaran'] = $pengeluaran ? $pengeluaran : NULL;
        //--------------  PENGELUARAN ----------------------

        return $data;

    }

    public function ArusKas($where = NULL)
    {
        $kas = $this->db->select('jurnal.tanggal, jurnal.kode_akun, jurnal.keterangan, jurnal.kredit, jurnal.debit, akun.nama_akun, 0 as saldo_awal_debit, 0 as saldo_awal_kredit')
            ->where('jurnal.kode_akun', '111.01.00')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');

        if ($where !== NULL) {
            $kas->where($where);
        }

        return $kas->get()->result_array();
    }

    public function LabaRugi($where = NULL)
    {
        $laba = $this->db->select('jurnal.tanggal, jurnal.kode_akun, jurnal.keterangan, jurnal.debit , jurnal.kredit, akun.nama_akun, 0 as saldo_awal_debit, 0 as saldo_awal_kredit')
            ->like('jurnal.kode_akun', '4', 'front')
            ->or_like('jurnal.kode_akun', '5', 'front')
            ->join('akun', 'akun.kode_akun = jurnal.kode_akun', 'LEFT')
            ->from('jurnal');

        if ($where !== NULL) {
            $laba->where($where);
        }

        return $laba->get()->result_array();
    }


}

    