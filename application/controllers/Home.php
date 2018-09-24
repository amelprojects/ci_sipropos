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

            if ($items->status!=100 && $items->status!=200) {
                $btn_edit = '<a class="btn btn-xs btn-primary" href="'.base_url().'project/step01/'.$items->id.'" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
                $btn_delete ='<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_project('."'".$items->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            } else {
                $btn_edit = '';
                $btn_delete ='';
            }

            if ($items->status>=100) {
                $btn_comment = '<a class="btn btn-xs btn-warning" href="javascript:void(0)" title="Lihat Komentar" onclick="comment_project('."'".$items->id."'".')"><i class="glyphicon glyphicon-comment"></i></a>';
            } else {
                $btn_comment = '';
            }

            if ($items->status==200) {
                $txt_status = '<span class="label label-success">Approved</span>';
            } else if ($items->status==100) {
                $txt_status = '<span class="label label-info">Submited</span>';
            } else {
                $txt_status = '<span class="label label-danger">Pending</span>';
            }

            if ($items->type==1) {
                $type = "Activity Based Project";
            } else {
                $type = "Research Project";
            }


            $btn_file = '<a class="btn btn-xs btn-default" href="'.base_url().'project/review/'.$items->id.'" title="Lihat File" onclick="file_project('."'".$items->id."'".')"><i class="fa fa-html5"></i> html</a>';

            if ($items->status==100 && $user_role!=2) {
                $btn_status = '<a class="btn btn-xs btn-success" href="javascript:void(0)" title="Setujui Project" onclick="status_project('."'".$items->id."'".',200)"><i class="fa fa-check-square-o"></i></a>';
            } else {
                // $btn_status = '<a class="btn btn-xs btn-success" href="javascript:void(0)" title="Tolak Project" onclick="reject_project('."'".$items->id."'".',300)"><i class="fa  fa-check-square-o"></i></a>';
                $btn_status = "";
            }


            $row = array();
            $row[] = $items->title;
            $row[] = $items->project_code;
            $row[] = $type;
            // $row[] = $nip.$pns;
            $row[] = $txt_status;
            $row[] = $btn_file;
            //$row[] = $items->last_login;
                        
            if ($user_role==2) {            
                $row[] = $btn_edit.$btn_delete.$btn_comment.$btn_status;
            } else {
                $row[] = $btn_comment.$btn_status;
            }
            
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

    public function ajax_status_project($id, $status)
    {
        $this->load->library("php_mailer");
        $this->mail = $this->php_mailer->load();  

        $data['s_all'] = $this->session->all_userdata();
        $user_aproved = $data['s_all']['user_id'];

        $data = array(
                        'id' => $id,
                        'status' => $status,
                        'date_aproved' => date("Y-m-d H:i:s"),
                        'user_aproved' => $user_aproved,
                        'date_updated' => date("Y-m-d H:i:s"),
                );

        $this->m_model->edit("project", 'id', $data);

        // $user = $this->m_model->detail_row('users', 'id', $id);

        // if ($is_aktif == 1) {
        //     $dataemail = "<p><h4>Akun ".$user['user_name']." telah aktif</h4></p>";
        //     $dataemail .= "<p>Harap dipergunakan sebagaimana mestinya</p>";

        //     $message = $this->template_email($user['user_email'], "Aktivasi Kata Pengguna", $dataemail);
        //     $this->send_email($user['user_email'],"[SIPROPOS] - Aktivasi Kata Pengguna",$message);
        // } else {
        //     $dataemail = "<p><h4>Akun ".$user['user_name']." telah di non-aktifkan</h4></p>";
        //     $dataemail .= "<p>Hubungi admin jika diperlukan</p>";

        //     $message = $this->template_email($user['user_email'], "Non Aktivasi Kata Pengguna", $dataemail);
        //     $this->send_email($user['user_email'],"[SIPROPOS] - Non Aktivasi Kata Pengguna",$message);            
        // }
        echo json_encode(array("status" => TRUE));

    }

    public function ajax_delete_project($id){

        $this->m_model->delete("project", 'id', $id);
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

    private function check_users_detail ($id="")
    {
        if ($this->m_model->count_id("users_detail", "id_users", $id) < 1 ) {
        
            redirect(base_url('users/edit/'.urlencode(base64_encode($id))));
        }
    }

}
    
?>