<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Training extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();

		$this->load->helper('security');
		$this->load->model('M_training', 'training');
	}

	public function index() {

		$data['trainings'] = $this->training->getTraining();

		$this->load->view('profile/V_profile', $data);
	}

	public function add() {

		$this->load->view('profile/V_add_training');
	}

	public function edit($id) {

		$data['trainings'] = $this->training->getById($id);

		if (count($data['trainings']) > 0) {
			$this->load->view('profile/V_edit_training', $data);
		} else {
			redirect('Profile');
		}
	}

	public function insert() {

		$id        	= $this->session->userdata('id');
		$nama	    = strip_tags(str_replace("'", "", $this->input->post('nama')));
		$sertifikat	= strip_tags(str_replace("'", "", $this->input->post('sertifikat')));
		$tahun	    = strip_tags(str_replace("'", "", $this->input->post('tahun')));

        $data = [
            'id_user'          => $id,
            'nama'        => $nama,
            'sertifikat'  => $sertifikat,
            'tahun'  	  => $tahun
        ];

        $training = $this->training->insert($this->security->xss_clean($data));

        if ($training) {
        	echo $this->session->set_flashdata('flash', 'inserted');
        } else {
        	echo $this->session->set_flashdata('flash', 'failed');
        }

        redirect('Profile');
	}

	public function update() {

		$id 		 = strip_tags(str_replace("'", "", $this->input->post('id')));
		$nama	     = strip_tags(str_replace("'", "", $this->input->post('nama')));
		$sertifikat	 = strip_tags(str_replace("'", "", $this->input->post('sertifikat')));
		$tahun	     = strip_tags(str_replace("'", "", $this->input->post('tahun')));

        $data = [
            'id'          => $id,
            'nama'        => $nama,
            'sertifikat'  => $sertifikat,
            'tahun'  	  => $tahun
        ];

        $training = $this->training->update($this->security->xss_clean($data));

        if ($training) {
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

		$delete = $this->training->delete($this->security->xss_clean($data));

		if ($delete) {
			echo $this->session->set_flashdata('flash', 'deleted');
		} else {
			echo $this->session->set_flashdata('flash', 'failed');
		}

		redirect('Profile');
	}
}
?>