<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('crud');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Lembaga Sertifikasi Profesi PNJ';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/footer', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($password == $user['password']) {
				$data = [
					'email' => $user['email'],
					'role' => $user['role']
				];
				$this->session->set_userdata($data);

				if($user['role'] == 1){
					redirect('admin');
				}else if($user['role'] == 2){
					redirect('jurusan');
				}else if($user['role'] == 3){
					redirect('mahasiswa');
				}else{
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">email is not registered!</div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi Mahasiswa';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('auth/footer', $data);
		} else {
			if ($user) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Username already registered!</div>');
				redirect('auth/registrasi');
			}else{
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'password' => htmlspecialchars($this->input->post('password1', true)),
					'role' => 3,
					'gambar' => 'default.jpg'
				];
	
				$this->crud->input_data($data,'user');
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');

		redirect('auth');
	}

	
}
