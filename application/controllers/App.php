<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class App extends CI_Controller {

	public $image = '';
	
	public function index()
	{
        if ($this->session->userdata('level') == '') {
            redirect('login');
        }
		$data = array(
			'konten' => 'home_admin',
            'judul_page' => 'Dashboard',
		);
		$this->load->view('v_index', $data);
    }

    public function pengembangan()
    {
        $this->session->set_flashdata('message', alert_biasa('Sedang dalam pengembangan','info'));
        redirect("app");
    }

    public function pengajuan()
    {
    	if ($this->session->userdata('level') == '') {
            redirect('login');
        }
		$data = array(
			'konten' => 'spj/view',
            'judul_page' => 'Pengajuan SPJ',
		);
		$this->load->view('v_index', $data);
    }

    public function tambah_pengajuan()
    {
    	if ($this->session->userdata('level') == '') {
            redirect('login');
        }
        if ($_POST) {
        	$this->db->insert('pengajuan', array(
        		'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
        		'kategori' => $this->input->post('kategori'),
        		'id_user' => $this->session->userdata('id_user')
        	));
        	$this->session->set_flashdata('message', alert_biasa('Data berhasil disimpan','success'));
				redirect('app/pengajuan','refresh');
        }else{
        	$data = array(
				'konten' => 'spj/tambah',
	            'judul_page' => 'Pengajuan SPJ',
			);
			$this->load->view('v_index', $data);
        }
		
    }

    public function revisi_pengajuan($id)
    {
    	if ($this->session->userdata('level') == '') {
            redirect('login');
        }
        if ($_POST) {
        	$this->db->where('id_pengajuan', $id);
        	$this->db->update('pengajuan', [
        		'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
        		'kategori' => $this->input->post('kategori'),
        		'keterangan_verifikator' => $this->input->post('keterangan'),
        		'status' => 'sudah revisi'
        	]);
        	$this->session->set_flashdata('message', alert_biasa('Data berhasil disimpan','success'));
				redirect('app/pengajuan','refresh');
        }else{
        	$data = array(
				'konten' => 'spj/revisi',
	            'judul_page' => 'Pengajuan SPJ',
			);
			$this->load->view('v_index', $data);
        }
    }

    public function periksa_pengajuan($id)
    {
    	if ($this->session->userdata('level') == '') {
            redirect('login');
        }
        if ($_POST) {
        	$this->db->where('id_pengajuan', $id);
        	$this->db->update('pengajuan', [
        		'tanggal_periksa' => $this->input->post('tanggal_periksa'),
        		'kategori' => $this->input->post('kategori'),
        		'keterangan_verifikator' => $this->input->post('keterangan'),
        		'nominal' => $this->input->post('nominal'),
        		'status'=>$this->input->post('status')
        	]);
        	$this->session->set_flashdata('message', alert_biasa('Data berhasil disimpan','success'));
				redirect('app/pengajuan','refresh');
        }else{
        	$data = array(
				'konten' => 'spj/periksa',
	            'judul_page' => 'Pengajuan SPJ',
			);
			$this->load->view('v_index', $data);
        }
    }

    public function hapus_pengajuan($id)
    {
    	$this->db->where('id_pengajuan', $id);
    	$this->db->delete('pengajuan');
    	$this->session->set_flashdata('message', alert_biasa('Data berhasil dihapus','success'));
		redirect('app/pengajuan','refresh');
    }

    public function cetak($view)
    {
        $this->load->view('cetak/'.$view);
    }
   

   
	

	

	
}
