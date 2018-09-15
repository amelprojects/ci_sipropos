<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of user
 *
 * @author VF
 */

// session_start();

class Auth extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index() {

        $data['title'] = 'SIPROPOS - Login Form';

        // $data['captcha'] = $this->captcha->main();
        // $this->session->set_userdata('captcha_info', $data['captcha']);

         $this->load->library('mathcaptcha');
         $this->mathcaptcha->init();
     
         $data['math_captcha_question'] = $this->mathcaptcha->get_question();
        
        $this->load->view('v_auth', $data);

    }

    public function validasi_login() {
        
        $hasher = new PasswordHash(8, TRUE);

        $user_name = $this->security->xss_clean($this->input->post('user_name'));
        $user_pass = $this->security->xss_clean($this->input->post('user_pass'));

        $pass = $this->vf_auth->getFieldById('user_pass', 'users', 'user_name', $user_name);
        //echo $pass;
        // $captcha_info = $this->session->userdata('captcha_info');

        // if($captcha_info['code'] == $this->input->post('captcha_code')) {
    
            if (!empty($pass)) {

                if ($hasher->CheckPassword($user_pass, $pass)) {
                //if ($user_pass==$pass) {

                    $is_aktif = $this->vf_auth->getFieldById('is_aktif', 'users', 'user_name', $user_name);


                    if ($is_aktif === '1') {

                        // VF - update tabel user
                        $update_users = array(
                            'user_name' => $user_name,
                            'last_login' => date("Y-m-d H:i:s"),
                            'ip_address' => $_SERVER['REMOTE_ADDR']
                        );
                        $this->m_model->edit('users', 'user_name', $update_users);

                        $user_all = $this->vf_auth->getAllFieldById('users', 'user_name', $user_name);

                        //print_r($user_all['user_fullname']);

                        $data = array(
                            'user_id' => $user_all['id'],
                            'user_name' => $user_all['user_name'],
                            'user_fullname' => $user_all['user_fullname'],
                            'user_email' => $user_all['user_email'],
                            'user_role' => $user_all['id_role'],
                            'user_last_login' => $user_all['last_login'],
                            'user_last_activity' => $user_all['last_activity'],
                            'user_date_created' => $user_all['date_created'],
                            'validated' => true
                        );
                        $this->session->set_userdata($data);

                        //$this->sid_auth->updateFieldById('users', 'is_login', 1, 'user_name', $user_name);
                        //$this->sid_auth->updateFieldById('users', 'last_login', gmdate ("Y-m-d H:i:s", time()+60*60*7), 'user_name', $user_name);
                        //$this->sid_auth->updateFieldById('users', 'ip_address', $_SERVER['REMOTE_ADDR'], 'user_name', $user_name);

                    } else {
                        echo 3; // VF - failed aktif
                    }
                    
                } else {
                    echo 2; // VF - failed password
                }
            } else {
                echo 1; // VF - failed username
            }
        // } else {
        //     echo 99; // VF - captcha
        // }
        //$result = $this->m_login->validate($username, $password, $imagecode);
        //$data['s_all'] = $this->session->all_userdata();
        //print_r($this->session->all_userdata());
                
    }

    public function logout() {
        
        $s_all = $this->session->all_userdata();

        // VF - update tabel user
        $update_users = array(
            'user_name' => $s_all['user_name'],
            'last_activity' => date("Y-m-d H:i:s"),
        );
        $this->m_model->edit('users', 'user_name', $update_users);

        $this->session->unset_userdata('validated');                
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }


    public function signup() {
        
        // $this->check_signup_date();
                
        $config['app_name'] = $this->config->item('app_name');
        $config['g_recaptcha_enable_signup'] = $this->config->item('g_recaptcha_enable_signup');
        $config['g_recaptcha_site_key'] = $this->config->item('g_recaptcha_site_key');
        $data['config'] = $config;

        $this->load->library('captcha');
        $data['captcha'] = $this->captcha->main();
        $this->session->set_userdata('captcha_info', $data['captcha']);
        
        $date_s = $this->psb->getFieldByW("date_start", "agenda", "urut=1 AND is_aktif=1");
        $date_e = $this->psb->getFieldByW("date_end", "agenda", "urut=1 AND is_aktif=1");

        $data['title'] = $config['app_name'] . ' - Form Pendaftaran';

        if (now() >= $date_s['date_start'] AND now() <= $date_e['date_end']) {
            $this->load->view('v_signup', $data);    
        } else {
            $this->load->view('v_no_access');
        }
        

    }

    public function changepassword()
    {
        $config['app_name'] = $this->config->item('app_name');
        $data['config'] = $config;
        $data['s_all'] = $this->session->all_userdata();

        $user_id = $data['s_all']['user_id'];

        $data['progress_biodata'] = $this->psb->getFieldById('status_biodata', 'users_biodata', 'id_users', $user_id);       
        $data['progress_data_ibu'] = $this->psb->getFieldById('status_ibu', 'users_biodata', 'id_users', $user_id);       
        $data['progress_data_ayah'] = $this->psb->getFieldById('status_ayah', 'users_biodata', 'id_users', $user_id);       
        $data['progress_data_sekolah'] = $this->psb->getFieldById('status_sekolah', 'users_biodata', 'id_users', $user_id);       
        $data['progress_data_nilai'] = $this->psb->getFieldById('status_nilai', 'users_nilai', 'id_users', $user_id);       
        $data['progress_data_file'] = $this->psb->getFieldById('status_file', 'users_file', 'id_users', $user_id);       
        
        $data['title'] = $config['app_name'] . ' - Form Ganti Kata Sandi';

        $data['isi'] = "v_changepassword";
        $data['js_footer'] = "v_changepassword_js";
        
        $this->load->view('v_template_admin', $data);

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
        
        $this->m_model->edit('users', 'id', $data);

        $data2['email'] = $this->security->xss_clean($this->input->post('user_email'));
        $data2['pass'] = $this->input->post('pass_2');
        $this->m_model->edit('ci_user_temp', 'email', $data2);

        
        echo json_encode(array("status" => TRUE));
    }

    public function add_user()
    {
        $this->form_validate_add();
        $hasher = new PasswordHash(8, TRUE);

        $user_fullname = strtoupper($this->security->xss_clean($this->input->post('user_fullname')));
        $user_email = str_replace(' ', '',$this->security->xss_clean($this->input->post('user_email')));
        $user_email = strtolower($user_email);

        $user_name = random_string('alnum', 15);
        $user_pass_1 = random_string('alnum', 15);

        $user_pass_2 = $hasher->HashPassword($user_pass_1);
        
        $data = array(
                        'user_name' => $user_name,
                        'user_pass' => $user_pass_2,
                        'user_fullname' => $user_fullname,
                        'user_email' => $user_email,
                        'id_role' => 3,
                        'is_aktif' => 1,
                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                        'date_created' => date ("Y-m-d H:i:s"),
                );

        $this->m_model->insert('users', $data);

        $data2['email'] = $user_email;
        $data2['user'] = $user_name;
        $data2['pass'] = $user_pass_1;
        $this->m_model->insert('ci_user_temp', $data2);

        // VF - sendmail here to peserta

        if ($this->config->item('email_signup_notif') == 1) {
            $isi = "Yth.<br><br>"
                    . "Bersama email ini kami informasikan User Pengguna dan Kata Sandi untuk aplikasi Penerimaan Siswa Baru Akademi Metrologi dan Instrumentasi Tahun Akademik 2017/2018, dengan rincian sebagai berikut<br><br>"
                    . "User Pengguna : ".$user_name."<br>"
                    . "Kata Sandi : ".$user_pass_1."<br>"
                    . "<br><br>"
                    . "User Pengguna dan Kata Sandi ini harap dijaga baik-baik.<br><br>"
                    . "Terimakasih atas perhatiannya.<br><br>"
                    . "Hormat Kami<br>"
                    . "Tim Akmet PSB 2017";
            $this->sendMail($user_email, $this->config->item('email_akmet_psb'), $this->config->item('nama_akmet_psb') , "AKMET PSB 2017 - Pendaftaran Akun", $isi);        
        }

        echo json_encode(array("status" => TRUE));

    }

    public function forgot() {
        
        // $this->check_signup_date();
                
        $config['app_name'] = $this->config->item('app_name');
        $config['g_recaptcha_enable_forgot'] = $this->config->item('g_recaptcha_enable_forgot');
        $config['g_recaptcha_site_key'] = $this->config->item('g_recaptcha_site_key');
        $data['config'] = $config;

        $this->load->library('captcha');
        $data['captcha'] = $this->captcha->main();
        $this->session->set_userdata('captcha_info', $data['captcha']);
        
        $data['title'] = $config['app_name'] . ' - Form Lupa Kata Sandi';
        $this->load->view('v_forgot', $data);

    }


    public function action_forgot()
    {
        $this->form_validate_forgot();
        $hasher = new PasswordHash(8, TRUE);

        // $user_fullname = strtoupper($this->security->xss_clean($this->input->post('user_fullname')));
        $user_email = str_replace(' ', '',$this->security->xss_clean($this->input->post('user_email')));
        $user_email = strtolower($user_email);

        $user_pass_1 = random_string('alnum', 15);

        $user_pass_2 = $hasher->HashPassword($user_pass_1);
        
        $data = array(
                        'user_pass' => $user_pass_2,
                        // 'user_fullname' => $user_fullname,
                        'user_email' => $user_email,
                );

        $this->m_model->edit('users', 'user_email', $data);

        $data2['email'] = $user_email;
        $data2['pass'] = $user_pass_1;
        $this->m_model->edit('ci_user_temp', 'email', $data2);

        // VF - sendmail here to peserta

        if ($this->config->item('email_forgot_notif') == 1) {
            $isi = "Yth.<br><br>"
                    . "Bersama email ini kami informasikan Kata Sandi baru untuk aplikasi Penerimaan Siswa Baru Akademi Metrologi dan Instrumentasi Tahun Akademik 2017/2018, dengan rincian sebagai berikut<br><br>"
                    . "Kata Sandi Baru : ".$user_pass_1."<br>"
                    . "<br><br>"
                    . "User Pengguna dan Kata Sandi ini harap dijaga baik-baik.<br><br>"
                    . "Terimakasih atas perhatiannya.<br><br>"
                    . "Hormat Kami<br>"
                    . "Tim Akmet PSB 2017";
            $this->sendMail($user_email, $this->config->item('email_akmet_psb'), $this->config->item('nama_akmet_psb') , "AKMET PSB 2017 - Kata Sandi Baru", $isi);        
        }

        echo json_encode(array("status" => TRUE));

    }




    private function form_validate_add()
    {

        $captcha_info = $this->session->userdata('captcha_info');

        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if(!preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $this->input->post('user_email')))
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Alamat email harus diisi atau tidak valid';
            $data['status'] = FALSE;
        }
        
        if($this->check_validate_user($this->input->post('user_email')) > 0)
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Alamat email telah terdaftar';
            $data['status'] = FALSE;
        }

        if($this->input->post('user_fullname') == '')
        {
            $data['inputerror'][] = 'user_fullname';
            $data['error_string'][] = 'Nama Lengkap harus diisi';
            $data['status'] = FALSE;
        }
        
        if($captcha_info['code'] != $this->input->post('captcha_code'))
        {
            $data['inputerror'][] = 'captcha_code';
            $data['error_string'][] = 'Pastikan anda bukan robot, jenis hurup sangat berpengaruh.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
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
            $data['error_string'][] = 'Kata sandi lama tidak ditemukan';
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

    private function form_validate_forgot()
    {

        $captcha_info = $this->session->userdata('captcha_info');

        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if(!preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $this->input->post('user_email')))
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Alamat email harus diisi atau tidak valid';
            $data['status'] = FALSE;
        }

        if($this->check_validate_user(strtolower($this->input->post('user_email'))) == 0)
        {
            $data['inputerror'][] = 'user_email';
            $data['error_string'][] = 'Alamat email anda tidak ditemukan';
            $data['status'] = FALSE;
        }
        
        if($captcha_info['code'] != $this->input->post('captcha_code'))
        {
            $data['inputerror'][] = 'captcha_code';
            $data['error_string'][] = 'Pastikan anda bukan robot, jenis hurup sangat berpengaruh.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function check_validate_user($user_email)
    {
        return $this->m_model->count_id('users', 'user_email', $user_email);
    }

    // private function check_signup_date()
    // {
    //     $date_s = $this->psb->getFieldByW("date_start", "agenda", "urut=1 AND is_aktif=1");
    //     $date_e = $this->psb->getFieldByW("date_end", "agenda", "urut=1 AND is_aktif=1");
        
    //     $now = time();
    //     $date_start = $date_s['date_start'];
    //     $date_end = $date_e['date_end'];

    //     // echo $now . " " . $date_start . " " . $date_end;
        
    //     if ($now < $date_start OR $now > $date_end) {

    //         // redirect(base_url());
    //         $this->load->view('v_no_access');
            
    //     }

    // }

    private function check_validate_pass($id)
    {
        $pass = $this->m_model->detail_row('users', 'id', $id);
        return $pass['user_pass'];
    }

    private function sendMail ($mailto="", $mailfrom="", $mailfromname="", $subject="", $isi="") {

        $this->load->library('email'); // Note: no $config param needed
        $this->email->from($mailfrom, $mailfromname);
        $this->email->to($mailto);
        $this->email->subject($subject);
        $this->email->message($isi);
        $this->email->send();        
    }

}