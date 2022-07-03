<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('crud');
	}

	public function index()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Dashboard Admin';
		$data['active'] = 'dashboard';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
    }

	public function kompetensi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Manage Kompetensi';
		$data['active'] = 'kompetensi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
		$data['kompetensi'] = $this->db->get('kompetensi')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('admin/kompetensi', $data);
		$this->load->view('templates/footer', $data);
    }

	public function setujukompetensi($id)
    {
        $data = [
            'status' => 1
        ];

        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('kompetensi');
        redirect('Admin/kompetensi');
    }

	public function batalkompetensi($id)
    {
        $data = [
            'status' => 2
        ];

        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('kompetensi');
        redirect('Admin/kompetensi');
    }

	public function profesi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Manage Profesi';
		$data['active'] = 'profesi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
		$data['profesi'] = $this->db->get('profesi')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('admin/profesi', $data);
		$this->load->view('templates/footer', $data);
    }

	public function setujuprofesi($id)
    {
        $data = [
            'status' => 1
        ];

        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('profesi');
        redirect('Admin/profesi');
    }

	public function batalprofesi($id)
    {
        $data = [
            'status' => 2
        ];

        $this->db->set($data);
        $this->db->where('id_user', $id);
        $this->db->update('profesi');
        redirect('Admin/profesi');
    }
}