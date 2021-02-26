<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_training extends CI_Model {
	
	public function getTraining() {
		$sql = 'SELECT * FROM pelatihan WHERE id_user = ?';
		$res = $this->db->query($sql, array($this->session->userdata('id')));

		$data = array();

		foreach ($res->result() as $row) {
			$data['id'][] = $row->id;
			$data['nama'][] = $row->nama;
			$data['sertifikat'][] = $row->sertifikat;
			$data['tahun'][] = $row->tahun;
		}

		return $data;
	}

	public function getById($id) {
		$sql = 'SELECT * FROM pelatihan WHERE id = ?';
		$res = $this->db->query($sql, array($id))->result_array();

		return $res;
	}

	public function insert($data) {
		$sql = 'INSERT INTO pelatihan (id_user, nama, sertifikat, tahun) VALUES (?,?,?,?)';
		
		$this->db->query($sql, array($data['id_user'], $data['nama'], $data['sertifikat'], $data['tahun']));
	}

	public function update($data) {
		$sql = 'UPDATE pelatihan SET nama = ?, sertifikat = ?, tahun = ? WHERE id = ?';

		$this->db->query($sql, array($data['nama'], $data['sertifikat'], $data['tahun'], $data['id']));
	}

	public function delete($data) {
		$sql = 'DELETE FROM pelatihan WHERE id = ?';
		$res = $this->db->query($sql, array($data['id']));
	}
}
?>