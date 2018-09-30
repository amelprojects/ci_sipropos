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
        $kode=$this->mathcaptcha->generatekode();
        $this->session->set_userdata('captcha',$kode);     
        $data['captcha']=$this->mathcaptcha->showcaptcha();
        
        
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
        if($this->session->userdata('captcha') == $this->input->post('captcha_code')) {
    
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
                            'instansi' => $user_all['instansi'],
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
        } else {
            echo 99; // VF - captcha
        }
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


    public function register() {
                                
        $data['title'] = 'SIPROPOS - Rergister Form';

        // $data['captcha'] = $this->captcha->main();
        // $this->session->set_userdata('captcha_info', $data['captcha']);
        
        $this->load->library('mathcaptcha');
        $kode=$this->mathcaptcha->generatekode();
        $this->session->set_userdata('captcha',$kode);     
        $data['captcha']=$this->mathcaptcha->showcaptcha();
        
        $this->load->view('v_auth_register', $data);

    }

    public function register_action()
    {

        $this->load->library("php_mailer");
        $this->mail = $this->php_mailer->load();  
        
        $hasher = new PasswordHash(8, TRUE);

        $user_name = strtolower($this->security->xss_clean($this->input->post('user_name')));
        $user_pass = $this->security->xss_clean($this->input->post('user_pass'));
        $user_pass = $hasher->HashPassword($user_pass);
        $user_fullname = strtoupper($this->security->xss_clean($this->input->post('user_fullname')));
        $user_email = str_replace(' ', '',$this->security->xss_clean($this->input->post('user_email')));
        $user_email = strtolower($user_email);
        $instansi = strtoupper($this->security->xss_clean($this->input->post('instansi')));

        // $user_pass_1 = random_string('alnum', 15);
        // $user_pass_2 = $hasher->HashPassword($user_pass_1);

        // echo $this->check_validate_user("user_name", $user_name);
        // echo "-";
        // echo $this->check_validate_user("user_email", $user_email);
        
        if($this->session->userdata('captcha') == $this->input->post('captcha_code')) {

            if ($this->check_validate_user("user_name", $user_name)==0) {

                if ($this->check_validate_user("user_email", $user_email)==0) {
                    
                    $data = array(
                                    'user_name' => $user_name,
                                    'user_pass' => $user_pass,
                                    'user_email' => $user_email,
                                    'user_fullname' => $user_fullname,
                                    'instansi' => $instansi,
                                    'id_role' => 2,
                                    'is_aktif' => 0,
                                    'ip_address' => $_SERVER['REMOTE_ADDR'],
                                    'date_created' => date ("Y-m-d H:i:s"),
                            );

                    $this->m_model->insert('users', $data);

                    $dataemail = "<br><p>Kata Pengguna : ".$user_name;
                    $dataemail = "<br>Nama Lengkap : ".$user_fullname;
                    $dataemail .= "<br>Email : ".$user_email;
                    $dataemail .= "<br>instansi : ".strtoupper($instansi)."</p>";
                    $dataemail .= "<p>Harap segera ditindaklanjuti</p>";

                    $message = $this->template_email("Admin", "Pendaftaran Akun Banru", $dataemail);
                    $this->send_email("sipropos.kemendag@gmail.com","[SIPROPOS] - Pendaftaran Akun Baru",$message);

                } else {
                    echo 2;     //VF - failed email
                } 
            } else {
                echo 1;     //VF - failed username
            }
        } else {
            echo 99;
        }
        // echo json_encode(array("status" => TRUE));

    }


    private function check_validate_user($field, $value)
    {
        return $this->m_model->count_id('users', $field, $value);
    }

    public function forgot() {
                                
        $data['title'] = 'SIPROPOS - Forgot Password Form';

        // $data['captcha'] = $this->captcha->main();
        // $this->session->set_userdata('captcha_info', $data['captcha']);
        
        $this->load->library('mathcaptcha');
        $kode=$this->mathcaptcha->generatekode();
        $this->session->set_userdata('captcha',$kode);     
        $data['captcha']=$this->mathcaptcha->showcaptcha();
        
        $this->load->view('v_auth_forgot', $data);

    }


    public function forgot_action()
    {

        $this->load->library("php_mailer");
        $this->mail = $this->php_mailer->load();  

        $hasher = new PasswordHash(8, TRUE);

        $user_email = str_replace(' ', '',$this->security->xss_clean($this->input->post('user_email')));
        $user_email = strtolower($user_email);

        $user_pass_1 = $this->generateRandomString(6);
        // $user_pass_1 = random_string('alnum', 15);

        $user_pass_2 = $hasher->HashPassword($user_pass_1);

        if($this->session->userdata('captcha') == $this->input->post('captcha_code')) {

            if ($this->check_validate_user("user_email", $user_email)!=0) {
        
                $data = array(
                                'user_pass' => $user_pass_2,
                                'user_email' => $user_email,
                        );

                $this->m_model->edit('users', 'user_email', $data);

                $dataemail = "<p>Kata Sandi Baru : ".$user_pass_1."</p>";
                $dataemail .= "<p>Harap segera diganti kata sandi agar mudah diingat</p>";

                $message = $this->template_email($user_email, "Perubahan Kata Sandi", $dataemail);
                $this->send_email($user_email,"[SIPROPOS] - Perubahan Kata Sandi",$message);

            } else {
                echo 1;     //VF - failed email
            }

        } else {
            echo 99;    //VF - failed captcha
        }

    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function check_validate_pass($id)
    {
        $pass = $this->m_model->detail_row('users', 'id', $id);
        return $pass['user_pass'];
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


    private function sendMail ($mailto="", $mailfrom="", $mailfromname="", $subject="", $isi="") {

        $this->load->library('email'); // Note: no $config param needed
        $this->email->from($mailfrom, $mailfromname);
        $this->email->to($mailto);
        $this->email->subject($subject);
        $this->email->message($isi);
        $this->email->send();        
    }


}