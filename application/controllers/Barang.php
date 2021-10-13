<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'barang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'barang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'barang/index.html';
            $config['first_url'] = base_url() . 'barang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Barang_model->total_rows($q);
        $barang = $this->Barang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barang_data' => $barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'barang/barang_list',
            'konten' => 'barang/barang_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'kode_barang' => $row->kode_barang,
		'nama_barang' => $row->nama_barang,
		'tahun_perolehan' => $row->tahun_perolehan,
		'nup' => $row->nup,
		'merk' => $row->merk,
		'qty' => $row->qty,
		'satuan' => $row->satuan,
		'harga_satuan' => $row->harga_satuan,
		'harga_barang' => $row->harga_barang,
		'kondisi_barang' => $row->kondisi_barang,
	    );
            $this->load->view('barang/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'barang/barang_form',
            'konten' => 'barang/barang_form',
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'kode_barang' => set_value('kode_barang'),
	    'nama_barang' => set_value('nama_barang'),
	    'tahun_perolehan' => set_value('tahun_perolehan'),
	    'nup' => set_value('nup'),
	    'merk' => set_value('merk'),
	    'qty' => set_value('qty'),
	    'satuan' => set_value('satuan'),
	    'harga_satuan' => set_value('harga_satuan'),
	    'harga_barang' => set_value('harga_barang'),
	    'kondisi_barang' => set_value('kondisi_barang'),
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
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'tahun_perolehan' => $this->input->post('tahun_perolehan',TRUE),
		'nup' => $this->input->post('nup',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'harga_barang' => $this->input->post('harga_barang',TRUE),
		'kondisi_barang' => $this->input->post('kondisi_barang',TRUE),
	    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'barang/barang_form',
                'konten' => 'barang/barang_form',
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'tahun_perolehan' => set_value('tahun_perolehan', $row->tahun_perolehan),
		'nup' => set_value('nup', $row->nup),
		'merk' => set_value('merk', $row->merk),
		'qty' => set_value('qty', $row->qty),
		'satuan' => set_value('satuan', $row->satuan),
		'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
		'harga_barang' => set_value('harga_barang', $row->harga_barang),
		'kondisi_barang' => set_value('kondisi_barang', $row->kondisi_barang),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'tahun_perolehan' => $this->input->post('tahun_perolehan',TRUE),
		'nup' => $this->input->post('nup',TRUE),
		'merk' => $this->input->post('merk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'harga_barang' => $this->input->post('harga_barang',TRUE),
		'kondisi_barang' => $this->input->post('kondisi_barang',TRUE),
	    );

            $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('tahun_perolehan', 'tahun perolehan', 'trim|required');
	$this->form_validation->set_rules('nup', 'nup', 'trim|required');
	$this->form_validation->set_rules('merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
	$this->form_validation->set_rules('harga_barang', 'harga barang', 'trim|required');
	$this->form_validation->set_rules('kondisi_barang', 'kondisi barang', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2021-10-13 04:04:37 */
/* https://jualkoding.com */