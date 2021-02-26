<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_experience extends CI_Model {
	
	public function getExperience() {
		$sql = 'SELECT * FROM pekerjaan WHERE id_user = ?';
		$res = $this->db->query($sql, array($this->session->userdata('id')));

		$data = array();

		foreach ($res->result() as $row) {
			$data['id'][] = $row->id;
			$data['nama'][] = $row->nama;
			$data['posisi'][] = $row->posisi;
			$data['pendapatan'][] = $row->pendapatan;
			$data['tahun'][] = $row->tahun;
		}

		return $data;
	}

	public function getById($id) {
		$sql = 'SELECT * FROM pekerjaan WHERE id = ?';
		$res = $this->db->query($sql, array($id))->result_array();

		return $res;
	}

	public function insert($data) {
		$sql = 'INSERT INTO pekerjaan (id_user, nama, posisi, pendapatan, tahun) VALUES (?,?,?,?,?)';
		
		$this->db->query($sql, array($data['id_user'], $data['nama'], $data['posisi'], $data['pendapatan'], $data['tahun']));
	}

	public function update($data) {
		$sql = 'UPDATE pekerjaan SET nama = ?, posisi = ?, pendapatan = ?, tahun = ? WHERE id = ?';

		$this->db->query($sql, array($data['nama'], $data['posisi'], $data['pendapatan'], $data['tahun'], $data['id']));
	}

	public function delete($data) {
		$sql = 'DELETE FROM pekerjaan WHERE id = ?';
		$res = $this->db->query($sql, array($data['id']));
	}
}
?>