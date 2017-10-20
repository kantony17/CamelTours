<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Password_Reset_Model extends CI_Model
  {
    public function get_data() {
      // Get the user input.
      $form_data = array(
        'new_password' => MD5($this->input->post('new_password')),
        'confirm_new_password' => MD5($this->input->post('confirm_new_password'))
       );
       // Check whether we are missing any required parameters.
       $form_data['complete'] = array_search('', $form_data) == false;
       // Check whether the user's new password and new password confirmation match.
       $form_data['pass_match'] = ($form_data['new_password'] == $form_data['confirm_new_password']);
       // Return the form data.
       return $form_data;
    }
  }

?>