<?php
class update_ctrl extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('update_model');
    }
    function show_site_id() {
        $id = $this->uri->segment(3);
        $data['sites'] = $this->update_model->show_sites();
        $data['single_student'] = $this->update_model->show_site_id($id);
        $this->load->view('grantschool_form_edit', $data);
    }
    function update_site_id() {
        $id= $this->input->post('did');
        $data = array(
            'Grant_Date' => $this->input->post('ddate'),
            'First_Name' => $this->input->post('dfname'),
            'Last_Name' => $this->input->post('dlname'),
            'Email' => $this->input->post('demail')
            'EID' => $this->input->post('deid'),
            'Phone' => $this->input->post('dphone'),

        );
        $this->update_model->update_student_id($id,$data);
        $this->show_site_id();
    }
}
?>