<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Education extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();

        $this->load->helper('security');
		$this->load->model('M_education', 'education');
        $this->load->model('M_profile', 'profile');
	}

	public function index() {

		$data['educations'] = $this->education->getEducation();
        $data['profiles'] = $this->profile->getProfile();

		$this->load->view('profile/V_profile', $data);
	}

	public function add() {

		$this->load->view('profile/V_add_education');

	}

	public function edit($id) {

		$data['educations'] = $this->education->getById($id);

		if (count($data['educations']) > 0) {
			$this->load->view('profile/V_edit_education', $data);
		} else {
			redirect('Profile');
		}
	}

	public function insert() {

        $id         = $this->session->userdata('id');
        $jenjang    = strip_tags(str_replace("'", "", $this->input->post('jenjang')));
        $nama       = strip_tags(str_replace("'", "", $this->input->post('nama')));
        $jurusan    = strip_tags(str_replace("'", "", $this->input->post('jurusan')));
        $tahun      = strip_tags(str_replace("'", "", $this->input->post('tahun')));
        $ipk        = strip_tags(str_replace("'", "", $this->input->post('ipk')));

        $data = [
            'id_user'      => $id,
            'jenjang'      => $jenjang,
            'nama'         => $nama,
            'jurusan'      => $jurusan,
            'tahun'        => $tahun,
            'ipk'          => $ipk
        ];

        $education = $this->education->insert($this->security->xss_clean($data));

        if ($education) {
            echo $this->session->set_flashdata('flash', 'inserted');
        } else {
       	    echo $this->session->set_flashdata('flash', 'failed');
        }

        redirect('Profile');
	}

	public function update() {

        $id           = strip_tags(str_replace("'", "", $this->input->post('id')));
        $jenjang      = strip_tags(str_replace("'", "", $this->input->post('jenjang')));
        $nama         = strip_tags(str_replace("'", "", $this->input->post('nama')));
        $jurusan      = strip_tags(str_replace("'", "", $this->input->post('jurusan')));
        $tahun        = strip_tags(str_replace("'", "", $this->input->post('tahun')));
        $ipk          = strip_tags(str_replace("'", "", $this->input->post('ipk')));

        $data = [
            'id'           => $id,
            'jenjang'      => $jenjang,
            'nama'         => $nama,
            'jurusan'      => $jurusan,
            'tahun'        => $tahun,
            'ipk'          => $ipk
        ];

        $education = $this->education->update($this->security->xss_clean($data));

        if ($education) {
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

		$delete = $this->education->delete($this->security->xss_clean($data));

		if ($delete) {
			echo $this->session->set_flashdata('flash', 'deleted');
		} else {
			echo $this->session->set_flashdata('flash', 'failed');
		}

		redirect('Profile');
	}
}
?>