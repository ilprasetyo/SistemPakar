<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Penyakit extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('Penyakit_model');
            $this->load->library('form_validation');
	    $method=$this->router->fetch_method();
            // if($method != 'ajax_list'){
            //   if($this->session->userdata('status')!='login'){
            //     redirect(base_url('login'));
            //   }
            // }
        }

        public function index()
        {$datapenyakit=$this->Penyakit_model->getDataTable();//panggil ke modell
          $datafield=$this->Penyakit_model->get_field();//panggil ke modell

           $data = array(
             'content'=>'admin/penyakit/tb_m_penyakit_list',
             'sidebar'=>'admin/sidebar',
             'css'=>'admin/penyakit/css',
             'js'=>'admin/penyakit/js',
             'datapenyakit'=>$datapenyakit,
             'datafield'=>$datafield,
             'module'=>'admin',
             'titlePage'=>'penyakit',
             'controller'=>'penyakit'
            );
          $this->template->load($data);
        }

        //DataTable
        public function ajax_list()
      {
          $list = $this->Penyakit_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $Penyakit_model) {
              $no++;
              $row = array();
              $row[] = $no;
							$row[] = $Penyakit_model->Kode_Penyakit;
							$row[] = $Penyakit_model->Nama_Penyakit;
							$row[] = $Penyakit_model->Ciri;
							$row[] = $Penyakit_model->Solusi;
							$row[] = $Penyakit_model->Gambar;
							
              $row[] ="
              <a href='penyakit/edit/$Penyakit_model->id'><i class='m-1 feather icon-edit-2'></i></a>
              <a class='modalDelete' data-toggle='modal' data-target='#responsive-modal' value='$Penyakit_model->id' href='#'><i class='feather icon-trash'></i></a>";
              $data[] = $row;
          }

          $output = array(
                          "draw" => $_POST['draw'],
                          "recordsTotal" => $this->Penyakit_model->count_all(),
                          "recordsFiltered" => $this->Penyakit_model->count_filtered(),
                          "data" => $data,
                  );
          //output to json format
          echo json_encode($output);
      }


        public function create(){
           $data = array(
             'content'=>'admin/penyakit/tb_m_penyakit_create',
             'sidebar'=>'admin/sidebar',
             'action'=>'admin/penyakit/create_action',
             'module'=>'admin',
             'titlePage'=>'penyakit',
             'controller'=>'penyakit'
            );
          $this->template->load($data);
        }

        public function edit($id){
          $dataedit=$this->Penyakit_model->get_by_id($id);
           $data = array(
             'content'=>'admin/penyakit/tb_m_penyakit_edit',
             'sidebar'=>'admin/sidebar',
             'action'=>'admin/penyakit/update_action',
             'dataedit'=>$dataedit,
             'module'=>'admin',
             'titlePage'=>'penyakit',
             'controller'=>'penyakit'
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
					'Kode_Penyakit' => $this->input->post('Kode_Penyakit',TRUE),
					'Nama_Penyakit' => $this->input->post('Nama_Penyakit',TRUE),
					'Ciri' => $this->input->post('Ciri',TRUE),
					'Solusi' => $this->input->post('Solusi',TRUE),
					'Gambar' => $this->input->post('Gambar',TRUE),
					
);

            $this->Penyakit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/penyakit'));
        }
    }




    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
					'Kode_Penyakit' => $this->input->post('Kode_Penyakit',TRUE),
					'Nama_Penyakit' => $this->input->post('Nama_Penyakit',TRUE),
					'Ciri' => $this->input->post('Ciri',TRUE),
					'Solusi' => $this->input->post('Solusi',TRUE),
					'Gambar' => $this->input->post('Gambar',TRUE),
					
);

            $this->Penyakit_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/penyakit'));
        }
    }

    public function delete($id)
    {
        $row = $this->Penyakit_model->get_by_id($id);

        if ($row) {
            $this->Penyakit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/penyakit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penyakit'));
        }
    }

    public function _rules()
    {
$this->form_validation->set_rules('Kode_Penyakit', 'Kode_Penyakit', 'trim|required');
$this->form_validation->set_rules('Nama_Penyakit', 'Nama_Penyakit', 'trim|required');
$this->form_validation->set_rules('Ciri', 'Ciri', 'trim|required');
$this->form_validation->set_rules('Solusi', 'Solusi', 'trim|required');
$this->form_validation->set_rules('Gambar', 'Gambar', 'trim|required');


	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }

}