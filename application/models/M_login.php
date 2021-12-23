<?php
if (!defined('BASEPATH')) exit('No direct script acess allowed');

class M_Login extends CI_Model
{

  function GET_LOGIN($user, $pass)
  {
    $row = $this->db->query("SELECT * FROM tbl_login WHERE user ='$user' AND pass = '$pass'");
    return $row;
  }

  function insertTable($table_name, $data)
  {
    $tambah = $this->db->insert($table_name, $data);
    return $tambah;
  }

  public function buat_kode($table_name, $kodeawal, $idkode, $orderbylimit)
  {
    // ('tbl_login', 'AG', 'id_login', 'ORDER BY id_login DESC LIMIT 1');
    $query = $this->db->query("select * from $table_name $orderbylimit"); // cek dulu apakah ada sudah ada kode di tabel.

    if ($query->num_rows() > 0) {
      //jika kode ternyata sudah ada.
      $hasil = $query->row();
      $kd = $hasil->$idkode;
      $cd = $kd;
      $nomor = $query->num_rows();
      $kode = $cd + 1;
      $kodejadi = $kodeawal . "00" . $kode;    // hasilnya CUS-0001 dst.
      $kdj = $kodejadi;
    } else {
      //jika kode belum ada
      $kode = 0 + 1;
      $kodejadi = $kodeawal . "00" . $kode;    // hasilnya CUS-0001 dst.
      $kdj = $kodejadi;
    }
    return $kdj;
  }
}
