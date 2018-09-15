<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_info');

        $this->check_isvalidated();

    }

    public function index()
    {

        $data['s_all'] = $this->session->all_userdata();

        $data['title'] = "SIPROPOS - Daftar Informasi";

        if ($data['s_all']['user_role']==-1) {
            $data['isi'] = "v_info";
            $data['js_footer'] = "v_info_js";
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_list()
    {
        $list = $this->m_info->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $items) {
            $no++;

            $row = array();
            $row[] = $no;
            $row[] = $items->judul;
            $row[] = $items->isi;
            $row[] = tgl_indo_time($items->date_created);
            //$row[] = $items->last_login;
            
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_info('."'".$items->id."'".')"><i class="glyphicon glyphicon-edit"></i></a>
                      <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_info('."'".$items->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>'
                      ;
            
            // $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-edit"></i></a>
            //           <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
            //           '.$is_aktif_button;
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_info->count_all(),
                        "recordsFiltered" => $this->m_info->count_filtered(),
                        "data" => $data,
                        );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add()
    {
        $this->form_validate_add();
        
        $data = array(
                        'judul' => $this->security->xss_clean($this->input->post('judul')),
                        'isi' => $this->security->xss_clean($this->input->post('isi')),
                        'date_created' => date("Y-m-d H:i:s"),
                );

        $this->m_model->insert("info", $data);

        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id)
    {
        $data = $this->m_model->detail_row("info", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->form_validate_add();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'judul' => $this->security->xss_clean($this->input->post('judul')),
                        'isi' => $this->security->xss_clean($this->input->post('isi')),
                );
        $this->m_model->edit("info", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id, $email)
    {

        // $old_file = $this->psb->getFieldById('foto', 'users_detail', 'id_users', $id);
        // if(file_exists($this->config->item('modul_users_dir').$old_file) && $old_file) {
        //     unlink($this->config->item('modul_users_dir').$old_file);
        // }

        $this->m_model->delete("users", 'id', $id);
        echo json_encode(array("status" => TRUE));
    }
    
// ===========================================================


    private function form_validate_add()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('judul') == '')
        {
            $data['inputerror'][] = 'judul';
            $data['error_string'][] = 'Judul harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('isi') == '')
        {
            $data['inputerror'][] = 'isi';
            $data['error_string'][] = 'Isi harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function sendMail ($mailto="", $mailfrom="", $subject="", $isi="") {

        $this->load->library('email'); // Note: no $config param needed
        $this->email->from($mailfrom);
        $this->email->to($mailto);
        $this->email->subject($subject);
        $this->email->message($isi);
        $this->email->send();        
    }

    private function check_isvalidated()
    {

        if ($this->session->userdata('validated')) {

            $s_all = $this->session->all_userdata();
            //$is_login = $this->psb_auth->getFieldById('is_login', 'users', 'user_name', $s_all['user_name']);
            $user_cond = $this->vf_auth->getAllFieldById('users', 'user_name', $s_all['user_name']);

            if ($user_cond['is_aktif']=='0') {
                redirect(base_url('auth/logout'));  
            }
        } else {
            redirect(base_url('auth'));
        }
    }
    
}
    
?>