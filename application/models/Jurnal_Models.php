<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_Models extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    public function createJurnal($detail) {
        $this->db->trans_start();
        for($i = 0; $i < count($detail['nomor_transaksi']); $i++){
            $data = [
                'tanggal' => $detail['tanggal'][$i],
                'nomor_transaksi' => $detail['nomor_transaksi'][$i],
                'keterangan' => $detail['keterangan'][$i],
                'kode_akun' => $detail['kode_akun'][$i],
                'debit' => $detail['debit'][$i],
                'kredit' => $detail['kredit'][$i],
            ];
            $this->db->insert('jurnal', $data);
        }
        $this->db->trans_complete();
        return $this->db->affected_rows();
    }

    function updateJurnal($detail){
        $this->db->trans_start();
        for ($i = 0; $i < count($detail['nomor_transaksi']); $i++) {
            $data = [
                'tanggal' => $detail['tanggal'][$i],
                'nomor_transaksi' => $detail['nomor_transaksi'][$i],
                'keterangan' => $detail['keterangan'][$i],
                'kode_akun' => $detail['kode_akun'][$i],
                'debit' => $detail['debit'][$i],
                'kredit' => $detail['kredit'][$i],
            ];
            $where = ['id_jurnal' => $detail['id_jurnal'][$i], 'nomor_transaksi' => $detail['nomor_transaksi'][$i]];
            $this->db->update('jurnal', $data, $where);
        }
        $this->db->trans_complete();
        return $this->db->affected_rows();
    }

    public function getJurnal($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
        $this->db->select('*');
        $this->db->from('jurnal');
        $this->db->join('akun', 'akun.kode_akun = jurnal.kode_akun');
        return $this->db->get()->result_array();
    }


} 