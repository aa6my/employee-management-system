<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_active_record $db
    * @property CI_Session          $session
    * @property timeoff_actions          $timeoff_actions
    */
  
  class Timeoff extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
          $this->load->model('user_actions');
          $this->load->model('module_actions');
          $this->user_actions->is_loged_in('timeoff');
      }
      
      function index()
      {
          $this->load->model('timeoff_actions');
          $this->load->view('timeoff/index',array('records'=>$this->timeoff_actions->get_records()));
      }
      
      function edit_record($record_id=0)
      {
          $this->load->model('timeoff_actions');
          $this->load->view('timeoff/record_edit',array('record'=>$this->timeoff_actions->get_record($record_id)));
      }
      
      function save_record()
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules(array(
            array('field'=>'record_id','rules'=>'required','label'=>'record_id'),
            array('field'=>'start_time','rules'=>'required','label'=>$this->lang->line('Start time')),
            array('field'=>'end_time','rules'=>'required','label'=>$this->lang->line('End time')),
            array('field'=>'type','rules'=>'required','label'=>$this->lang->line('Type'))
          ));
          
          if ($this->form_validation->run()==FALSE)
          {
              exit($this->load->view('layout/error',array('message'=>$this->form_validation->error_string()),TRUE));
          }
          
          $this->load->model('timeoff_actions');
          $this->load->view('timeoff/record_add',array('result'=>$this->timeoff_actions->save_record()));
      }
      
      function delete_record()
      {
          $this->load->model('timeoff_actions');
          $this->timeoff_actions->delete_record($this->input->post('record_id'));
          $this->load->view('timeoff/record_delete',array('record_id'=>$this->input->post('record_id')));
      }
      
      function new_record()
      {
          $this->load->view('timeoff/record_new');
      }
      
      function find_employee()
      {
          $this->load->model('employees_actions');
          echo json_encode($this->employees_actions->search_employee());
      }
      
      function requests()
      {
          $this->load->model('timeoff_actions');
          $this->load->view('timeoff/requests',array('records'=>$this->timeoff_actions->get_records('request')));
      }
      
      function view_request($record_id=0)
      {
          $this->load->model('timeoff_actions');
          $this->load->view('timeoff/record_view',array('record'=>$this->timeoff_actions->get_record($record_id,'request')));
      }
      
      function change_status()
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules(array(
            array('field'=>'record_id','rules'=>'required','label'=>'record_id'),
            array('field'=>'status','rules'=>'required','label'=>'status')
          ));
          
          if ($this->form_validation->run()==FALSE)
          {
              exit($this->load->view('layout/error',array('message'=>$this->form_validation->error_string()),TRUE));
          }
          
          $this->load->model('timeoff_actions');
          $this->timeoff_actions->change_status();
          $this->load->view('timeoff/record_change',array('record_id'=>$this->input->post('record_id')));
      }
  }
?>