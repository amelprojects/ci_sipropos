<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_project');
        $this->check_isvalidated();
    }

	public function index(){

        $data['s_all'] = $this->session->all_userdata();

        //$is_login = $this->akmet_auth->getFieldById('is_login', 'users', 'user_name', $data['s_all']['user_name']);
        //echo $is_login;
        //$this->load->view('welcome_message', $data);

        //$this->check_users_detail($data['s_all']['user_id']);     

        $data['info'] = $this->m_model->select_all_row("*","info", "ORDER BY id DESC LIMIT 1");

        $data['title'] = "SIPROPOS - Home";
        $data['isi'] = "v_home";
        $data['js_footer'] = "v_home_js";

        $this->load->view('v_template', $data);

	}

    public function ajax_list($user_role="", $user_id="")
    {
        $list = $this->m_project->get_datatables($user_role, $user_id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $items) {
            $no++;

            // if ($items->id_role != -1) {
            //     if ($items->is_aktif==0) {
            //         $is_aktif_button = '<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Aktifkan User" onclick="aktif_user('."'".$items->id."'".',1)"><i class="fa fa-lock"></i></a>';
            //     } else {
            //         $is_aktif_button = '<a class="btn btn-xs btn-success" href="javascript:void(0)" title="Non Aktifkan User" onclick="aktif_user('."'".$items->id."'".',0)"><i class="fa fa-unlock"></i></a>';
            //     }
            // } else {
            //     $is_aktif_button = '';
            // }

            // $role = '<span class="label label-default">'.$this->vf->getFieldById('role_name', 'roles', 'id', $items->id_role).'</span>';
            // $login = $items->is_login==1?'<span class="label label-warning pull-right">Online</span>':"";

            $row = array();
            $row[] = $items->title;
            $row[] = $items->project_code;
            $row[] = $items->type;
            // $row[] = $nip.$pns;
            $row[] = $items->status;
            $row[] = "";
            $row[] = "";
            //$row[] = $items->last_login;
            
            // $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-edit"></i></a>
            //           <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$items->id."'".','."'".$items->user_email."'".')"><i class="glyphicon glyphicon-trash"></i></a>
            //           <a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ganti Password" onclick="change_pass('."'".$items->id."'".','."'".$items->user_email."'".')"><i class="glyphicon glyphicon-random"></i></a>
            //           '.$is_aktif_button;
            
            // $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-edit"></i></a>
            //           <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
            //           '.$is_aktif_button;
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_project->count_all($user_role, $user_id),
                        "recordsFiltered" => $this->m_project->count_filtered($user_role, $user_id),
                        "data" => $data,
                        );
        //output to json format
        echo json_encode($output);
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