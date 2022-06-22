<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gejala extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gejala_model');
        $this->load->library('form_validation');
        $method = $this->router->fetch_method();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $datagejala = $this->Gejala_model->getDataTable(); //panggil ke modell
        $datafield = $this->Gejala_model->get_field(); //panggil ke modell

        $data = array(
            'content' => 'admin/gejala/tb_m_gejala_list',
            'sidebar' => 'admin/sidebar',
            'css' => 'admin/gejala/css',
            'js' => 'admin/gejala/js',
            'datagejala' => $datagejala,
            'datafield' => $datafield,
            'module' => 'admin',
            'titlePage' => 'gejala',
            'controller' => 'gejala'
        );
        $this->template->load($data);
    }

    //DataTable
    public function ajax_list()
    {
        $list = $this->Gejala_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $Gejala_model) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $Gejala_model->Kode_Gejala;
            $row[] = $Gejala_model->Nama_Gejala;
            $row[] = $Gejala_model->Bobot;

            $row[] = "
              <a href='gejala/edit/$Gejala_model->id'><i class='m-1 feather icon-edit-2'></i></a>
              <a class='modalDelete' data-toggle='modal' data-target='#responsive-modal' value='$Gejala_model->id' href='#'><i class='feather icon-trash'></i></a>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gejala_model->count_all(),
            "recordsFiltered" => $this->Gejala_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function create()
    {
        $data = array(
            'content' => 'admin/gejala/tb_m_gejala_create',
            'sidebar' => 'admin/sidebar',
            'action' => 'admin/gejala/create_action',
            'module' => 'admin',
            'titlePage' => 'gejala',
            'controller' => 'gejala'
        );
        $this->template->load($data);
    }

    public function edit($id)
    {
        $dataedit = $this->Gejala_model->get_by_id($id);
        $data = array(
            'content' => 'admin/gejala/tb_m_gejala_edit',
            'sidebar' => 'admin/sidebar',
            'action' => 'admin/gejala/update_action',
            'dataedit' => $dataedit,
            'module' => 'admin',
            'titlePage' => 'gejala',
            'controller' => 'gejala'
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
                'Kode_Gejala' => $this->input->post('Kode_Gejala', TRUE),
                'Nama_Gejala' => $this->input->post('Nama_Gejala', TRUE),
                'Bobot' => $this->input->post('Bobot', TRUE),

            );

            $this->Gejala_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/gejala'));
        }
    }




    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
                'Kode_Gejala' => $this->input->post('Kode_Gejala', TRUE),
                'Nama_Gejala' => $this->input->post('Nama_Gejala', TRUE),
                'Bobot' => $this->input->post('Bobot', TRUE),

            );

            $this->Gejala_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/gejala'));
        }
    }

    public function delete($id)
    {
        $row = $this->Gejala_model->get_by_id($id);

        if ($row) {
            $this->Gejala_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/gejala'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/gejala'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Kode_Gejala', 'Kode_Gejala', 'trim|required');
        $this->form_validation->set_rules('Nama_Gejala', 'Nama_Gejala', 'trim|required');
        $this->form_validation->set_rules('Bobot', 'Bobot', 'trim|required');


        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
