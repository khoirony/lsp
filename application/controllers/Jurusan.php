<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
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

        $data['title'] = 'Dashboard Jurusan';
		$data['active'] = 'dashboard';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

		$data['hitungkompetensi'] = $this->db->get_where('kompetensi', ['jurusan' => $user['nama']])->num_rows();
        $data['hitungprofesi'] = $this->db->get_where('profesi', ['jurusan' => $user['nama']])->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/index', $data);
		$this->load->view('templates/footer', $data);
    }

	public function kompetensi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Data Kompetensi';
		$data['active'] = 'kompetensi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
		$data['kompetensi'] = $this->db->get_where('kompetensi', ['jurusan' => $user['nama']])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/kompetensi', $data);
		$this->load->view('templates/footer', $data);
    }

	public function lihatkompetensi($id)
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Lihat Peserta Kompetensi';
		$data['active'] = 'kompetensi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
		$data['kompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $id])->row_array();
        $data['mahasiswa'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/lihatkompetensi', $data);
		$this->load->view('templates/footer', $data);
    }

	public function carikompetensi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Cari Kompetensi';
		$data['active'] = 'kompetensi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

		$query = "SELECT * FROM kompetensi where jurusan like '%".$user['nama']."%' AND nama like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/cari/kompetensi', $data);
		$this->load->view('templates/footer', $data);
    }

	public function profesi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Data Profesi';
		$data['active'] = 'profesi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
		$data['profesi'] = $this->db->get_where('profesi', ['jurusan' => $user['nama']])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/profesi', $data);
		$this->load->view('templates/footer', $data);
    }

	public function lihatprofesi($id)
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Lihat Peserta Profesi';
		$data['active'] = 'profesi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
		$data['profesi'] = $this->db->get_where('profesi', ['id_user' => $id])->row_array();
        $data['mahasiswa'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/lihatprofesi', $data);
		$this->load->view('templates/footer', $data);
    }

	public function cariprofesi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Cari Profesi';
		$data['active'] = 'profesi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
		
		$query = "SELECT * FROM profesi where jurusan like '%".$user['nama']."%' AND nama like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('jurusan/cari/profesi', $data);
		$this->load->view('templates/footer', $data);
    }
}