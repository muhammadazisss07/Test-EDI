<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_login extends CI_Model {
	
	public function login($data) {
		$sql = 'SELECT id, email, level FROM user WHERE email = ? AND password = ?';
		$exec = $this->db->query($sql, $data)->result_array();

		if (count($exec) > 0) {
			$user = $exec[0]['email'];
			$desc = 'Member logged in to system';
			$sql2 = 'INSERT INTO log_activity (user, `desc`, date_created) VALUES (?,?,NOW())';
			$this->db->query($sql2, array($user, $desc));
		}

		return $exec;
	}

	public function register($data) {
		$sql = 'INSERT INTO `user` (email, password, level) VALUES (?,?,2)';
		$exec = $this->db->query($sql, $data);

		return $exec;
	}

	public function cek_email($email) {
		$sql = 'SELECT email FROM user WHERE email = ? limit 1';
		$exec = $this->db->query($sql, array($email))->row_array();

		if ($exec != NULL) {
			return true;
		} else {
			return false;
		}
	}

	public function logout($user) {
		$desc = 'Member logged out from system';
		$sql2 = 'INSERT INTO log_activity (user, `desc`, date_created) VALUES (?,?,NOW())';
		$this->db->query($sql2, array($user, $desc));
	}

}
?>