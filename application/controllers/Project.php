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

    public function step01_action()
    {
        $s_all = $this->session->all_userdata();

        $this->form_validate_step01();
        
        // $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'title' => $this->security->xss_clean($this->input->post('project_title')),
                        'type' => $this->security->xss_clean($this->input->post('project_type')),
                );
        
        $this->m_model->edit("project", 'id', $data);
        
        echo json_encode(array("status" => TRUE));
    }

    private function form_validate_step01()
    {
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

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
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

    private function check_users_detail ($id="")
    {
        if ($this->m_model->count_id("users_detail", "id_users", $id) < 1 ) {
        
            redirect(base_url('users/edit/'.urlencode(base64_encode($id))));
        }
    }

}
    
?>