<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_profile extends CI_Model {
	
	public function getProfile() {
		$sql = 'SELECT b.*, a.email AS email_login FROM user a LEFT JOIN profile b ON a.id = b.id_user WHERE a.id = ?';
		$res = $this->db->query($sql, array($this->session->userdata('id')));

		return $res->result_array();
	}

	public function update_profile($data){
		$sql = "SELECT id FROM profile WHERE id_user = ?";
		$res = $this->db->query($sql, array($this->session->id))->row_array();

		if ($res == NULL) {
			$sql2 = "INSERT INTO profile VALUES (null, ?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$res2 = $this->db->query($sql2, $data);
		} else {
			$sql2 = "UPDATE `profile` SET posisi = ?, `nama` = ?, ktp = ?, lahir = ?, kelamin = ?, agama = ?, golongan = ?, `status` = ?, alamat_ktp = ?, alamat_tinggal = ?, email = ?, telp = ?, darurat = ? WHERE id_user = ?";

			$res2 = $this->db->query($sql2, array($data['posisi'], $data['nama'], $data['ktp'], $data['lahir'], $data['kelamin'], $data['agama'], $data['golongan'], $data['status'], $data['alamat_ktp'], $data['alamat_tinggal'], $data['email'], $data['telp'], $data['darurat'], $data['id_user']));
		}
		
		return $res2;
	}
}
?>