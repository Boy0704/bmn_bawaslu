<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemeliharaan_kendaraan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemeliharaan_kendaraan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemeliharaan_kendaraan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemeliharaan_kendaraan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemeliharaan_kendaraan/index.html';
            $config['first_url'] = base_url() . 'pemeliharaan_kendaraan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemeliharaan_kendaraan_model->total_rows($q);
        $pemeliharaan_kendaraan = $this->Pemeliharaan_kendaraan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemeliharaan_kendaraan_data' => $pemeliharaan_kendaraan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Riwayat Pemeliharaan Kendaraan',
            'konten' => 'pemeliharaan_kendaraan/pemeliharaan_kendaraan_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemeliharaan_kendaraan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemeliharaan' => $row->id_pemeliharaan,
		'jenis_kendaraan' => $row->jenis_kendaraan,
		'merk' => $row->merk,
		'no_plat' => $row->no_plat,
		'jenis_servis' => $row->jenis_servis,
		'tanggal_servis' => $row->tanggal_servis,
		'penanggung_jawab' => $row->penanggung_jawab,
	    );
            $this->load->view('pemeliharaan_kendaraan/pemeliharaan_kendaraan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeliharaan_kendaraan'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'Riwayat Pemeliharaan Kendaraan',
            'konten' => 'pemeliharaan_kendaraan/pemeliharaan_kendaraan_form',
            'button' => 'Create',
            'action' => site_url('pemeliharaan_kendaraan/create_action'),
	    'id_pemeliharaan' => set_value('id_pemeliharaan'),
	    'jenis_kendaraan' => set_value('jenis_kendaraan'),
	    'merk' => set_value('merk'),
	    'no_plat' => set_value('no_plat'),
	    'jenis_servis' => set_value('jenis_servis'),
	    'tanggal_servis' => set_value('tanggal_servis'),
	    'penanggung_jawab' => set_value('penanggung_jawab'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_kendaraan' => $this->input->post('jenis_kendaraan',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'no_plat' => $this->input->post('no_plat',TRUE),
		'jenis_servis' => $this->input->post('jenis_servis',TRUE),
		'tanggal_servis' => $this->input->post('tanggal_servis',TRUE),
		'penanggung_jawab' => $this->input->post('penanggung_jawab',TRUE),
	    );

            $this->Pemeliharaan_kendaraan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemeliharaan_kendaraan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemeliharaan_kendaraan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'Riwayat Pemeliharaan Kendaraan',
                'konten' => 'pemeliharaan_kendaraan/pemeliharaan_kendaraan_form',
                'button' => 'Update',
                'action' => site_url('pemeliharaan_kendaraan/update_action'),
		'id_pemeliharaan' => set_value('id_pemeliharaan', $row->id_pemeliharaan),
		'jenis_kendaraan' => set_value('jenis_kendaraan', $row->jenis_kendaraan),
		'merk' => set_value('merk', $row->merk),
		'no_plat' => set_value('no_plat', $row->no_plat),
		'jenis_servis' => set_value('jenis_servis', $row->jenis_servis),
		'tanggal_servis' => set_value('tanggal_servis', $row->tanggal_servis),
		'penanggung_jawab' => set_value('penanggung_jawab', $row->penanggung_jawab),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeliharaan_kendaraan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemeliharaan', TRUE));
        } else {
            $data = array(
		'jenis_kendaraan' => $this->input->post('jenis_kendaraan',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'no_plat' => $this->input->post('no_plat',TRUE),
		'jenis_servis' => $this->input->post('jenis_servis',TRUE),
		'tanggal_servis' => $this->input->post('tanggal_servis',TRUE),
		'penanggung_jawab' => $this->input->post('penanggung_jawab',TRUE),
	    );

            $this->Pemeliharaan_kendaraan_model->update($this->input->post('id_pemeliharaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemeliharaan_kendaraan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemeliharaan_kendaraan_model->get_by_id($id);

        if ($row) {
            $this->Pemeliharaan_kendaraan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemeliharaan_kendaraan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeliharaan_kendaraan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_kendaraan', 'jenis kendaraan', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('no_plat', 'no plat', 'trim|required');
	$this->form_validation->set_rules('jenis_servis', 'jenis servis', 'trim|required');
	$this->form_validation->set_rules('tanggal_servis', 'tanggal servis', 'trim|required');
	$this->form_validation->set_rules('penanggung_jawab', 'penanggung jawab', 'trim|required');

	$this->form_validation->set_rules('id_pemeliharaan', 'id_pemeliharaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pemeliharaan_kendaraan.php */
/* Location: ./application/controllers/Pemeliharaan_kendaraan.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2021-11-02 05:27:38 */
/* https://jualkoding.com */