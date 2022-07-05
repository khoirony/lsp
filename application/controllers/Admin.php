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

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat/kompetensi', $data);
		$this->load->view('templates/footer', $data);
    }

    public function editkompetensi($id)
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('skema', 'Skema', 'required');

        $data['title'] = 'Edit Peserta Kompetensi';
		$data['active'] = 'kompetensi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['kompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $id])->row_array();

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('admin/lihat/editkompetensi', $data);
			$this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'nim' => htmlspecialchars($this->input->post('nim', true)),
				'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'prodi' => htmlspecialchars($this->input->post('prodi', true)),
                'semester' => htmlspecialchars($this->input->post('semester', true))
            ];
            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('user');

            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('kompetensi');

            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('profesi');

            $data = [
                'skema' => htmlspecialchars($this->input->post('skema', true)),
                'status' => 0,
				'id_user' => $id
            ];
            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('kompetensi');
            
            redirect('Admin/lihatkompetensi/' . $id);
        }
    }

    public function hapuskompetensi($id)
    {
        $where = array('id_user' => $id);
        $this->db->where($where);
        $this->db->delete('kompetensi');
        redirect('Admin/kompetensi');
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

		$query = "SELECT * FROM kompetensi where nama like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('admin/cari/kompetensi', $data);
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

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat/profesi', $data);
		$this->load->view('templates/footer', $data);
    }

    public function editprofesi($id)
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('skema', 'Skema', 'required');

        $data['title'] = 'Edit Peserta profesi';
		$data['active'] = 'profesi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['profesi'] = $this->db->get_where('profesi', ['id_user' => $id])->row_array();

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('admin/lihat/editprofesi', $data);
			$this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'nim' => htmlspecialchars($this->input->post('nim', true)),
				'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'prodi' => htmlspecialchars($this->input->post('prodi', true)),
                'semester' => htmlspecialchars($this->input->post('semester', true))
            ];
            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('user');

            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('profesi');

            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('profesi');

            $data = [
                'skema' => htmlspecialchars($this->input->post('skema', true)),
                'status' => 0,
				'id_user' => $id
            ];
            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('profesi');
            
            redirect('Admin/lihatprofesi/' . $id);
        }
    }

    public function hapusprofesi($id)
    {
        $where = array('id_user' => $id);
        $this->db->where($where);
        $this->db->delete('profesi');
        redirect('Admin/profesi');
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

		$query = "SELECT * FROM profesi where nama like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('admin/cari/profesi', $data);
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

    public function jurusan()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

        $data['title'] = 'Manage Jurusan';
		$data['active'] = 'jurusan';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

        $data['jurusan'] = $this->db->get_where('user', ['role' => 2])->result_array();

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('admin/jurusan', $data);    
			$this->load->view('templates/footer', $data);
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
				'password' => htmlspecialchars($this->input->post('password', true)),
                'role' => 2,
                'gambar' => 'default.jpg'
            ];
            $this->db->insert('user', $data);
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Akun Jurusan Berhasil dibuat!</div>');
            redirect('admin/jurusan');
        }
    }

    public function editjurusan($id)
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

        $data['title'] = 'Manage Jurusan';
		$data['active'] = 'jurusan';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

        $data['jurusan'] = $this->db->get_where('user', ['role' => 2])->result_array();
        $data['edit'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('admin/editjurusan', $data);    
			$this->load->view('templates/footer', $data);
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
				'password' => htmlspecialchars($this->input->post('password', true)),
                'role' => 2,
                'gambar' => 'default.jpg'
            ];
            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('user');
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Akun Jurusan Berhasil diupdate!</div>');
            redirect('admin/jurusan');
        }
    }

    public function hapusjurusan($id)
    {
        $where = array('id_user' => $id);
        $this->db->where($where);
        $this->db->delete('user');
        redirect('Admin/jurusan');
    }
}