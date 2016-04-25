<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:32 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once BASEPATH . "../application/libraries/utilities.php";

class BaseModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function debug($debugArray){
        echo "<pre>";
        print_r($debugArray);
        echo "</pre>";
    }

    function getPost($attr, $filter = true) {
        $return = trim($this->input->get_post($attr, $filter));
        return $return;
    }

    function postGet($attr, $filter = true) {
        $return = trim($this->input->post_get($attr, $filter));
        return $return;
    }

    function randomPassword($digit = 6){
        //Todo: Random algo implement
        return substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 5)) , 0, 5);
        //return "aBcXy9";
    }

    function sendEmail($to, $subject, $view, $data){
        $this->sendEmailWithMailer($to, $subject, $view, $data);
        return;
        $config = Array(
/*            'protocol' => 'sendmail',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'corpwidget@gmail.com',
            'smtp_pass' => 'widget123456',
            'smtp_timeout' => '4',*/
            'mailtype'  => 'html',
        );
        $message = $this->load->view("$view", $data, TRUE);
        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");
        //$this->email->from('no.reply@uiu.ac.bd', 'United International University');
        $this->email->from('rahima.rocky@gmail.com', 'UIU testing Mailer');
        $this->email->to($to);

        $this->email->subject("Testing email from UIU");
        $this->email->message($message);

        $this->email->send();
    }

    function sendEmailWithMailer($to, $subject, $view, $data){
        require BASEPATH . "../library/emailer/PHPMailerAutoload.php";

        $mail = new PHPMailer;
        $body = $this->load->view("$view", $data, TRUE);
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        /*var_dump(mail($to, $subject, $body, $headers));
        die;*/

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'corpwidget@gmail.com';                 // SMTP username
        $mail->Password = 'widget123456';                           // SMTP password 
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //$mail->SMTPDebug = 2;

        $mail->setFrom('corpwidget@gmail.com', 'UIU Mock Application');
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->addAddress($to);     // Add a recipient
        $mail->Subject = 'United International University';
        $mail->Body    = $body;
        if(!$mail->send()) {
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo 'Message has been sent';
        }
    }
}