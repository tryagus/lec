<?php 
class Pengajar extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_users');
	}
	function index() {
		$data = array('users' => $this->m_users->get_users(array('level' => 3)), 'title' => 'Pengajar');
		$data['slug'] = 'pengajar';
		$data['content'] = 'users/lists';
		$this->load->view('dashboard', $data);
	}	
	function detail($id) {
		$data = array('user' => $this->m_users->detail_users($id), 'title' => 'Detail Operator');
		$data['id'] = $id;
		$data['slug'] = 'pengajar';
		$data['content'] = 'users/detail';
		$this->load->view('dashboard', $data);
	}
	function form($id = "") {
		$data = array('user' => $this->m_users->detail_users($id), 'id' => $id);
		$data['title'] = 'Form Pengajar';
		$data['slug'] = 'pengajar';
		$data['content'] = 'users/form';
		$this->load->view('dashboard', $data);
	}
	function add() {
		$kp = $this->input->post('kode_pengajar');
		$username = $this->input->post('username');	
		$nama = $this->input->post('nama');	
		$email = $this->input->post('email');	
		$alamat = $this->input->post('alamat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$no_tlp = $this->input->post('telpon');
		$status = !empty($this->input->post('status')) ? $this->input->post('status') : "aktif";
		$level = 3;
		$password = $this->input->post('password');	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if($this->upload->do_upload('foto')) {
			$foto = base_url().'uploads/'.$this->upload->data('file_name');
		} else {
			$foto = base_url().'assets/images/no-profile-image.png';
		}
		$data = array(
			'username' => $username,
			'nama' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'level' => $level,
			'tgl_lahir' => $tgl_lahir,
			'telpon' => $no_tlp,
			'status' => $status,
			'password' => md5($password),
			'foto' => $foto,	
		);
		$db = $this->m_users->add_users($data,'kode_pengajar', $kp);
		redirect('pengajar?'.$db);
	}
	function edit() {
		$id = $this->input->post('id');
		$kp = $this->input->post('kode_pengajar');
		$username = $this->input->post('username');	
		$nama = $this->input->post('nama');	
		$email = $this->input->post('email');	
		$alamat = $this->input->post('alamat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$no_tlp = $this->input->post('telpon');
		$status = !empty($this->input->post('status')) ? $this->input->post('status') : "aktif";
		$level = 3;
		$password = $this->input->post('password');
		$foto = $this->input->post('old_foto');	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if($this->upload->do_upload('foto')) {
			$foto = base_url().'uploads/'.$this->upload->data('file_name');
		}
		$data = array(
			'username' => $username,
			'nama' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'level' => $level,
			'tgl_lahir' => $tgl_lahir,
			'telpon' => $no_tlp,
			'status' => $status,
			'foto' => $foto,	
		);
		if(!empty($password)) {
			$data['password'] = $password;
		}
		$meta = array('nilai_meta' => $kp);
		$wmeta = array('nama_meta' => 'kode_pengajar', 'id_user' => $id);
		$this->m_users->update_users($id, $data, $wmeta, $meta);	
		redirect('pengajar');
	}
	function delete($id) {
		$where = array('id_operator' => $id);
		$this->m_users->delete($where);
		redirect('pengajar');
	}
}