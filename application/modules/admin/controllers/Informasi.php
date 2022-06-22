<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_model');
        $this->load->library('form_validation');
        $method = $this->router->fetch_method();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $datainformasi = $this->Informasi_model->getDataTable(); //panggil ke modell
        $datafield = $this->Informasi_model->get_field(); //panggil ke modell

        $data = array(
            'content' => 'admin/informasi/tb_m_informasi_list',
            'sidebar' => 'admin/sidebar',
            'css' => 'admin/informasi/css',
            'js' => 'admin/informasi/js',
            'datainformasi' => $datainformasi,
            'datafield' => $datafield,
            'module' => 'admin',
            'titlePage' => 'informasi',
            'controller' => 'informasi'
        );
        $this->template->load($data);
    }

    //DataTable
    public function ajax_list()
    {
        $list = $this->Informasi_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $Informasi_model) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $Informasi_model->perawatan;

            $row[] = "
              <a href='informasi/edit/$Informasi_model->id'><i class='m-1 feather icon-edit-2'></i></a>
              <a class='modalDelete' data-toggle='modal' data-target='#responsive-modal' value='$Informasi_model->id' href='#'><i class='feather icon-trash'></i></a>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Informasi_model->count_all(),
            "recordsFiltered" => $this->Informasi_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function create()
    {
        $data = array(
            'content' => 'admin/informasi/tb_m_informasi_create',
            'sidebar' => 'admin/sidebar',
            'action' => 'admin/informasi/create_action',
            'module' => 'admin',
            'titlePage' => 'informasi',
            'controller' => 'informasi'
        );
        $this->template->load($data);
    }

    public function edit($id)
    {
        $dataedit = $this->Informasi_model->get_by_id($id);
        $data = array(
            'content' => 'admin/informasi/tb_m_informasi_edit',
            'sidebar' => 'admin/sidebar',
            'action' => 'admin/informasi/update_action',
            'dataedit' => $dataedit,
            'module' => 'admin',
            'titlePage' => 'informasi',
            'controller' => 'informasi'
        );
        $this->template->load($data);
    }
    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'perawatan' => $this->input->post('perawatan', TRUE),

            );

            $this->Informasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/informasi'));
        }
    }




    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
                'perawatan' => $this->input->post('perawatan', TRUE),

            );

            $this->Informasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/informasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Informasi_model->get_by_id($id);

        if ($row) {
            $this->Informasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/informasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/informasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('perawatan', 'perawatan', 'trim|required');


        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
