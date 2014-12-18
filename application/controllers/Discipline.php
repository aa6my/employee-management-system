<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_active_record $db
    * @property CI_Session          $session
    * @property discipline_actions          $discipline_actions
    */
  
  class Discipline extends CI_Controller
  {
      function __construct()
      {
          parent::__construct();
          $this->load->model('user_actions');
          $this->load->model('module_actions');
          $this->user_actions->is_loged_in('discipline');
      }
      
      function index()
      {
          $this->load->model('discipline_actions');
          $this->load->view('discipline/index',array('discipline'=>$this->discipline_actions->get_records()));
      }
      
      function edit_record($record_id=0)
      {
          $this->load->model('discipline_actions');
          $this->load->view('discipline/record_edit',array('record'=>$this->discipline_actions->get_record($record_id)));
      }
      
      function save_record()
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules(array(
            array('field'=>'record_id','rules'=>'required','label'=>'record_id'),
            array('field'=>'employee_id[]','rules'=>'required','label'=>'employee_id'),
            array('field'=>'headline','rules'=>'required','label'=>$this->lang->line('Headline')),
            array('field'=>'date','rules'=>'required','label'=>$this->lang->line('Date')),
            array('field'=>'description','rules'=>'required','label'=>$this->lang->line('Description'))
          ));
          
          if ($this->form_validation->run()==FALSE)
          {
              exit($this->load->view('layout/error',array('message'=>$this->form_validation->error_string()),TRUE));
          }
          
          $this->load->model('discipline_actions');
          $this->load->view('discipline/record_add',array('result'=>$this->discipline_actions->save_record()));
      }
      
      function delete_record($record_id=0)
      {
          $this->load->model('discipline_actions');
          $this->discipline_actions->delete_record($record_id);
          $this->load->view('layout/success',array('message'=>$this->lang->line('Deleted')));
          $this->load->view('layout/redirect',array('url'=>$this->config->item('base_url').'discipline'));
      }
      
      function new_record()
      {
          $this->load->view('discipline/record_new');
      }
      
      function find_employee()
      {
          $this->load->model('employees_actions');
          echo json_encode($this->employees_actions->search_employee());
      }
  }
?>