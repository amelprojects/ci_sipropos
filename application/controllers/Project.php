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
        
        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Project Step 1";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created']) {

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

            if ($data['s_all']['user_id']==$project['user_created']) {

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
        
        $data0 = array(
                        'id' => $project_id,
                        'status' => 2,
                );

        $this->m_model->edit("project", 'id', $data0);

        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $partner = $this->m_model->select_all("project_partner", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($partner);

        $data['partner'] = $partner;

        $data['title'] = "SIPROPOS - Project Step 3";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created']) {

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
        
        $data0 = array(
                        'id' => $project_id,
                        'status' => 3,
                );

        $this->m_model->edit("project", 'id', $data0);

        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $data['title'] = "SIPROPOS - Project Step 2";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created']) {

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
        
        $data0 = array(
                        'id' => $project_id,
                        'status' => 4,
                );

        $this->m_model->edit("project", 'id', $data0);

        // echo "project id : " .$project_id;
        $project = $this->m_model->detail_row("project", "id", $project_id);
        // print_r($project);
        $data['project'] = $project;

        $training = $this->m_model->select_all("project_training", "WHERE project_id='".$project_id."' ORDER BY id");
        // print_r($training);

        $data['training'] = $training;

        $data['title'] = "SIPROPOS - Project Step 4.1";

        if ($data['s_all']['user_role']==2 || $project!="") {

            if ($data['s_all']['user_id']==$project['user_created']) {

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