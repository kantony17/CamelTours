<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Forgot extends CI_Controller
  {
    public function index($email=null, $error=null) {
      // Get the name of the page from the class.
      $data['title'] = get_class($this);
      $page = strtolower($data['title']);
      // Make sure that the view for this page exists!
      if (!file_exists(APPPATH.'/views/'.$page.'.php'))
        show_404();
      // Set additional data parameters.
      $data['email'] = $email;
      $data['error'] = $error;
      // Load our templates and the view for this page.
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view($page, $data);
      $this->load->view('templates/footer', $data);
    }
    public function send_form() {
      $email = $this->input->post('email');
      $this->db->where('email', $email);
      // If the form is incomplete, show an error.
      if (!$email) {
        $error = 'You must enter an email address.';
        $this->index($email, $error);
      }
      // If we can't find the user, show an error.
      elseif ($this->db->get('users')->num_rows() != 1) {
        $error = 'Associated CamelTours account not found.';
        $this->index($email, $error);
      }
      // Otherwise, send the email and thank the user.
      else {
        $this->db->where('email', $email);
        $count_check = $this->db->count_all_results('users');
        if ($count_check == 1) {
          $this->db->where('email', $email);
          $temp_pass = $this->randomPassword()
          $temp_pass_hash = MD5($temp_pass);
          $this->db->update('users', array('password' => $temp_pass_hash));
        }
          
        $crlf = "\r\n";
        $body = 'A forgotten password form for '.$email.' has been submitted on CamelTours.org.'.$crlf.$crlf
              . 'If you did not initiate this request, please contact knghiem@conncoll.edu.'.$crlf.$crlf
              . 'Your temporary password is: '.$temp_pass.''.$crlf.$crlf
              . 'Log in to your account with this temporary password and change your password.';
        $this->load->library('email');
        $this->email->from('admin@cameltours.org', 'CamelTours Admin');
        $this->email->to($email);
        $this->email->subject('Forgot Password Form Submission');
        $this->email->message($body);
        $this->email->send();
        // Thank the user!
        redirect('thanks');
      }
    }
      
    public function randomPassword(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1; //last index of the array = len array - 1
        for ($i = 0; $i < 7; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $pass[] = 1;
        return implode($pass); //turn the array into a string
    }  
  }

?>