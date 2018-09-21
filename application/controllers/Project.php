<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct() {
        
        parent::__construct();

        $this->check_isvalidated();
    }

	public function index(){

        $data['s_all'] = $this->session->all_userdata();

        //$is_login = $this->akmet_auth->getFieldById('is_login', 'users', 'user_name', $data['s_all']['user_name']);
        //echo $is_login;
        //$this->load->view('welcome_message', $data);

        //$this->check_users_detail($data['s_all']['user_id']);
        // $data['info'] = $this->m_model->select_all_row("*","info", "ORDER BY id DESC LIMIT 1");

        // echo strtoupper($data['s_all']['user_name']);

        if ($data['s_all']['user_role']==2) {

            $data = array(
                            'user_created' => $data['s_all']['user_id'],
                            'date_created' => date("Y-m-d H:i:s"),
                    );

            $this->m_model->insert("project", $data);

            // $data['title'] = "SIPROPOS - Eror Page";
            // $data['isi'] = "403";
            // $data['js_footer'] = "";

            // $this->load->view('v_template', $data);

            $project_id = $this->m_model->last_id("project", "id");

            redirect(base_url().'project/step01/'.$project_id['id'], 'refresh');

        } else {
            redirect(base_url().'home', 'refresh');            
        }
	}

    public function step01($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        $project_code = date("Y")."-".strtoupper($data['s_all']['user_name'])."-".sprintf("%'.04d\n", $project_id);

        $data1 = array(
                        'id' => $project_id,
                        'project_code' => $project_code,
                );
        
        $this->m_model->edit("project", 'id', $data1);

        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Project Step 1";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['status']!=100) {

                $data['isi'] = "v_project_step01";
                $data['js_footer'] = "v_project_step01_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function step01_action(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_step01();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('project_title')),
                        'type' => $this->security->xss_clean($this->input->post('project_type')),
                        'cooperation_area' => $this->security->xss_clean($this->input->post('cooperation_area')),
                        'relevance' => $this->security->xss_clean($this->input->post('relevance')),
                        'ra_name' => $this->security->xss_clean($this->input->post('ra_name')),
                        'ra_title' => $this->security->xss_clean($this->input->post('ra_title')),
                        'ra_address' => $this->security->xss_clean($this->input->post('ra_address')),
                        'ra_phone' => $this->security->xss_clean($this->input->post('ra_phone')),
                        'ra_fax' => $this->security->xss_clean($this->input->post('ra_fax')),
                        'ra_email' => $this->security->xss_clean($this->input->post('ra_email')),
                        'cp_name' => $this->security->xss_clean($this->input->post('cp_name')),
                        'cp_title' => $this->security->xss_clean($this->input->post('cp_title')),
                        'cp_address' => $this->security->xss_clean($this->input->post('cp_address')),
                        'cp_phone' => $this->security->xss_clean($this->input->post('cp_phone')),
                        'cp_fax' => $this->security->xss_clean($this->input->post('cp_fax')),
                        'cp_email' => $this->security->xss_clean($this->input->post('cp_email')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                );
        
        $this->m_model->edit("project", 'id', $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_step01(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('project_title') == '')
        {
            $data['inputerror'][] = 'project_title';
            $data['error_string'][] = 'Project Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('project_type') == '')
        {
            $data['inputerror'][] = 'project_type';
            $data['error_string'][] = 'Tipe Project harus dipilih';
            $data['status'] = FALSE;
        }

        if($this->input->post('cooperation_area') == '')
        {
            $data['inputerror'][] = 'cooperation_area';
            $data['error_string'][] = 'Tipe Project harus dipilih';
            $data['status'] = FALSE;
        }

        if($this->input->post('relevance') == '')
        {
            $data['inputerror'][] = 'relevance';
            $data['error_string'][] = 'Tipe Project harus dipilih';
            $data['status'] = FALSE;
        }

        if($this->input->post('ra_name') == '')
        {
            $data['inputerror'][] = 'ra_name';
            $data['error_string'][] = 'Nama harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ra_title') == '')
        {
            $data['inputerror'][] = 'ra_title';
            $data['error_string'][] = 'Gelar depan harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ra_address') == '')
        {
            $data['inputerror'][] = 'ra_address';
            $data['error_string'][] = 'Alamat harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ra_phone') == '')
        {
            $data['inputerror'][] = 'ra_phone';
            $data['error_string'][] = 'Telepon harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ra_fax') == '')
        {
            $data['inputerror'][] = 'ra_fax';
            $data['error_string'][] = 'Fax harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ra_email') == '')
        {
            $data['inputerror'][] = 'ra_email';
            $data['error_string'][] = 'Email harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('cp_name') == '')
        {
            $data['inputerror'][] = 'cp_name';
            $data['error_string'][] = 'Nama harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('cp_title') == '')
        {
            $data['inputerror'][] = 'cp_title';
            $data['error_string'][] = 'Gelar depan harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('cp_address') == '')
        {
            $data['inputerror'][] = 'cp_address';
            $data['error_string'][] = 'Alamat harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('cp_phone') == '')
        {
            $data['inputerror'][] = 'cp_phone';
            $data['error_string'][] = 'Telepon harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('cp_fax') == '')
        {
            $data['inputerror'][] = 'cp_fax';
            $data['error_string'][] = 'Fax harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('cp_email') == '')
        {
            $data['inputerror'][] = 'cp_email';
            $data['error_string'][] = 'Email harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('duration') == '')
        {
            $data['inputerror'][] = 'duration';
            $data['error_string'][] = 'Durasi harus dipilih';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function step02($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        $data0 = array(
                        'id' => $project_id,
                        'status' => 1,
                );

        $this->m_model->edit("project", 'id', $data0);

        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $partner = $this->m_model->select_all("project_partner", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($partner);

        $data['partner'] = $partner;

        $data['title'] = "SIPROPOS - Project Step 2";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['status']!=100) {

                $data['isi'] = "v_project_step02";
                $data['js_footer'] = "v_project_step02_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_partner(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_partner();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'country' => $this->security->xss_clean($this->input->post('country')),
                        'reason' => $this->security->xss_clean($this->input->post('reason')),
                );
        
        $this->m_model->insert("project_partner", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_partner(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('country') == '')
        {
            $data['inputerror'][] = 'country';
            $data['error_string'][] = 'Country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('reason') == '')
        {
            $data['inputerror'][] = 'reason';
            $data['error_string'][] = 'Alasan harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_partner($id){
        $data = $this->m_model->detail_row("project_partner", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_partner(){
        $this->form_validate_add_partner();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'country' => $this->security->xss_clean($this->input->post('country')),
                        'reason' => $this->security->xss_clean($this->input->post('reason')),
                );
        $this->m_model->edit("project_partner", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_partner($id){

        $this->m_model->delete("project_partner", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step03($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $partner = $this->m_model->select_all("project_partner", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($partner);

        $data['partner'] = $partner;

        $data['title'] = "SIPROPOS - Project Step 3";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['status']!=100) {

                $data['isi'] = "v_project_step03";
                $data['js_footer'] = "v_project_step03_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function step03_action(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_step03();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'overall_objective' => $this->security->xss_clean($this->input->post('overall_objective')),
                        'project_purpose' => $this->security->xss_clean($this->input->post('project_purpose')),
                        'target_group' => $this->security->xss_clean($this->input->post('target_group')),
                        'contribution' => $this->security->xss_clean($this->input->post('contribution')),
                );
        
        $this->m_model->edit("project", 'id', $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_step03(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('overall_objective') == '')
        {
            $data['inputerror'][] = 'overall_objective';
            $data['error_string'][] = 'Overall Objectives harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('project_purpose') == '')
        {
            $data['inputerror'][] = 'project_purpose';
            $data['error_string'][] = 'Project Purpose harus dipilih';
            $data['status'] = FALSE;
        }

        if($this->input->post('target_group') == '')
        {
            $data['inputerror'][] = 'target_group';
            $data['error_string'][] = 'Target Group harus dipilih';
            $data['status'] = FALSE;
        }

        if($this->input->post('contribution') == '')
        {
            $data['inputerror'][] = 'contribution';
            $data['error_string'][] = 'Contribution harus dipilih';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function step04($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Project Step 2";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step04";
                $data['js_footer'] = "v_project_step04_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function step04_action(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_step04();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'ab_jumlah_training' => $this->security->xss_clean($this->input->post('ab_jumlah_training')),
                        'ab_jumlah_workshop' => $this->security->xss_clean($this->input->post('ab_jumlah_workshop')),
                        'ab_jumlah_study_visit' => $this->security->xss_clean($this->input->post('ab_jumlah_study_visit')),
                        'ab_jumlah_seminar' => $this->security->xss_clean($this->input->post('ab_jumlah_seminar')),
                        'ab_jumlah_meeting' => $this->security->xss_clean($this->input->post('ab_jumlah_meeting')),
                        'ab_jumlah_media' => $this->security->xss_clean($this->input->post('ab_jumlah_media')),
                        'ab_jumlah_other_activities' => $this->security->xss_clean($this->input->post('ab_jumlah_other_activities')),
                );
        
        $this->m_model->edit("project", 'id', $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_step04(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('ab_jumlah_training') == '')
        {
            $data['inputerror'][] = 'ab_jumlah_training';
            $data['error_string'][] = 'Jumlah Seminar harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ab_jumlah_workshop') == '')
        {
            $data['inputerror'][] = 'ab_jumlah_workshop';
            $data['error_string'][] = 'Jumlah Workshop harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ab_jumlah_study_visit') == '')
        {
            $data['inputerror'][] = 'ab_jumlah_study_visit';
            $data['error_string'][] = 'Jumlah Study Visit Harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ab_jumlah_seminar') == '')
        {
            $data['inputerror'][] = 'ab_jumlah_seminar';
            $data['error_string'][] = 'Jumlah Seminar harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ab_jumlah_meeting') == '')
        {
            $data['inputerror'][] = 'ab_jumlah_meeting';
            $data['error_string'][] = 'Jumlah Meeting harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ab_jumlah_media') == '')
        {
            $data['inputerror'][] = 'ab_jumlah_media';
            $data['error_string'][] = 'Jumlah Media harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ab_jumlah_other_activities') == '')
        {
            $data['inputerror'][] = 'ab_jumlah_other_activities';
            $data['error_string'][] = 'Jumlah other activity harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function step041($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $training = $this->m_model->select_all("project_training", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['training'] = $training;

        $data['title'] = "SIPROPOS - Training";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step041";
                $data['js_footer'] = "v_project_step041_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_training(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_training();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'trainer' => $this->security->xss_clean($this->input->post('trainer')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'detail' => $this->security->xss_clean($this->input->post('detail')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        
        $this->m_model->insert("project_training", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_training(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Deskripsi harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('countries') == '')
        {
            $data['inputerror'][] = 'countries';
            $data['error_string'][] = 'Country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant') == '')
        {
            $data['inputerror'][] = 'participant';
            $data['error_string'][] = 'Total participant per country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant_total') == '')
        {
            $data['inputerror'][] = 'participant_total';
            $data['error_string'][] = 'Total participant harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('trainer') == '')
        {
            $data['inputerror'][] = 'trainer';
            $data['error_string'][] = 'Total trainer harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('duration') == '')
        {
            $data['inputerror'][] = 'duration';
            $data['error_string'][] = 'Total duration harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('location') == '')
        {
            $data['inputerror'][] = 'location';
            $data['error_string'][] = 'Location harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('days') == '')
        {
            $data['inputerror'][] = 'days';
            $data['error_string'][] = 'Total days harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ticket') == '')
        {
            $data['inputerror'][] = 'ticket';
            $data['error_string'][] = 'Jumlah roundtrip ticket harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('detail') == '')
        {
            $data['inputerror'][] = 'detail';
            $data['error_string'][] = 'Detail harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('budget') == '')
        {
            $data['inputerror'][] = 'budget';
            $data['error_string'][] = 'Budget harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_training($id){
        $data = $this->m_model->detail_row("project_training", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_training(){
        $this->form_validate_add_training();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'trainer' => $this->security->xss_clean($this->input->post('trainer')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'detail' => $this->security->xss_clean($this->input->post('detail')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        $this->m_model->edit("project_training", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_training($id){

        $this->m_model->delete("project_training", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step042($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $workshop = $this->m_model->select_all("project_workshop", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['workshop'] = $workshop;

        $data['title'] = "SIPROPOS - Workshop";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step042";
                $data['js_footer'] = "v_project_step042_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_workshop(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_workshop();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'output' => $this->security->xss_clean($this->input->post('output')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        
        $this->m_model->insert("project_workshop", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_workshop(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Deskripsi harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('countries') == '')
        {
            $data['inputerror'][] = 'countries';
            $data['error_string'][] = 'Country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant') == '')
        {
            $data['inputerror'][] = 'participant';
            $data['error_string'][] = 'Total participant per country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant_total') == '')
        {
            $data['inputerror'][] = 'participant_total';
            $data['error_string'][] = 'Total participant harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('duration') == '')
        {
            $data['inputerror'][] = 'duration';
            $data['error_string'][] = 'Total duration harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('location') == '')
        {
            $data['inputerror'][] = 'location';
            $data['error_string'][] = 'Location harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('days') == '')
        {
            $data['inputerror'][] = 'days';
            $data['error_string'][] = 'Total days harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ticket') == '')
        {
            $data['inputerror'][] = 'ticket';
            $data['error_string'][] = 'Jumlah roundtrip ticket harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('output') == '')
        {
            $data['inputerror'][] = 'output';
            $data['error_string'][] = 'Output harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('budget') == '')
        {
            $data['inputerror'][] = 'budget';
            $data['error_string'][] = 'Budget harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_workshop($id){
        $data = $this->m_model->detail_row("project_workshop", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_workshop(){
        $this->form_validate_add_workshop();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'output' => $this->security->xss_clean($this->input->post('output')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        $this->m_model->edit("project_workshop", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_workshop($id){

        $this->m_model->delete("project_workshop", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step043($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $study_visit = $this->m_model->select_all("project_study_visit", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['study_visit'] = $study_visit;

        $data['title'] = "SIPROPOS - Study Visit";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step043";
                $data['js_footer'] = "v_project_step043_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_study_visit(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_study_visit();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'related_training' => $this->security->xss_clean($this->input->post('related_training')),
                        'contribution' => $this->security->xss_clean($this->input->post('contribution')),
                        'destination' => $this->security->xss_clean($this->input->post('destination')),
                        'personel' => $this->security->xss_clean($this->input->post('personel')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        
        $this->m_model->insert("project_study_visit", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_study_visit(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Deskripsi harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('related_training') == '')
        {
            $data['inputerror'][] = 'related_training';
            $data['error_string'][] = 'Related training harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('contribution') == '')
        {
            $data['inputerror'][] = 'contribution';
            $data['error_string'][] = 'Contribution harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('destination') == '')
        {
            $data['inputerror'][] = 'destination';
            $data['error_string'][] = 'Destination harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('personel') == '')
        {
            $data['inputerror'][] = 'personel';
            $data['error_string'][] = 'Personel harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('duration') == '')
        {
            $data['inputerror'][] = 'duration';
            $data['error_string'][] = 'Duration harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ticket') == '')
        {
            $data['inputerror'][] = 'ticket';
            $data['error_string'][] = 'Jumlah roundtrip ticket harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('days') == '')
        {
            $data['inputerror'][] = 'days';
            $data['error_string'][] = 'Total days harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('budget') == '')
        {
            $data['inputerror'][] = 'budget';
            $data['error_string'][] = 'Budget harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_study_visit($id){
        $data = $this->m_model->detail_row("project_study_visit", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_study_visit(){
        $this->form_validate_add_study_visit();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'related_training' => $this->security->xss_clean($this->input->post('related_training')),
                        'contribution' => $this->security->xss_clean($this->input->post('contribution')),
                        'destination' => $this->security->xss_clean($this->input->post('destination')),
                        'personel' => $this->security->xss_clean($this->input->post('personel')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        $this->m_model->edit("project_study_visit", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_study_visit($id){

        $this->m_model->delete("project_study_visit", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }


    public function step044($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $seminar = $this->m_model->select_all("project_seminar", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['seminar'] = $seminar;

        $data['title'] = "SIPROPOS - Conference / Seminar";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step044";
                $data['js_footer'] = "v_project_step044_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_seminar(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_seminar();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'speakers' => $this->security->xss_clean($this->input->post('speakers')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'detail' => $this->security->xss_clean($this->input->post('detail')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        
        $this->m_model->insert("project_seminar", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_seminar(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Deskripsi harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('speakers') == '')
        {
            $data['inputerror'][] = 'speakers';
            $data['error_string'][] = 'Speakers harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('countries') == '')
        {
            $data['inputerror'][] = 'countries';
            $data['error_string'][] = 'Country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant') == '')
        {
            $data['inputerror'][] = 'participant';
            $data['error_string'][] = 'Total participant per country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant_total') == '')
        {
            $data['inputerror'][] = 'participant_total';
            $data['error_string'][] = 'Total participant harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('duration') == '')
        {
            $data['inputerror'][] = 'duration';
            $data['error_string'][] = 'Total duration harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('location') == '')
        {
            $data['inputerror'][] = 'location';
            $data['error_string'][] = 'Location harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('days') == '')
        {
            $data['inputerror'][] = 'days';
            $data['error_string'][] = 'Total days harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ticket') == '')
        {
            $data['inputerror'][] = 'ticket';
            $data['error_string'][] = 'Jumlah roundtrip ticket harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('detail') == '')
        {
            $data['inputerror'][] = 'detail';
            $data['error_string'][] = 'Detail harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('budget') == '')
        {
            $data['inputerror'][] = 'budget';
            $data['error_string'][] = 'Budget harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_seminar($id){
        $data = $this->m_model->detail_row("project_seminar", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_seminar(){
        $this->form_validate_add_seminar();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'speakers' => $this->security->xss_clean($this->input->post('speakers')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'days' => $this->security->xss_clean($this->input->post('days')),
                        'ticket' => $this->security->xss_clean($this->input->post('ticket')),
                        'detail' => $this->security->xss_clean($this->input->post('detail')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        $this->m_model->edit("project_seminar", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_seminar($id){

        $this->m_model->delete("project_seminar", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step045($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $meeting = $this->m_model->select_all("project_meeting", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['meeting'] = $meeting;

        $data['title'] = "SIPROPOS - Publicity Meeting";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step045";
                $data['js_footer'] = "v_project_step045_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_meeting(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_meeting();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant_profile' => $this->security->xss_clean($this->input->post('participant_profile')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'tools_material' => $this->security->xss_clean($this->input->post('tools_material')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        
        $this->m_model->insert("project_meeting", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_meeting(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Deskripsi harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('countries') == '')
        {
            $data['inputerror'][] = 'countries';
            $data['error_string'][] = 'Country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant_profile') == '')
        {
            $data['inputerror'][] = 'participant_profile';
            $data['error_string'][] = 'Profile harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant') == '')
        {
            $data['inputerror'][] = 'participant';
            $data['error_string'][] = 'Total participant per country harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('participant_total') == '')
        {
            $data['inputerror'][] = 'participant_total';
            $data['error_string'][] = 'Total participant harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('tools_material') == '')
        {
            $data['inputerror'][] = 'tools_material';
            $data['error_string'][] = 'Tools and material harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('duration') == '')
        {
            $data['inputerror'][] = 'duration';
            $data['error_string'][] = 'Total duration harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('location') == '')
        {
            $data['inputerror'][] = 'location';
            $data['error_string'][] = 'Location harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('budget') == '')
        {
            $data['inputerror'][] = 'budget';
            $data['error_string'][] = 'Budget harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_meeting($id){
        $data = $this->m_model->detail_row("project_meeting", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_meeting(){
        $this->form_validate_add_meeting();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'countries' => $this->security->xss_clean($this->input->post('countries')),
                        'participant_profile' => $this->security->xss_clean($this->input->post('participant_profile')),
                        'participant' => $this->security->xss_clean($this->input->post('participant')),
                        'participant_total' => $this->security->xss_clean($this->input->post('participant_total')),
                        'tools_material' => $this->security->xss_clean($this->input->post('tools_material')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'location' => $this->security->xss_clean($this->input->post('location')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        $this->m_model->edit("project_meeting", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_meeting($id){

        $this->m_model->delete("project_meeting", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step046($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $media = $this->m_model->select_all("project_media", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['media'] = $media;

        $data['title'] = "SIPROPOS - Promotional Material";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step046";
                $data['js_footer'] = "v_project_step046_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_media(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_media();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'promotional' => $this->security->xss_clean($this->input->post('promotional')),
                        'potential' => $this->security->xss_clean($this->input->post('potential')),
                        'target_group' => $this->security->xss_clean($this->input->post('target_group')),
                        'ways_mean' => $this->security->xss_clean($this->input->post('ways_mean')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        
        $this->m_model->insert("project_media", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_media(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Deskripsi harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('promotional') == '')
        {
            $data['inputerror'][] = 'promotional';
            $data['error_string'][] = 'Promotorial material harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('potential') == '')
        {
            $data['inputerror'][] = 'potential';
            $data['error_string'][] = 'Potential producers harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('target_group') == '')
        {
            $data['inputerror'][] = 'target_group';
            $data['error_string'][] = 'Target group harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('ways_mean') == '')
        {
            $data['inputerror'][] = 'ways_mean';
            $data['error_string'][] = 'Ways and means harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('duration') == '')
        {
            $data['inputerror'][] = 'duration';
            $data['error_string'][] = 'Total duration harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('budget') == '')
        {
            $data['inputerror'][] = 'budget';
            $data['error_string'][] = 'Budget harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_media($id){
        $data = $this->m_model->detail_row("project_media", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_media(){
        $this->form_validate_add_media();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                        'promotional' => $this->security->xss_clean($this->input->post('promotional')),
                        'potential' => $this->security->xss_clean($this->input->post('potential')),
                        'target_group' => $this->security->xss_clean($this->input->post('target_group')),
                        'ways_mean' => $this->security->xss_clean($this->input->post('ways_mean')),
                        'duration' => $this->security->xss_clean($this->input->post('duration')),
                        'budget' => $this->security->xss_clean($this->input->post('budget')),
                );
        $this->m_model->edit("project_media", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_media($id){

        $this->m_model->delete("project_media", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step047($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $other = $this->m_model->select_all("project_other_activities", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['other'] = $other;

        $data['title'] = "SIPROPOS - Other Activities";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step047";
                $data['js_footer'] = "v_project_step047_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_other(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_other();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                );
        
        $this->m_model->insert("project_other_activities", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_other(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('title') == '')
        {
            $data['inputerror'][] = 'title';
            $data['error_string'][] = 'Title harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('description') == '')
        {
            $data['inputerror'][] = 'description';
            $data['error_string'][] = 'Deskripsi harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_other($id){
        $data = $this->m_model->detail_row("project_other_activities", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_other(){
        $this->form_validate_add_other();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('title')),
                        'description' => $this->security->xss_clean($this->input->post('description')),
                );
        $this->m_model->edit("project_other_activities", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_other($id){

        $this->m_model->delete("project_other_activities", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step048($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $hr_coordinator = $this->m_model->select_all("project_hr_coordinator", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['hr_coordinator'] = $hr_coordinator;

        $data['title'] = "SIPROPOS - Human Resource for Coordinator";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step048";
                $data['js_footer'] = "v_project_step048_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_hr_coordinator(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_hr_coordinator();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'education_level' => $this->security->xss_clean($this->input->post('education_level')),
                        'major' => $this->security->xss_clean($this->input->post('major')),
                        'experience' => $this->security->xss_clean($this->input->post('experience')),
                        'other_qualification' => $this->security->xss_clean($this->input->post('other_qualification')),
                        'english_skill' => $this->security->xss_clean($this->input->post('english_skill')),
                );
        
        $this->m_model->insert("project_hr_coordinator", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_hr_coordinator(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('education_level') == '')
        {
            $data['inputerror'][] = 'education_level';
            $data['error_string'][] = 'Gelar harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('major') == '')
        {
            $data['inputerror'][] = 'major';
            $data['error_string'][] = 'Field harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('experience') == '')
        {
            $data['inputerror'][] = 'experience';
            $data['error_string'][] = 'Pengalaman harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('other_qualification') == '')
        {
            $data['inputerror'][] = 'other_qualification';
            $data['error_string'][] = 'Kualifikasi lainnya harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('english_skill') == '')
        {
            $data['inputerror'][] = 'english_skill';
            $data['error_string'][] = 'Kemampuan bahasa inggris harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_hr_coordinator($id){
        $data = $this->m_model->detail_row("project_hr_coordinator", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_hr_coordinator(){
        $this->form_validate_add_hr_coordinator();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'education_level' => $this->security->xss_clean($this->input->post('education_level')),
                        'major' => $this->security->xss_clean($this->input->post('major')),
                        'experience' => $this->security->xss_clean($this->input->post('experience')),
                        'other_qualification' => $this->security->xss_clean($this->input->post('other_qualification')),
                        'english_skill' => $this->security->xss_clean($this->input->post('english_skill')),
                );
        $this->m_model->edit("project_hr_coordinator", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_hr_coordinator($id){

        $this->m_model->delete("project_hr_coordinator", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step049($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $hr_trainer = $this->m_model->select_all("project_hr_trainer", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['hr_trainer'] = $hr_trainer;

        $data['title'] = "SIPROPOS - Human Resource for Trainer";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==1 && $project['status']!=100) {

                $data['isi'] = "v_project_step049";
                $data['js_footer'] = "v_project_step049_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_add_hr_trainer(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_add_hr_trainer();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'project_id' => $this->security->xss_clean($this->input->post('project_id')),
                        'trainer' => $this->security->xss_clean($this->input->post('trainer')),
                        'education_level' => $this->security->xss_clean($this->input->post('education_level')),
                        'major' => $this->security->xss_clean($this->input->post('major')),
                        'experience' => $this->security->xss_clean($this->input->post('experience')),
                        'publication' => $this->security->xss_clean($this->input->post('publication')),
                        'other_qualification' => $this->security->xss_clean($this->input->post('other_qualification')),
                        'english_skill' => $this->security->xss_clean($this->input->post('english_skill')),
                );
        
        $this->m_model->insert("project_hr_trainer", $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_add_hr_trainer(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('trainer') == '')
        {
            $data['inputerror'][] = 'trainer';
            $data['error_string'][] = 'Nama Trainer harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('education_level') == '')
        {
            $data['inputerror'][] = 'education_level';
            $data['error_string'][] = 'Gelar harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('major') == '')
        {
            $data['inputerror'][] = 'major';
            $data['error_string'][] = 'Field harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('experience') == '')
        {
            $data['inputerror'][] = 'experience';
            $data['error_string'][] = 'Pengalaman harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('publication') == '')
        {
            $data['inputerror'][] = 'publication';
            $data['error_string'][] = 'Publication harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('other_qualification') == '')
        {
            $data['inputerror'][] = 'other_qualification';
            $data['error_string'][] = 'Kualifikasi lainnya harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('english_skill') == '')
        {
            $data['inputerror'][] = 'english_skill';
            $data['error_string'][] = 'Kemampuan bahasa inggris harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_get_hr_trainer($id){
        $data = $this->m_model->detail_row("project_hr_trainer", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_edit_hr_trainer(){
        $this->form_validate_add_hr_trainer();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'trainer' => $this->security->xss_clean($this->input->post('trainer')),
                        'education_level' => $this->security->xss_clean($this->input->post('education_level')),
                        'major' => $this->security->xss_clean($this->input->post('major')),
                        'experience' => $this->security->xss_clean($this->input->post('experience')),
                        'publication' => $this->security->xss_clean($this->input->post('publication')),
                        'other_qualification' => $this->security->xss_clean($this->input->post('other_qualification')),
                        'english_skill' => $this->security->xss_clean($this->input->post('english_skill')),
                );
        $this->m_model->edit("project_hr_trainer", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_hr_trainer($id){

        $this->m_model->delete("project_hr_trainer", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function step05($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Reasearch Project Proposal";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==2 && $project['status']!=100) {

                $data['isi'] = "v_project_step05";
                $data['js_footer'] = "v_project_step05_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function step05_action(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_step05();
        
        $project_code = $this->security->xss_clean($this->input->post('project_code'));
        $file_tor_lama = $this->security->xss_clean($this->input->post('file_tor_lama'));

        if(file_exists("./files/".$file_tor_lama) && $file_tor_lama) {
            unlink("./files/".$file_tor_lama);
        }

        if(!empty($_FILES['gambar']['name']))
        {
            $file_tor = $this->_do_upload($project_code);
        }
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'file_tor' => $file_tor,
                );
        
        $this->m_model->edit("project", 'id', $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_step05(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if(empty($_FILES['gambar']['name']))
        {
            $data['inputerror'][] = 'gambar';
            $data['error_string'][] = 'Ambil file yang akan diunggah';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _do_upload($project_code){

        $config['upload_path']          = "./files/";
        $config['allowed_types']        = 'pdf|PDF|doc|DOC|docx|DOCX';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        //$config['min_width']            = $ukuran_width; // set max width image allowed
        //$config['max_height']           = 1600; // set max height allowed
        $config['file_name']            = $project_code."_".date("Y_m_d_H_i_s"); //just milisecond timestamp fot unique name
        $config['encrypt_name']         = FALSE;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('gambar')) //upload and validate
        {
            $data['inputerror'][] = 'gambar';
            $data['error_string'][] = 'Ukuran file diluar ketentuan'; 
            // $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function step051($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Human Resources";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['type']==2 && $project['status']!=100) {

                $data['isi'] = "v_project_step051";
                $data['js_footer'] = "v_project_step051_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function step051_action(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_step051();
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'education_level' => $this->security->xss_clean($this->input->post('education_level')),
                        'major' => $this->security->xss_clean($this->input->post('major')),
                        'experience' => $this->security->xss_clean($this->input->post('experience')),
                        'publication' => $this->security->xss_clean($this->input->post('publication')),
                        'other_qualification' => $this->security->xss_clean($this->input->post('other_qualification')),
                        'english_skill' => $this->security->xss_clean($this->input->post('english_skill')),
                );
        
        $this->m_model->edit("project", 'id', $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_step051(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('education_level') == '')
        {
            $data['inputerror'][] = 'education_level';
            $data['error_string'][] = 'Gelar harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('major') == '')
        {
            $data['inputerror'][] = 'major';
            $data['error_string'][] = 'Field harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('experience') == '')
        {
            $data['inputerror'][] = 'experience';
            $data['error_string'][] = 'Pengalaman harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('publication') == '')
        {
            $data['inputerror'][] = 'publication';
            $data['error_string'][] = 'Publication harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('other_qualification') == '')
        {
            $data['inputerror'][] = 'other_qualification';
            $data['error_string'][] = 'Kualifikasi lainnya harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('english_skill') == '')
        {
            $data['inputerror'][] = 'english_skill';
            $data['error_string'][] = 'Kemampuan bahasa inggris harus diisi';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function step06($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Project Summary";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['status']!=100) {

                $data['isi'] = "v_project_step06";
                $data['js_footer'] = "v_project_step06_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function step06_action(){
        $s_all = $this->session->all_userdata();

        $this->form_validate_step06();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'summary' => $this->security->xss_clean($this->input->post('summary')),
                );
        
        $this->m_model->edit("project", 'id', $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_step06(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if($this->input->post('summary') == '')
        {
            $data['inputerror'][] = 'summary';
            $data['error_string'][] = 'Summary harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function step07($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Final";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['status']!=100) {

                $data['isi'] = "v_project_step07";
                $data['js_footer'] = "v_project_step07_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function stepfinal($project_id=""){


        $data1 = array(
                        'id' => $project_id,
                        'status' => 100,
                );
        
        $this->m_model->edit("project", 'id', $data1);
        echo json_encode(array("status" => TRUE));
    }

    public function review($project_id=""){

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $partner = $this->m_model->select_all("project_partner", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($partner);
        $data['partner'] = $partner;

        $training = $this->m_model->select_all("project_training", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['training'] = $training;

        $workshop = $this->m_model->select_all("project_workshop", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['workshop'] = $workshop;

        $study_visit = $this->m_model->select_all("project_study_visit", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['study_visit'] = $study_visit;

        $seminar = $this->m_model->select_all("project_seminar", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['seminar'] = $seminar;

        $meeting = $this->m_model->select_all("project_meeting", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['meeting'] = $meeting;

        $media = $this->m_model->select_all("project_media", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['media'] = $media;

        $other = $this->m_model->select_all("project_other_activities", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['other'] = $other;

        $hr_coordinator = $this->m_model->select_all("project_hr_coordinator", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['hr_coordinator'] = $hr_coordinator;

        $hr_trainer = $this->m_model->select_all("project_hr_trainer", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);
        $data['hr_trainer'] = $hr_trainer;

        $data['title'] = "SIPROPOS - Review Project";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created'] && $project['status']!=100) {

                $data['isi'] = "v_project_review";
                $data['js_footer'] = "v_project_review_js";

            } else {

                $data['isi'] = "403";
                $data['js_footer'] = "";

            }
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }


    private function check_isvalidated() {

        $s_all = $this->session->all_userdata();

        if ($this->session->userdata('validated')) {

	        //$is_login = $this->akmet_auth->getFieldById('is_login', 'users', 'user_name', $s_all['user_name']);
	        $user_cond = $this->vf_auth->getAllFieldById('users', 'user_name', $s_all['user_name']);

            if ($user_cond['is_aktif']=='0') {

            	redirect(base_url('auth/logout'));

            }
        } else {
        	redirect(base_url('auth'));
        }
    }

    private function check_users_detail ($id=""){
        if ($this->m_model->count_id("users_detail", "id_users", $id) < 1 ) {
        
            redirect(base_url('users/edit/'.urlencode(base64_encode($id))));
        }
    }

}
    
?>