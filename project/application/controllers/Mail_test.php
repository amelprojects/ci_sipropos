<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();		
		$this->load->helper(array('url'));

		// $this->load->helper('email');
	}

	public function index()
	{
		$this->load->library("php_mailer");
		$this->mail = $this->php_mailer->load();  

		$this->load->view('welcome_message');
		$message = $this->template_email(1, "ayu.sagita@gmail.com", "passw0rd", '');
		$this->send_email("ayu.sagita@gmail.com","passw0rd",$message);

	}

	public function send_email_google()
	{
	    $this->load->library('email');
	    $this->load->library('parser');

	    $this->email->clear();

		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "joyaryapurnama@gmail.com"; 
		$config['smtp_pass'] = "Byhveank..";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

	    $this->email->initialize($config);
	    $this->email->set_newline("\r\n");
	    $this->email->from('verafirmansyah@live.com', 'VF Mail Test');
	    $list = array('verafirmansyah@gmail.com', 'verafirmansyah.online@gmail.com');
	    $this->email->to($list);
	    // $data = array();
	    // $htmlMessage = $this->parser->parse('messages/email', $data, true);
	    $message = $this->template_email(1, "verafirmansyah.online@gmail.com", "passw0rd", '');
	    $this->email->subject('This is an email test');
	    $this->email->message($message);



	    if ($this->email->send()) {
	        echo 'Your email was sent, thanks chamil.';
	    } else {
	        show_error($this->email->print_debugger());
	    }		
	}

	private function send_email($email, $password, $message){

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
		    $this->mail->addAddress($email);     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $this->mail->isHTML(true);                                  // Set email format to HTML
		    $this->mail->Subject = 'Sipropos Mail Tes';
		    $this->mail->Body    = $message;
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $this->mail->send();
		    //echo 'Message has been sent';
		} catch (Exception $e) {
		    //echo 'Message could not be sent.';
		    //echo 'Mailer Error: ' . $mail->ErrorInfo;
		}

		
	}

	private function template_email($status, $nama, $password, $alasan){

		// $status = 1;
		$content = '';
		$content .= "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
		$content .= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
		$content .= "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";

		$content .= "<div style='padding: 10px; background-color: #2f506c;' class='col-md-12'>";
		// $content .= "<div class='col-md-1 col-md-offset-1 img-responsive'><img src=".base_url('assets/images/akmet_jpg.png')." width='80px'></div>";
		// $content .= "<div class='col-md-9' style='color: white;'><h2>".$datappdb->NAMA_PPDB."</h2></div></div>";
		$content .= "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='color:#fff; margin-left:50px;'><tr><td width='100px;'><img src=".base_url('')." width='80px'></td><td><h2>VF</h2></td></tr></table>";
		$content .= "</div>";
		if($status == 1){
			$content .= "<div class='col-md-10 col-md-offset-2' style='margin-top:15px; font-size:14px; margin-left:70px;'><h3>Lupa Password Berhasil</h3></div>";
		}else{
			$content .= "<div class='col-md-10 col-md-offset-2' style='margin-top:15px; font-size:14px; margin-left:70px;><h3>Lupa Password Gagal</h3></div>";
		}

		$content .= "<div class='col-md-12' style='text-align:center; margin-top: 10px; color:#000000;'>";
		$content .= "<h3>Hallo ".$nama." !</h3>";
		// $content .= "<h3>Hallo Leksa !</h3>";
		$content .= "<p>Perlu kami informasikan terkait lupa password yang anda lakukan</p>";
		$content .= "<p>Bahwa lupa password yang anda lakukan</p>";
		if($status == 1){
			$content .= "<h4>Berhasil</h4>";
			$content .= "<p>Berikut merupakan password baru yang dapat digunakan untuk masuk ke website PPDB</p>";
			$content .= "<br><p>Password : ".$password."</p><br>";
			// $content .= "<br><p>Password : ABCD1234 </p><br>";
			$content .= "<p>Harap segera lengkapi data-data anda sebelum proses pendaftaran berakhir</p>";
		}else{
			$content .= "<h4>Tidak Berhasil</h4>";
			$content .= "<p>Dikarenakan:</p>";
			if($alasan != null){
				$content .= "<p>".$alasan."</p>";
			}else{
				$content .= "<p>Pertimbangan tertentu</p>";
			}
		}
		$content .= "</div>";
		$content .= "<div class='col-md-12' style='padding: 10px; background-color: #2f506c; color: #fff; margin-top: 30px;'>";
		$content .= "<div class='col-md-10' style='margin-left:50px;'><h3>VF</h3></div></div>";

		return $content;
	}

}
