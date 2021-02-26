<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		if($this->session->userdata('login') != TRUE){
  			redirect('Login');
  		} 

  		if($this->session->userdata('level') != 2){
  			redirect('Admin');
  		}

		$this->load->helper('security');
		$this->load->model('M_profile', 'profile');
		$this->load->model('M_education', 'education');
		$this->load->model('M_experience', 'experience');
		$this->load->model('M_training', 'training');
	}

	public function index() {
		$data['profiles'] = $this->profile->getProfile();
		$data['educations'] = $this->education->getEducation();
		$data['experiences'] = $this->experience->getExperience();
		$data['trainings'] = $this->training->getTraining();

		$this->load->view('profile/V_profile', $data);
		// echo json_encode($data);
	}

	public function add() {

		$this->load->view('profile/V_profile');

	}

	public function edit($id) {

		$data['profiles'] = $this->profile->getById($id);

		if (count($data['profile']) > 0) {
			$this->load->view('profile/V_profile', $data);
		} else {
			redirect('Profile');
		}
	}

	public function update() {

		$id 	= $this->session->userdata('id');   
    	$posisi 		= strip_tags(str_replace("'", "", $this->input->post('posisi')));
    	$nama 			= strip_tags(str_replace("'", "", $this->input->post('nama')));
    	$ktp 			= strip_tags(str_replace("'", "", $this->input->post('ktp')));
    	$lahir 			= strip_tags(str_replace("'", "", $this->input->post('lahir')));
    	$kelamin 		= strip_tags(str_replace("'", "", $this->input->post('kelamin')));
    	$agama 			= strip_tags(str_replace("'", "", $this->input->post('agama')));
    	$golongan 		= strip_tags(str_replace("'", "", $this->input->post('golongan')));
    	$status 		= strip_tags(str_replace("'", "", $this->input->post('status')));
    	$alamat_ktp 	= strip_tags(str_replace("'", "", $this->input->post('alamat_ktp')));
    	$alamat_tinggal = strip_tags(str_replace("'", "", $this->input->post('alamat_tinggal')));
    	$email 			= strip_tags(str_replace("'", "", $this->input->post('email')));
    	$telp 			= strip_tags(str_replace("'", "", $this->input->post('telp')));
    	$darurat 		= strip_tags(str_replace("'", "", $this->input->post('darurat')));
        
       	$data = [
	       	'id_user'		=> $id,
	        'posisi'		=> $posisi,
			'nama' 			=> $nama,
			'ktp'			=> $ktp,
			'lahir'			=> $lahir,
			'kelamin' 		=> $kelamin,
			'agama' 		=> $agama,
			'golongan' 		=> $golongan,
			'status' 		=> $status,
			'alamat_ktp' 	=> $alamat_ktp,
			'alamat_tinggal' => $alamat_tinggal,
			'email' 		=> $email,
			'telp' 			=> $telp,
			'darurat' 		=> $darurat,
		];

		$update = $this->profile->update_profile($this->security->xss_clean($data));

		if($update){
			echo $this->session->set_flashdata('flash', 'update');
		}else{
			echo $this->session->set_flashdata('flash', 'update failed');
		}

		redirect('Profile');
	}
	
}
?>