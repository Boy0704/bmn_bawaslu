<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permohonan_pinjam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permohonan_pinjam_model');
        $this->load->library('form_validation');
    }

    public function setuju($n,$id_pinjam)
    {
        $this->db->where('id_pinjam', $id_pinjam);
        $this->db->update('permohonan_pinjam', ['disetujui' => $n,'updated_at'=>get_waktu(),'id_user'=>$this->session->userdata('id_user')]);
        ?>
        <script type="text/javascript">
            alert("Berhasil diupdate !");
            window.location = "<?php echo base_url() ?>permohonan_pinjam";
        </script>
        <?php
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'permohonan_pinjam/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permohonan_pinjam/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permohonan_pinjam/index.html';
            $config['first_url'] = base_url() . 'permohonan_pinjam/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permohonan_pinjam_model->total_rows($q);
        $permohonan_pinjam = $this->Permohonan_pinjam_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permohonan_pinjam_data' => $permohonan_pinjam,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'Permohonan Peminjaman Barang',
            'konten' => 'permohonan_pinjam/permohonan_pinjam_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Permohonan_pinjam_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pinjam' => $row->id_pinjam,
		'nip' => $row->nip,
		'nama' => $row->nama,
		'id_barang' => $row->id_barang,
		'qty' => $row->qty,
		'keterangan' => $row->keterangan,
		'disetujui' => $row->disetujui,
	    );
            $this->load->view('permohonan_pinjam/permohonan_pinjam_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan_pinjam'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'Permohonan Peminjaman Barang',
            'konten' => 'permohonan_pinjam/permohonan_pinjam_form',
            'button' => 'Create',
            'action' => site_url('permohonan_pinjam/create_action'),
	    'id_pinjam' => set_value('id_pinjam'),
	    'nip' => set_value('nip'),
	    'nama' => set_value('nama'),
	    'id_barang' => set_value('id_barang'),
	    'qty' => set_value('qty'),
	    'keterangan' => set_value('keterangan'),
	    'disetujui' => set_value('disetujui'),
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
		'nip' => $this->input->post('nip',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'created_at' => get_waktu(),
        'id_user' => $this->session->userdata('id_user')
	    );

            $this->Permohonan_pinjam_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('permohonan_pinjam'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permohonan_pinjam_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'Permohonan Peminjaman Barang',
                'konten' => 'permohonan_pinjam/permohonan_pinjam_form',
                'button' => 'Update',
                'action' => site_url('permohonan_pinjam/update_action'),
		'id_pinjam' => set_value('id_pinjam', $row->id_pinjam),
		'nip' => set_value('nip', $row->nip),
		'nama' => set_value('nama', $row->nama),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'qty' => set_value('qty', $row->qty),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'disetujui' => set_value('disetujui', $row->disetujui),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan_pinjam'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pinjam', TRUE));
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'updated_at' => get_waktu(),
        'id_user' => $this->session->userdata('id_user')
	    );

            $this->Permohonan_pinjam_model->update($this->input->post('id_pinjam', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permohonan_pinjam'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permohonan_pinjam_model->get_by_id($id);

        if ($row) {
            $this->Permohonan_pinjam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permohonan_pinjam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permohonan_pinjam'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_pinjam', 'id_pinjam', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Permohonan_pinjam.php */
/* Location: ./application/controllers/Permohonan_pinjam.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2021-10-14 10:38:41 */
/* https://jualkoding.com */