<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');

        $this->check_isvalidated();

    }

    public function index()
    {

        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "ORDER BY id");

        $data['title'] = "SIPROPOS - Daftar Users";

        if ($data['s_all']['user_role']==-1) {
            $data['isi'] = "v_users";
            $data['js_footer'] = "v_users_js";
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template', $data);

    }

    public function ajax_list()
    {
        $list = $this->m_users->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $items) {
            $no++;

            if ($items->id_role != -1) {
                if ($items->is_aktif==0) {
                    $is_aktif_button = '<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Aktifkan User" onclick="aktif_user('."'".$items->id."'".',1)"><i class="fa fa-lock"></i></a>';
                } else {
                    $is_aktif_button = '<a class="btn btn-xs btn-success" href="javascript:void(0)" title="Non Aktifkan User" onclick="aktif_user('."'".$items->id."'".',0)"><i class="fa fa-unlock"></i></a>';
                }
            } else {
                $is_aktif_button = '';
            }

            $role = '<span class="label label-default">'.$this->vf->getFieldById('role_name', 'roles', 'id', $items->id_role).'</span>';
            // $login = $items->is_login==1?'<span class="label label-warning pull-right">Online</span>':"";

            $row = array();
            $row[] = $no;
            $row[] = $items->user_name;
            $row[] = $items->user_email;
            $row[] = $items->user_fullname;
            $row[] = $items->instansi;
            // $row[] = $nip.$pns;
            $row[] = tgl_indo_time($items->date_created);
            //$row[] = $items->last_login;
            
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-edit"></i></a>
                      <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$items->id."'".','."'".$items->user_email."'".')"><i class="glyphicon glyphicon-trash"></i></a>
                      <a class="btn btn-xs btn-info" href="javascript:void(0)" title="Ganti Password" onclick="change_pass('."'".$items->id."'".','."'".$items->user_email."'".')"><i class="glyphicon glyphicon-random"></i></a>
                      '.$is_aktif_button;
            
            // $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-edit"></i></a>
            //           <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$items->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
            //           '.$is_aktif_button;
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_users->count_all(),
                        "recordsFiltered" => $this->m_users->count_filtered(),
                        "data" => $data,
                        );
        //output to json format
        echo json_encode($output);
    }
    
    public function ajax_add()
    {
        $this->form_validate_add();
        
        $hasher = new PasswordHash(8, TRUE);

        // $user_name = random_string('alnum', 10);
        $user_pass_1 = $this->security->xss_clean($this->input->post('user_pass1'));

        $user_pass_2 = $hasher->HashPassword($user_pass_1);

        // $password = $hasher->HashPassword($this->security->xss_clean($this->input->post('user_pass1')));
        //$password = $this->security->xss_clean($this->input->post('user_pass1'));
        $data = array(
                        'user_name' => $this->security->xss_clean($this->input->post('user_name')),
                        'user_pass' => $user_pass_2,
                        'user_email' => $this->security->xss_clean($this->input->post('user_email')),
                        'user_fullname' => strtoupper($this->security->xss_clean($this->input->post('user_fullname'))),
                        'instansi' => strtoupper($this->security->xss_clean($this->input->post('instansi'))),
                        'id_role' => $this->security->xss_clean($this->input->post('id_role')),
                        'is_aktif' => 1,
                        'date_created' => date("Y-m-d H:i:s"),
                );

        $this->m_model->insert("users", $data);

        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_edit($id)
    {
        $data = $this->m_model->detail_row("users", 'id', $id);
        echo json_encode($data);
    }

    public function ajax_pass()
    {
        $this->form_validate_pass();

        $hasher = new PasswordHash(8, TRUE);
        $password = $hasher->HashPassword($this->security->xss_clean($this->input->post('user_pass2')));

        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'user_pass' => $password,
                );
        $this->m_model->edit("users", 'id', $data);

        echo json_encode(array("status" => TRUE));
        // echo $this->input->post('user_email');

    }

    public function ajax_update()
    {
        $this->form_validate_update();
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('id')),
                        'user_email' => $this->security->xss_clean($this->input->post('user_email')),
                        'user_fullname' => $this->security->xss_clean($this->input->post('user_fullname')),
                        'instansi' => $this->security->xss_clean($this->input->post('instansi')),
                        'id_role' => $this->security->xss_clean($this->input->post('id_role')),
                );
        $this->m_model->edit("users", 'id', $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_aktif_user($id, $is_aktif)
    {
        $this->load->library("php_mailer");
        $this->mail = $this->php_mailer->load();  

        $data = array(
                        'id' => $id,
                        'is_aktif' => $is_aktif,
                );
        $this->m_model->edit("users", 'id', $data);

        $user = $this->m_model->detail_row('users', 'id', $id);

        if ($is_aktif == 1) {
            $dataemail = "<p><h4>Akun ".$user['user_name']." telah aktif</h4></p>";
            $dataemail .= "<p>Harap dipergunakan sebagaimana mestinya</p>";

            $message = $this->template_email($user['user_email'], "Aktivasi Kata Pengguna", $dataemail);
            $this->send_email($user['user_email'],"[SIPROPOS] - Aktivasi Kata Pengguna",$message);
        } else {
            $dataemail = "<p><h4>Akun ".$user['user_name']." telah di non-aktifkan</h4></p>";
            $dataemail .= "<p>Hubungi admin jika diperlukan</p>";

            $message = $this->template_email($user['user_email'], "Non Aktivasi Kata Pengguna", $dataemail);
            $this->send_email($user['user_email'],"[SIPROPOS] - Non Aktivasi Kata Pengguna",$message);            
        }
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
    
    public function ajax_role()
    {
        $data['role'] = $this->m_model->select_all("roles", "ORDER BY id");
        echo json_encode($data);
    }

    private function check_validate_username($user_name)
    {
        return $this->m_model->count_id("users", 'user_name', $user_name);
    }

    private function check_validate_email($user_email)
    {
        return $this->m_model->count_id("users", 'user_email', $user_email);
    }

    public function changepassword()
    {

        $data['s_all'] = $this->session->all_userdata();

        $data['title'] = "SIPROPOS - Ganti Password";

        $data['isi'] = "v_users_changepass";
        $data['js_footer'] = "v_users_changepass_js";
        
        $this->load->view('v_template', $data);

    }
      
    public function changepassword_action()
    {
        $s_all = $this->session->all_userdata();

        $this->form_validate_changepassword();
        
        $hasher = new PasswordHash(8, TRUE);
        $user_pass = $hasher->HashPassword($this->security->xss_clean($this->input->post('pass_2')));
        
        $data = array(
                        'id' => $this->security->xss_clean($this->input->post('user_id')),
                        'user_pass' => $user_pass,
                );
        
        $this->m_model->edit("users", 'id', $data);

        
        echo json_encode(array("status" => TRUE));
    }

// ===========================================================

    public function online()
    {
        $config['app_name'] = $this->config->item('app_name');
        $data['config'] = $config;
        $data['s_all'] = $this->session->all_userdata();

        $data['roles'] = $this->m_model->select_all("roles", "WHERE id!=-1 ORDER BY id");

        $data['title'] = $this->title;

        if ($data['s_all']['user_role']==-1 || $data['s_all']['user_role']==1) {
            $data['isi'] = "v_users_online";
            $data['js_footer'] = "v_users_online_js";
        } else {
            $data['isi'] = "403";
            $data['js_footer'] = "";
        }
        
        $this->load->view('v_template_admin', $data);

    }

    public function online_list() {
        date_default_timezone_set('Asia/Jakarta');
        error_reporting(-1);

        // $query =$this->admin_model->get_active_users();
        // $num_row=$query->num_rows();
        // $result=$query->result();

        $result = $this->m_model->select_all("ci_sessions", "WHERE user_data<>''");
        $num_row = $this->m_model->count_all("ci_sessions WHERE user_data<>''");

        $str="<br/><b>$num_row</b> Users are active at this time<br/>";
        $str.="<table border=1 cellpadding=2><tr><td>User Name</td><td>User Role</td><td>IP Address</td><td>Last Activity</td><td>Aksi</td></tr>";
        foreach ($result as $row) {
            $user_data=$row['user_data'];
            $final = array();
            $str.="<tr>";
            foreach (unserialize($user_data) as $k => $v) {
                $final[] = array('key' => $k, 'value' => $v);
                if($k=='user_fullname') {
                    $str.="<td>$v</td>";
                }
                if($k=='user_role') {
                    $str.="<td>".$this->vf->getFieldById('role_name', 'roles', 'id', $v)."</td>";
                }

            }
            $str=$str."<td>".$row['ip_address']."</td><td>". date('d/m/y H:i:s', $row['last_activity'])."</td><td><button class='btn btn-sm btn-danger' onclick='logout_user('".$row["session_id"]."')'>Logout</button></td></tr>";
        }

        $str=$str."</table>";
        
        echo $str;        
        // $data['users']=$str;
        
        // $this->load->view('admin_active_users',$data);
    }

    // public function online_list() {
    //     date_default_timezone_set('Asia/Jakarta');
    //     error_reporting(-1);

    //     $data = array(
    //         'session_id',
    //         'ip_address',
    //         'last_activity',
    //         'user_data'
    //     );
        
    //     $this->db->select($data);
    //     $query = $this->db->get("ci_sessions");
    //     $no = 1;
    //     foreach ($query->result() as $row)
    //     {   
    //         $session_data = $row->data;
    //         $return_data = array();
    //         $offset = 0;
    //         while ($offset < strlen($session_data)) {
    //             if (!strstr(substr($session_data, $offset), "|")) {
    //                 throw new Exception("invalid data, remaining: " . substr($session_data, $offset));
    //             }
    //             $pos = strpos($session_data, "|", $offset);
    //             $num = $pos - $offset;
    //             $varname = substr($session_data, $offset, $num);
    //             $offset += $num + 1;
    //             $data = unserialize(substr($session_data, $offset));
    //             $return_data[$varname] = $data;
    //             $offset += strlen(serialize($data));
    //         }
            
    //         if(!empty($return_data['user_fullname'])){
    //             echo "<tr>";
    //             echo "<td style=\"width: 10%;text-align: right\"><div id=\"dv_ip_$no\">".date("d-m-Y H:i:s",$return_data['__ci_last_regenerate'])."</div></td>";
    //             echo "<td style=\"width: 20%;text-align: left\">".$return_data['user_fullname']."</td>";
    //             echo "<td style=\"width: 11%;text-align: center\"><div id=\"dv_$no\">".$row->ip_address."</div></td>";
    //             echo "<td style=\"text-align: left\">".$return_data['user_agent']."</td>";
    //             echo "<td style=\"width: 15%;text-align: left\">".$return_data['platform']."</td>";
    //             echo "<td style=\"width: 7%;text-align: center\">"
    //                 . " <button class=\"btn btn-sm btn-danger\" onclick=\"logout_user('".$row->session_id."','".$return_data['user_fullname']."');\">Logout</button></td>";
    //             echo "</tr>"; 
    //             $no++;
    //         }
    //     }
    // }



    public function online_logout() {
        $this->m_model->delete('ci_sessions', 'session_id', $this->input->post('id'));
        return true;        
    }

    public function jumlah_user()
    {
        $data['jumlah_admin'] = $this->m_model->count_id("users", "id_role", 1);
        $data['jumlah_verifikator'] = $this->m_model->count_id("users", "id_role", 2);
        $data['jumlah_peserta'] = $this->m_model->count_id("users", "id_role", 3);

        echo json_encode($data);
    }

// ===========================================================


    private function form_validate_add()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if(!preg_match('/^[a-z\d_]{2,10}$/i', $this->input->post('user_name')))
        {
            $data['inputerror'][] = 'user_name';
            $data['error_string'][] = 'Kata pengguna tidak valid';
            $data['status'] = FALSE;
        }

        if($this->check_validate_username($this->input->post('user_name')) > 0)
        {
            $data['inputerror'][] = 'user_name';
            $data['error_string'][] = 'Kata pengguna telah terdaftar';
            $data['status'] = FALSE;
        }

        if(!preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $this->input->post('user_email')))
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Email tidak valid';
            $data['status'] = FALSE;
        }

        if($this->check_validate_email($this->input->post('user_email')) > 0)
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Email telah terdaftar';
            $data['status'] = FALSE;
        }

        if($this->input->post('user_email') == '')
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Email harus diisi';
            $data['status'] = FALSE;
        }

        
        if($this->input->post('user_fullname') == '')
        {
            $data['inputerror'][] = 'user_fullname';
            $data['error_string'][] = 'Nama Lengkap harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('instansi') == '')
        {
            $data['inputerror'][] = 'instansi';
            $data['error_string'][] = 'Instansi harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('user_pass1') == '')
        {
            $data['inputerror'][] = 'user_pass1';
            $data['error_string'][] = 'Password harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_role') == '')
        {
            $data['inputerror'][] = 'id_role';
            $data['error_string'][] = 'Role harus dipilih';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function form_validate_pass()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('user_pass1') == '')
        {
            $data['inputerror'][] = 'user_pass1';
            $data['error_string'][] = 'Password harus diisi';
            $data['status'] = FALSE;
        }

        if(!preg_match('/^[a-z\d_]{2,10}$/i', $this->input->post('user_pass1')))
        {
            $data['inputerror'][] = 'user_pass1';
            $data['error_string'][] = 'Kata sandi tidak valid';
            $data['status'] = FALSE;
        }

        if($this->input->post('user_pass2') == '')
        {
            $data['inputerror'][] = 'user_pass2';
            $data['error_string'][] = 'Re-type Password harus diisi';
            $data['status'] = FALSE;
        }

        if(!preg_match('/^[a-z\d_]{2,10}$/i', $this->input->post('user_pass2')))
        {
            $data['inputerror'][] = 'user_pass2';
            $data['error_string'][] = 'Kata sandi tidak valid';
            $data['status'] = FALSE;
        }

        if($this->input->post('user_pass1') != $this->input->post('user_pass2'))
        {
            $data['inputerror'][] = 'user_pass2';
            $data['error_string'][] = 'Password tidak sama';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function form_validate_update()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if(!preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $this->input->post('user_email')))
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Email tidak valid';
            $data['status'] = FALSE;
        }

        if($this->input->post('user_fullname') == '')
        {
            $data['inputerror'][] = 'user_fullname';
            $data['error_string'][] = 'Nama Lengkap harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('instansi') == '')
        {
            $data['inputerror'][] = 'instansi';
            $data['error_string'][] = 'Instansi harus diisi';
            $data['status'] = FALSE;
        }        

        if($this->input->post('id_role') == '')
        {
            $data['inputerror'][] = 'id_role';
            $data['error_string'][] = 'Role harus dipilih';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
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

    private function form_validate_changepassword()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        $old_pass = $this->check_validate_pass($this->input->post('user_id'));
        
        $hasher = new PasswordHash(8, TRUE);
        
        if(!$hasher->CheckPassword($this->input->post('pass_0'), $old_pass) || $this->input->post('pass_0') == '')
        {
            $data['inputerror'][] = 'pass_0';
            $data['error_string'][] = 'Kata sandi lama tidak sama';
            $data['status'] = FALSE;
        }
        
        
        if($this->input->post('pass_1') == '')
        {
            $data['inputerror'][] = 'pass_1';
            $data['error_string'][] = 'Kata sandi baru harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('pass_2') == '')
        {
            $data['inputerror'][] = 'pass_2';
            $data['error_string'][] = 'Kata sandi baru harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('pass_1') != $this->input->post('pass_2'))
        {
            $data['inputerror'][] = 'pass_2';
            $data['error_string'][] = 'Kata sandi baru tidak sama';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function send_email($emailto, $subject, $message){

        try {
            // //Server settings
            // $this->mail->SMTPDebug = 0;                                 // Enable verbose debug output
            // $this->mail->isSMTP();                                      // Set mailer to use SMTP
            // $this->mail->Host = '10.30.30.248';  // Specify main and backup SMTP servers
            // $this->mail->SMTPAuth = false;                               // Enable SMTP authentication
            // $this->mail->Username = 'akmet@kemendag.go.id';                 // SMTP username
            // $this->mail->Password = 'Akademi@Metrologi';                           // SMTP password
            // $this->mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
            // $this->mail->Port = 25;                                    // TCP port to connect to

            $this->mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $this->mail->isSMTP();                                      // Set mailer to use SMTP
            $this->mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
            $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
            $this->mail->Username = 'sipropos.si@gmail.com';                 // SMTP username
            $this->mail->Password = 'Sipropos123';                           // SMTP password
            $this->mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $this->mail->setFrom('sipropos.si@gmail.com', 'SIPROPOS - Kemendag');
            //$this->mail->addAddress($email);     // Add a recipient
            $this->mail->addAddress($emailto);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        
    }

    private function template_email($namato, $title, $isidetail){

        // $status = 1;
        $content = '';
        $content .= "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
        $content .= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
        $content .= "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";

        $content .= "<div style='padding: 10px; background-color: #2f506c;' class='col-md-12'>";
        // $content .= "<div class='col-md-1 col-md-offset-1 img-responsive'><img src=".base_url('assets/images/akmet_jpg.png')." width='80px'></div>";
        // $content .= "<div class='col-md-9' style='color: white;'><h2>".$datappdb->NAMA_PPDB."</h2></div></div>";
        $content .= "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='color:#fff; margin-left:50px;'><tr><td width='100px;'><img src=".base_url('')." width='80px'></td><td><h2>SIPROPOS</h2></td></tr></table>";
        $content .= "</div>";
        $content .= "<div class='col-md-10 col-md-offset-2' style='margin-top:15px; font-size:14px; margin-left:70px;><h3>".$title."</h3></div>";

        $content .= "<div class='col-md-12' style='text-align:center; margin-top: 10px; color:#000000;'>";
        $content .= "<h3>Hallo ".$namato." !</h3>";
        // $content .= "<h3>Hallo Leksa !</h3>";
        $content .= "<p>Perlu kami informasikan tentang ".strtolower($title).", yaitu :</p>";
        $content .= $isidetail;
        // $content .= "<br><p>Kata Pengguna : ".$user_name."</p><br>";
        // $content .= "<br><p>Email : ".$user_email." </p><br>";
        // $content .= "<p>Harap segera lengkapi data-data anda sebelum proses pendaftaran berakhir</p>";
        $content .= "</div>";
        $content .= "<div class='col-md-12' style='padding: 10px; background-color: #2f506c; color: #fff; margin-top: 30px;'>";
        $content .= "<div class='col-md-10' style='margin-left:50px;'><h3>SIPROPOS</h3></div></div>";

        return $content;
    }


    private function sendMail ($mailto="", $mailfrom="", $subject="", $isi="") {

        $this->load->library('email'); // Note: no $config param needed
        $this->email->from($mailfrom);
        $this->email->to($mailto);
        $this->email->subject($subject);
        $this->email->message($isi);
        $this->email->send();        
    }

    private function check_validate_pass($id)
    {
        $pass = $this->m_model->detail_row('users', 'id', $id);
        return $pass['user_pass'];
    }

    
}
    
?>