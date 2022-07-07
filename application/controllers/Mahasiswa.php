<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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

        $data['title'] = 'Dashboard Mahasiswa';
		$data['active'] = 'dashboard';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['kompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $user['id_user']])->row_array();
        $data['hitungkompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $user['id_user']])->num_rows();
        $data['profesi'] = $this->db->get_where('profesi', ['id_user' => $user['id_user']])->row_array();
        $data['hitungprofesi'] = $this->db->get_where('profesi', ['id_user' => $user['id_user']])->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer', $data);
    }

    public function profile()
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

        $data['title'] = 'Profile';
		$data['active'] = 'profile';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/profile', $data);    
			$this->load->view('templates/footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/nonlsp/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000;
            
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
                if ( ! $this->upload->do_upload('image')){
                    echo $this->upload->display_errors();
                }else{
                    $old_image = $data['user']['nonlsp'];
                    if ($old_image != NULL) {
                        unlink(FCPATH . './assets/img/nonlsp/' . $old_image);
                    }
                    $image = $this->upload->data();

                    $data = [
                        'nonlsp' => $image['file_name'],
                    ];
                    $this->db->set($data);
                    $this->db->where('id_user', $user['id_user']);
                    $this->db->update('user');
                }
            }
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
            $this->db->where('id_user', $user['id_user']);
            $this->db->update('user');

            $this->db->set($data);
            $this->db->where('id_user', $user['id_user']);
            $this->db->update('kompetensi');

            $this->db->set($data);
            $this->db->where('id_user', $user['id_user']);
            $this->db->update('profesi');
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Profile Updated!</div>');
            redirect('Mahasiswa/profile');
        }
    }

	public function kompetensi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
		$this->form_validation->set_rules('skema', 'Skema', 'required');

        $data['title'] = 'Formulir Pendaftaran Sertifikasi PSKK BNSP 2022';
		$data['active'] = 'kompetensi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $hitung = $this->db->get_where('kompetensi', ['id_user' => $user['id_user']])->num_rows();
        $data['kompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $user['id_user']])->row_array();

        if($user['semester'] == NULL){
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Lengkapi Profile Terlebih Dahulu</div>');
            redirect('mahasiswa/profile');
        }

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            if ($hitung > 0) {
                $this->load->view('mahasiswa/kompetensi', $data);
            }else{
                $this->load->view('mahasiswa/daftarkompetensi', $data);
            }
			$this->load->view('templates/footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/kompetensi/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000;
        
                $this->load->library('upload', $config);
        
                if ( ! $this->upload->do_upload('image')){
                    echo $this->upload->display_errors();
                }else{
                    $image = $this->upload->data('file_name');
                }
            }else{
                $image = "";
            }

            $data = [
                'email' => $user['email'],
                'nama' => $user['nama'],
                'nik' => $user['nik'],
                'tempat_lahir' => $user['tempat_lahir'],
				'tgl_lahir' => $user['tgl_lahir'],
                'jk' => $user['jk'],
                'alamat' => $user['alamat'],
                'no_telp' => $user['no_telp'],
				'nim' => $user['nim'],
				'jurusan' => $user['jurusan'],
                'prodi' => $user['prodi'],
                'semester' => $user['semester'],
                'skema' => htmlspecialchars($this->input->post('skema', true)),
                'image' => $image,
				'id_user' => $user['id_user']
            ];
            $this->db->insert('kompetensi', $data);
            
            redirect('Mahasiswa/kompetensi');
        }
    }

    public function editkompetensi($id)
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
		$this->form_validation->set_rules('skema', 'Skema', 'required');

        $data['title'] = 'Formulir Pendaftaran Sertifikasi PSKK BNSP 2022';
		$data['active'] = 'kompetensi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['kompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $user['id_user']])->row_array();

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/editkompetensi', $data);
			$this->load->view('templates/footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/kompetensi/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000;
        
                $this->load->library('upload', $config);
        
                if ( ! $this->upload->do_upload('image')){
                    echo $this->upload->display_errors();
                }else{
                    $old_image = $data['kompetensi']['image'];
                    if ($old_image != NULL) {
                        unlink(FCPATH . './assets/img/kompetensi/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
                }
            }else{
                $image = "";
            }

            $data = [
                'skema' => htmlspecialchars($this->input->post('skema', true)),
                'image' => $image,
                'status' => 0,
				'id_user' => $user['id_user']
            ];
            $this->db->set($data);
            $this->db->where('id_kompetensi', $id);
            $this->db->update('kompetensi');
            
            redirect('Mahasiswa/kompetensi');
        }
    }

	public function profesi()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
		$this->form_validation->set_rules('skema', 'Skema', 'required');

        $data['title'] = 'Formulir Pendaftaran Sertikom DIKSI Kemendikbud 2022';
		$data['active'] = 'profesi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $hitung = $this->db->get_where('profesi', ['id_user' => $user['id_user']])->num_rows();
        $data['profesi'] = $this->db->get_where('profesi', ['id_user' => $user['id_user']])->row_array();

        if($user['semester'] == NULL){
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Lengkapi Profile Terlebih Dahulu</div>');
            redirect('mahasiswa/profile');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            if ($hitung > 0) {
                $this->load->view('mahasiswa/profesi', $data);
            }else{
                $this->load->view('mahasiswa/daftarprofesi', $data);
            }
            $this->load->view('templates/footer', $data);
        } else {
            $upload_berkas = $_FILES['berkas']['name'];
            if ($upload_berkas) {
                $config['upload_path'] = './assets/berkas/';
                $config['allowed_types'] = 'pdf|csv';
                $config['max_size'] = 10000;
            
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
                if ( ! $this->upload->do_upload('berkas')){
                    echo $this->upload->display_errors();
                }else{
                    $berkas = $this->upload->data('file_name');
                }
            }else{
                $berkas = "";
            }
            
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profesi/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000;
            
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
                if ( ! $this->upload->do_upload('image')){
                    echo $this->upload->display_errors();
                }else{
                    $image = $this->upload->data('file_name');
                }
            }else{
                $image = "";
            }

            $data = [
                'email' => $user['email'],
                'nama' => $user['nama'],
                'nik' => $user['nik'],
                'tempat_lahir' => $user['tempat_lahir'],
				'tgl_lahir' => $user['tgl_lahir'],
                'jk' => $user['jk'],
                'alamat' => $user['alamat'],
                'no_telp' => $user['no_telp'],
				'nim' => $user['nim'],
				'jurusan' => $user['jurusan'],
                'prodi' => $user['prodi'],
                'semester' => $user['semester'],
                'skema' => htmlspecialchars($this->input->post('skema', true)),
                'image' => $image,
                'berkas' => $berkas,
                'id_user' => $user['id_user']
            ];

            $this->db->insert('profesi', $data);
            
            redirect('Mahasiswa/profesi');
        }
    }

    public function editprofesi($id)
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }
		$this->form_validation->set_rules('skema', 'Skema', 'required');

        $data['title'] = 'Formulir Pendaftaran Sertifikasi PSKK BNSP 2022';
		$data['active'] = 'profesi';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;
        $data['profesi'] = $this->db->get_where('profesi', ['id_user' => $user['id_user']])->row_array();

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/editprofesi', $data);
			$this->load->view('templates/footer', $data);
        } else {
            $upload_berkas = $_FILES['berkas']['name'];
            if ($upload_berkas) {
                $config['upload_path'] = './assets/berkas/';
                $config['allowed_types'] = 'pdf|csv';
                $config['max_size'] = 10000;
            
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
                if ( ! $this->upload->do_upload('berkas')){
                    echo $this->upload->display_errors();
                }else{
                    $old_berkas = $data['profesi']['berkas'];
                    if ($old_berkas != NULL) {
                        unlink(FCPATH . './assets/berkas/' . $old_berkas);
                    }
                    $berkas = $this->upload->data('file_name');
                }
            }else{
                $berkas = "";
            }
            
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profesi/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000;
            
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
                if ( ! $this->upload->do_upload('image')){
                    echo $this->upload->display_errors();
                }else{
                    $old_image = $data['profesi']['image'];
                    if ($old_image != NULL) {
                        unlink(FCPATH . './assets/img/profesi/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
                }
            }else{
                $image = "";
            }

            $data = [
                'skema' => htmlspecialchars($this->input->post('skema', true)),
                'status' => 0,
                'image' => $image,
                'berkas' => $berkas,
				'id_user' => $user['id_user']
            ];
            $this->db->set($data);
            $this->db->where('id_profesi', $id);
            $this->db->update('profesi');
            
            redirect('Mahasiswa/profesi');
        }
    }

    public function pengumuman()
    {
		if($this->session->userdata('role') == NULL){
            redirect('auth');
        }

        $data['title'] = 'Pengumuman';
		$data['active'] = 'pengumuman';
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user;

        $data['kompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $user['id_user']])->row_array();
        $data['profesi'] = $this->db->get_where('profesi', ['id_user' => $user['id_user']])->row_array();
        $data['hitungkompetensi'] = $this->db->get_where('kompetensi', ['id_user' => $user['id_user']])->num_rows();
        $data['hitungprofesi'] = $this->db->get_where('profesi', ['id_user' => $user['id_user']])->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/pengumuman', $data);
		$this->load->view('templates/footer', $data);
    }
}