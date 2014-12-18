<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_active_record $db
    * @property CI_Session          $session
    * @property user_actions          $user_actions
    */
  
  class Profile extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
          $this->load->model('user_actions');
          $this->load->model('module_actions');
          $this->user_actions->is_loged_in('selfservice');
      }
      
      function index()
      {
          $this->load->view('profile/index',array('profile'=>$this->user_actions->get_profile()));
      }
      
      function save_profile()
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules(array(
            array('field'=>'employee_name','rules'=>'required','label'=>$this->lang->line('Name')),
            array('field'=>'employee_email','rules'=>'required|valid_email','label'=>$this->lang->line('Email'))
          ));
          
          if ($this->form_validation->run()==FALSE)
          {
              exit($this->load->view('layout/error',array('message'=>$this->form_validation->error_string()),TRUE));
          }
          
          $this->user_actions->save_profile();
          $this->load->view('profile/update_profile');
      }
      
      function save_password()
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules(array(
            array('field'=>'current_password','rules'=>'required','label'=>$this->lang->line('Current password')),
            array('field'=>'new_password','rules'=>'required','label'=>$this->lang->line('New password')),
            array('field'=>'password_again','rules'=>'required','label'=>$this->lang->line('Password again'))
          ));
          
          if ($this->form_validation->run()==FALSE)
          {
              exit($this->load->view('layout/error',array('message'=>$this->form_validation->error_string()),TRUE));
          }
          
          if (!$this->user_actions->save_password())
          {
              exit($this->load->view('layout/error',array('message'=>$this->user_actions->get_error()),TRUE));
          }
          
          $this->load->view('layout/success',array('message'=>$this->lang->line('Done')));
      }
      
      function logout()
      {
          $this->user_actions->logout();
          header('Location:'.$this->config->item('base_url'));
      }
  }
?>