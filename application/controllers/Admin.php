<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
  		parent:: __construct();
  		if($this->session->userdata('login') != TRUE){
  			redirect('Login');
  		} 

  		if($this->session->userdata('level') != 1){
  			redirect('Profile');
  		} 
  
		$this->load->model('M_admin', 'admin');
	}

	public function index()
	{
		$data['admins'] = $this->admin->getAll();
		$this->load->view('admin/V_admin', $data);
	}

	public function detail($id){
		$id_user = $this->admin->getUserid($id);
		$data['profiles'] = $this->admin->getProfile($id_user);
		$data['educations'] = $this->admin->getEducation($id_user);
		$data['experiences'] = $this->admin->getExperience($id_user);
		$data['trainings'] = $this->admin->getTraining($id_user);

		$this->load->view('admin/V_admin_detail', $data);
	}

	public function edit($id){
		$id 		= strip_tags(str_replace("'", "", $id));
		$user 		= $this->session->userdata('id_admin');

		$data = [
			'id' => $id,
			'user' => $user
		];

		$edit = $this->admin->edit($this->security->xss_clean($data));

		if($delete){
			echo $this->session->set_flashdata('flash', 'change');
		}else{
			echo $this->session->set_flashdata('flash', 'change failed');
		}
		
// test

		redirect('Admin');
	}
}
?>