<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_active_record $db
    * @property CI_Session          $session
    * @property timeoff_actions          $timeoff_actions
    */
  
  class Attendance extends CI_Controller
  {
     function __construct()
     {
        parent::__construct();
        $this->load->model('attendance_actions');
        $this->user_actions->is_loged_in('attendance');
     }

      function index()
      {
          $startdatetime = date("Y-m-d H:i:s");
          $enddatetime = date('Y-m-d H:i:s', strtotime('+1 day', $startdatetime));
          $this->load->model('attendance_actions');
          $this->load->view('attendance/index',array('records'=>$this->attendance_actions->get_records_bydaterange($startdatetime, $enddatetime)));
      }
  }
  ?>