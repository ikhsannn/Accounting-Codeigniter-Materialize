<?php

class Akun_Models extends CI_Model
{

    function get($where = NULL)
    {
        if($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select('akun.*, tipe_akun.nama_tipe');
        $this->db->join('tipe_akun', 'akun.tipe_akun = tipe_akun.id');
        return $this->db->get('akun')->result_array();
    }

    function get_tipe($where = NULL)
    {
        if($where !== NULL) {
            $this->db->where($where);
        }
        return $this->db->get('tipe_akun')->result_array();
    }

    function getAkunById($kode_akun){
        return $this->db->get_where('akun', ['kode_akun' => $kode_akun])->row_array();
    }

    function tambah($data)
    {
        $this->db->insert('akun', $data);
    }

    function hapus($kode_akun)
    {
        $this->db->delete('akun', ['kode_akun' => $kode_akun]);
    }

    function edit($form, $kode_akun)
    {
        $this->db->update('akun', $form,  ['kode_akun' => $kode_akun]);
    }

    public function getLike($where, $like)
    {
        return $this->db->query("SELECT * FROM akun WHERE $where LIKE '$like'")->result_array();
    }
}
