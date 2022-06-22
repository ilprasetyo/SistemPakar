<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perawatan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perawatan_model');
        $this->load->library('form_validation');
        $method = $this->router->fetch_method();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $dataperawatan = $this->Perawatan_model->getDataTable(); //panggil ke modell
        $datafield = $this->Perawatan_model->get_field(); //panggil ke modell

        $data = array(
            'content' => 'admin/perawatan/tb_m_perawatan_list',
            'sidebar' => 'admin/sidebar',
            'css' => 'admin/perawatan/css',
            'js' => 'admin/perawatan/js',
            'dataperawatan' => $dataperawatan,
            'datafield' => $datafield,
            'module' => 'admin',
            'titlePage' => 'perawatan',
            'controller' => 'perawatan'
        );
        $this->template->load($data);
    }

    //DataTable
    public function ajax_list()
    {
        $list = $this->Perawatan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $Perawatan_model) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $Perawatan_model->perawatan;

            $row[] = "
              <a href='perawatan/edit/$Perawatan_model->id'><i class='m-1 feather icon-edit-2'></i></a>
              <a class='modalDelete' data-toggle='modal' data-target='#responsive-modal' value='$Perawatan_model->id' href='#'><i class='feather icon-trash'></i></a>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Perawatan_model->count_all(),
            "recordsFiltered" => $this->Perawatan_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function create()
    {
        $data = array(
            'content' => 'admin/perawatan/tb_m_perawatan_create',
            'sidebar' => 'admin/sidebar',
            'action' => 'admin/perawatan/create_action',
            'module' => 'admin',
            'titlePage' => 'perawatan',
            'controller' => 'perawatan'
        );
        $this->template->load($data);
    }

    public function edit($id)
    {
        $dataedit = $this->Perawatan_model->get_by_id($id);
        $data = array(
            'content' => 'admin/perawatan/tb_m_perawatan_edit',
            'sidebar' => 'admin/sidebar',
            'action' => 'admin/perawatan/update_action',
            'dataedit' => $dataedit,
            'module' => 'admin',
            'titlePage' => 'perawatan',
            'controller' => 'perawatan'
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

            $this->Perawatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/perawatan'));
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

            $this->Perawatan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/perawatan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Perawatan_model->get_by_id($id);

        if ($row) {
            $this->Perawatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/perawatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/perawatan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('perawatan', 'perawatan', 'trim|required');


        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
