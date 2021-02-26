<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Experience extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();

		$this->load->helper('security');
		$this->load->model('M_experience', 'experience');
	}

	public function index() {

		$data['experiences'] = $this->experience->getExperience();

		$this->load->view('profile/V_profile', $data);
	}

	public function add() {

		$this->load->view('profile/V_add_experience');
	}

	public function edit($id) {

		$data['experiences'] = $this->experience->getById($id);

		if (count($data['experiences']) > 0) {
			$this->load->view('profile/V_edit_experience', $data);
		} else {
			redirect('Profile');
		}
	}

	public function insert() {

		$id         = $this->session->userdata('id');
		$nama	    = strip_tags(str_replace("'", "", $this->input->post('nama')));
        $posisi  	= strip_tags(str_replace("'", "", $this->input->post('posisi')));
        $pendapatan	= strip_tags(str_replace("'", "", $this->input->post('pendapatan')));
        $tahun	    = strip_tags(str_replace("'", "", $this->input->post('tahun')));	

        $data = [
            'id_user'       => $id,
            'nama'        	=> $nama,
            'posisi' 		=> $posisi,
            'pendapatan'    => $pendapatan,
            'tahun'       	=> $tahun,
        ];

        $experience = $this->experience->insert($this->security->xss_clean($data));

        if ($experience) {
        	echo $this->session->set_flashdata('flash', 'inserted');
        } else {
        	echo $this->session->set_flashdata('flash', 'failed');
        }

        redirect('Profile');
	}

	public function update() {

		$id 		= strip_tags(str_replace("'", "", $this->input->post('id')));
		$nama	    = strip_tags(str_replace("'", "", $this->input->post('nama')));
        $posisi  	= strip_tags(str_replace("'", "", $this->input->post('posisi')));
        $pendapatan	= strip_tags(str_replace("'", "", $this->input->post('pendapatan')));
        $tahun	    = strip_tags(str_replace("'", "", $this->input->post('tahun')));	

        $data = [
            'id'            => $id,
            'nama'        	=> $nama,
            'posisi' 		=> $posisi,
            'pendapatan'    => $pendapatan,
            'tahun'       	=> $tahun,
        ];

        $experience = $this->experience->update($this->security->xss_clean($data));

        if ($experience) {
        	echo $this->session->set_flashdata('flash', 'updated');
        } else {
        	echo $this->session->set_flashdata('flash', 'updated failed');
        }

        redirect('Profile');
	}

	public function delete($id) {
		$id 	= strip_tags(str_replace("'", "", $id));
		$user 	= $this->session->userdata('id');

		$data 	= [
			'id' 	=> $id,
			'user' 	=> $user
		];

		$delete = $this->experience->delete($this->security->xss_clean($data));

		if ($delete) {
			echo $this->session->set_flashdata('flash', 'deleted');
		} else {
			echo $this->session->set_flashdata('flash', 'failed');
		}

		redirect('Profile');
	}
}
?>