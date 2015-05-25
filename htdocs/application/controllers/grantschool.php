<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grantschool extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('school', '', TRUE);
        $this->load->model('site');
        $this->load->library('pagination');

    }

    public function index() {
        $this->load->helper('url');
        $this->load->view('bootstrap/header');
        $this->load->library('table');
        $grantschools = array();
        $this->load->model(array('Site', 'School'));
        $sites = $this->Site->get();
        foreach ($sites as $site) {
            $school = new School();
            $school->load($site->school_id);
            $grantschools[] = array(
//                $school->school_name,
                $site->site_number,
                $site->site_date_school,
//                $site->site_logo ? 'Y' : 'N',
                $site->fname,
                $site->lname,
                $site->email,
                $site->eid,
                $site->phone,
                anchor ('grantschool/view/' . $site->site_id, '<img src="/img/view.png" >') . ' | ' .
                anchor ('grantschool/edit/' . $site->site_id, '<img src="/img/edit.png" >') . ' | ' .
                anchor ('grantschool/delete/' . $site->site_id, '<img src="/img/delete.png" >'),
            );
        }
        $this->load->view('Grantschools', array(
            'grantschools' => $grantschools,
        ));
    }



    public function add() {
        $config =array(
            'upload_path' => 'upload',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 500,
            'max_width' => 1920,
            'max_height' => 1080,
        );
        $this->load->library('upload', $config);

        $this->load->helper('form');
        $this->load->view('bootstrap/header');
        // Populate schools.
        $this->load->model('School');
        $schools = $this->School->get();
        $school_form_options = array();
        foreach ($schools as $id => $school) {
            $school_form_options[$id] = $school->school_name;
        }
        // Validation.
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
           array(
               'field' => 'school_id',
               'label' => 'School',
               'rules' => 'required',
           ),
           array(
               'field' => 'site_number',
               'label' => 'Site number',
           ),
           array(
               'field' => 'site_date_school',
               'label' => 'School date',
               'rules' => 'required|callback_date_validation',
           ),
        ));
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $check_file_upload = FALSE;
        IF (isset($_FILES['site_logo']['error']) && $_FILES['site_logo']['error'] != 4){
            $check_file_upload = TRUE;
        }
        if (!$this->form_validation->run()|| ($check_file_upload && !$this->upload->do_upload ('site_logo'))) {
            $this->load->view('grantschool_form', array(
                'school_form_options' => $school_form_options,
            ));
        }
        else {
            $this->load->model('Site');
            $site = new Site();
            $site->school_id = $this->input->post('school_id');
            $site->site_number = $this->input->post('site_number');
            $site->site_date_school = $this->input->post('site_date_school');
            $upload_data = $this->upload->data();
            if (isset($upload_data['file_name'])){
                $site->site_logo = $upload_data['file_name'];
            }
            $site->save();
            $this->load->view('grantschool_form_success', array(
                'site' => $site,
            ));
        }
    }
    

    public function date_validation($input) {
        $test_date = explode('-', $input);
        if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
            $this->form_validation->set_message('date_validation', 'The %s field must be in YYYY-MM-DD format.');
            return FALSE;
        }
        return TRUE;
    }

    public function view($site_id){
        $this->load->helper('html');
        $this->load->view('bootstrap/header');
        $this->load->model(array('Site', 'School'));

        $site = new Site();
        $site->load($site_id);
        if (!$site->site_id){
            show_404();
        }
        $school = new School();
        $school->load($site->school_id);
        $this->load->view('grantschool', array(
            'site' => $site,
            'school' => $school
        ));
    }

    public function edit($site_id){
        $data["schooltypes"] = $this->school->get_types();
        $data["school"] = $this->school->get_site($site_id);
        $this->load->view('bootstrap/header');
        $this->load->view('grantschool_form_edit', $data);
    }


    public function delete($site_id) {
        $this->load->view('bootstrap/header');
        $this->load->model(array('Site'));
        $site = new Site();
        $site->load($site_id);
        if (!$site->site_id){
            show_404();
        }
        $site->delete();
        $this->load->view('grantschool_deleted', array(
            'site_id' => $site_id,
        ));
    }
}