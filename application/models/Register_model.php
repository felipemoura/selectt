<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('user', $data);
    }
    
    //send verification email to user's email id
    function sendEmail($key, $to_email)
    {
        $from_email = 'selectttools@gmail.com'; //change this to yours
        $subject = 'Selectt Tool - Verify Your Email Address';
        $img = '<img alt="Brand" src="http://localhost:8888/selectt/assets/photos/selectt.png" style="max-width:280px; margin-top: -7px;">';
        $message =  $img . '<h1>Welcome to Selectt</h1><br><br>Dear User,<br><br>Please click on the below activation link to verify your email address.<br><br> http://localhost:8888/selectt/register/verify/' . $key . '<br><br><br>Thanks,<br>Selectt Team';
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'selectttool@gmail.com';
        $config['smtp_pass'] = 'selectt-labes';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Selectt');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    //activate user account
    function verifyEmailID($key)
    {
        $this->db->select ('*');
        $this->db->from('user');
        $this->db->where('ACTIVATIONKEY', $key);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() <= 0) {
            return FALSE;
        }

        $data = array('STATUS' => 1);
        $this->db->where('ACTIVATIONKEY = ', $key);
        return $this->db->update('user', $data);
    }
}
?>