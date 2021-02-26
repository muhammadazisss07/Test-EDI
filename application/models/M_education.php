<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_education extends CI_Model {
	
	public function getEducation() {
		$sql = 'SELECT * FROM pendidikan WHERE id_user = ?';
		$res = $this->db->query($sql, array($this->session->userdata('id')));

		$data = array();

		foreach ($res->result() as $row) {
			$data['id'][] = $row->id;
			$data['jenjang'][] = $row->jenjang;
			$data['nama'][] = $row->nama;
			$data['jurusan'][] = $row->jurusan;
			$data['tahun'][] = $row->tahun;
			$data['ipk'][] = $row->ipk;
		}

		return $data;
	}

	public function getById($id) {
		$sql = 'SELECT * FROM pendidikan WHERE id = ?';
		$res = $this->db->query($sql, array($id))->result_array();

		return $res;
	}

	public function insert($data) {
		$sql = 'INSERT INTO pendidikan (id_user, jenjang, nama, jurusan, tahun, ipk) VALUES (?,?,?,?,?,?)';

		$this->db->query($sql, array($data['id_user'], $data['jenjang'], $data['nama'], $data['jurusan'], $data['tahun'], $data['ipk']));
	}

	public function update($data) {
		$sql = 'UPDATE pendidikan SET jenjang = ?, nama = ?, jurusan = ?, tahun = ?, ipk = ? WHERE id = ?';
		
		$this->db->query($sql, array($data['jenjang'], $data['nama'], $data['jurusan'], $data['tahun'], $data['ipk'], $data['id']));
	}

	public function delete($data) {
		$sql = 'DELETE FROM pendidikan WHERE id = ?';
		$res = $this->db->query($sql, array($data['id']));
	}
}
?>