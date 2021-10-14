<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bapb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bapb_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bapb/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bapb/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bapb/index.html';
            $config['first_url'] = base_url() . 'bapb/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bapb_model->total_rows($q);
        $bapb = $this->Bapb_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bapb_data' => $bapb,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Berita Acara Peminjaman Barang',
            'konten' => 'bapb/bapb_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Bapb_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bapb' => $row->id_bapb,
		'nama1' => $row->nama1,
		'nip1' => $row->nip1,
		'jabatan1' => $row->jabatan1,
		'nama2' => $row->nama2,
		'nip2' => $row->nip2,
		'jabatan2' => $row->jabatan2,
		'id_barang' => $row->id_barang,
	    );
            $this->load->view('bapb/bapb_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bapb'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'Berita Acara Peminjaman Barang',
            'konten' => 'bapb/bapb_form',
            'button' => 'Create',
            'action' => site_url('bapb/create_action'),
	    'id_bapb' => set_value('id_bapb'),
	    'nama1' => set_value('nama1'),
	    'nip1' => set_value('nip1'),
	    'jabatan1' => set_value('jabatan1'),
	    'nama2' => set_value('nama2'),
	    'nip2' => set_value('nip2'),
	    'jabatan2' => set_value('jabatan2'),
        'id_barang' => set_value('id_barang'),
	    'file' => set_value('file'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $file = upload_gambar_biasa('file', 'image/file/', 'pdf', 10000, 'file');

            $data = array(
		'nama1' => $this->input->post('nama1',TRUE),
		'nip1' => $this->input->post('nip1',TRUE),
		'jabatan1' => $this->input->post('jabatan1',TRUE),
		'nama2' => $this->input->post('nama2',TRUE),
		'nip2' => $this->input->post('nip2',TRUE),
		'jabatan2' => $this->input->post('jabatan2',TRUE),
        'id_barang' => $this->input->post('id_barang',TRUE),
		'file' => $file,
	    );

            $this->Bapb_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bapb'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bapb_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'Berita Acara Peminjaman Barang',
                'konten' => 'bapb/bapb_form',
                'button' => 'Update',
                'action' => site_url('bapb/update_action'),
		'id_bapb' => set_value('id_bapb', $row->id_bapb),
		'nama1' => set_value('nama1', $row->nama1),
		'nip1' => set_value('nip1', $row->nip1),
		'jabatan1' => set_value('jabatan1', $row->jabatan1),
		'nama2' => set_value('nama2', $row->nama2),
		'nip2' => set_value('nip2', $row->nip2),
		'jabatan2' => set_value('jabatan2', $row->jabatan2),
        'id_barang' => set_value('id_barang', $row->id_barang),
		'file' => set_value('file', $row->file),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bapb'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bapb', TRUE));
        } else {
            $data = array(
		'nama1' => $this->input->post('nama1',TRUE),
		'nip1' => $this->input->post('nip1',TRUE),
		'jabatan1' => $this->input->post('jabatan1',TRUE),
		'nama2' => $this->input->post('nama2',TRUE),
		'nip2' => $this->input->post('nip2',TRUE),
		'jabatan2' => $this->input->post('jabatan2',TRUE),
		'id_barang' => $retVal = ($_FILES['file']['name'] == '') ? $_POST['file_old'] : upload_gambar_biasa('file', 'image/file/', 'pdf', 10000, 'file'),
	    );

            $this->Bapb_model->update($this->input->post('id_bapb', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bapb'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bapb_model->get_by_id($id);

        if ($row) {
            $this->Bapb_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bapb'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bapb'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama1', 'nama1', 'trim|required');
	$this->form_validation->set_rules('nip1', 'nip1', 'trim|required');
	$this->form_validation->set_rules('jabatan1', 'jabatan1', 'trim|required');
	$this->form_validation->set_rules('nama2', 'nama2', 'trim|required');
	$this->form_validation->set_rules('nip2', 'nip2', 'trim|required');
	$this->form_validation->set_rules('jabatan2', 'jabatan2', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');

	$this->form_validation->set_rules('id_bapb', 'id_bapb', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bapb.php */
/* Location: ./application/controllers/Bapb.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2021-10-13 04:05:00 */
/* https://jualkoding.com */