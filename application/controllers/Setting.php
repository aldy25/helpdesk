<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Meload model
		$this->load->model('Main_model', 'model');

		//Jika session tidak ditemukan
		if (!$this->session->userdata('id_user')) {
			//Kembali ke halaman Login
			$this->session->set_flashdata('status1', 'expired');
			redirect('login');
		}
	}

	public function index()
	{
		//User harus admin, tidak boleh role user lain
		if($this->session->userdata('level') == "Admin"){
			//Menyusun template List Pengaturan
			$data['title'] 	  = "Pengaturan";
			$data['navbar']   = "navbar";
			$data['sidebar']  = "sidebar";
			$data['body']     = "setting/index";

        	//Session
			$id_dept = $this->session->userdata('id_dept');
			$id_user = $this->session->userdata('id_user');

        	//Daftar semua setting, get dari model (setting), data akan ditampung dalam parameter 'setting'
			$data['setting'] = $this->model->setting()->result();

			//Load template
			$this->load->view('template', $data);
		} else {
			//Bagian ini jika role yang mengakses tidak sama dengan admin
			//Akan dibawa ke Controller Errorpage 
			redirect('Errorpage');
		}
	}

	public function edit($id)
	{
		//User harus admin, tidak boleh role user lain
		if($this->session->userdata('level') == "Admin"){
			//Menyusun template Edit Pengaturan
			$data['title'] 	  = "Edit Pengaturan";
			$data['navbar']   = "navbar";
			$data['sidebar']  = "sidebar";
			$data['body']     = "setting/edit";

	        //Session
			$id_dept = $this->session->userdata('id_dept');
			$id_user = $this->session->userdata('id_user');

			//Get data setting yang akan diedit sesuai dengan id yang kita pilih, get dari model (getsetting)
			$data['setting'] = $this->model->getsetting($id)->row_array();
			//Load template
			$this->load->view('template', $data);
		} else {
			//Bagian ini jika role yang mengakses tidak sama dengan admin
			//Akan dibawa ke Controller Errorpage
			redirect('Errorpage');
		}
	}

	public function update($id)
	{
		//Form validasi untuk value_setting dengan nama validasi = value_setting
		$this->form_validation->set_rules('value_setting', 'Value_Setting', 'required',
			array(
				'required' => '<strong>Gagal!</strong> Field harus diisi.',
			)
		);

		//Kondisi jika saat proses update tidak memenuhi syarat validasi akan dikembalikan ke halaman edit value_setting
		if($this->form_validation->run() == FALSE){
			//User harus admin, tidak boleh role user lain
			if($this->session->userdata('level') == "Admin"){
				//Menyusun template Edit Pengaturan
				$data['title'] 	  = "Edit Pengaturan";
				$data['navbar']   = "navbar";
				$data['sidebar']  = "sidebar";
				$data['body']     = "setting/edit";

	        	//Session
				$id_dept = $this->session->userdata('id_dept');
				$id_user = $this->session->userdata('id_user');

				//Get data setting yang akan diedit sesuai dengan id yang kita pilih, get dari model (getsetting)
				$data['setting'] = $this->model->getsetting($id)->row_array();
				//Load template
				$this->load->view('template', $data);
			} else {
				//Bagian ini jika role yang mengakses tidak sama dengan admin
				//Akan dibawa ke Controller Errorpage
				redirect('Errorpage');
			}
		} else {
			//Bagian ini jika validasi dipenuhi, maka berhasil update value_setting
			//User harus admin, tidak boleh role user lain
			if($this->session->userdata('level') == "Admin"){
				//Data value_setting ditampung dalam bentuk array
				$data = array(
					'value_setting' => ucfirst($this->input->post('value_setting')),
					'updated_at' => date('Y-m-d H:i:s')
				);

				//Query update data yang ditampung ke dalam database. tersimpan ditabel setting
				$this->db->where('id', $id);
				$this->db->update('settings', $data);

				//Set pemberitahuan bahwa data setting berhasil diupdate
				$this->session->set_flashdata('status', 'Diperbarui');
				//Kembali ke halaman setting (index)
				redirect('setting');
			} else {
				//Bagian ini jika role yang mengakses tidak sama dengan admin
				//Akan dibawa ke Controller Errorpage
				redirect('Errorpage');
			}
		}
	}
}