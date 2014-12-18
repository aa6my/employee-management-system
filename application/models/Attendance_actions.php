<?php
    /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_query_builder $db
    * @property CI_Session          $session
    * @property settings_actions          $settings_actions
    */

  class Attendance_actions extends Base_model
  {
    
		function get_records_bydaterange($startdatetime,$enddatetime)
		{

		  return $this->db
                   ->select('employees.employee_id, employees.name, employees.avatar, employees.ssn, attendance_tracking.punch_in_utc_time,attendance_tracking.punch_out_utc_time')
					         ->join('employees','employees.employee_id = attendance_tracking.employee_id', 'LEFT')
                   ->where('employees.status', 'Active')
                   ->where('attendance_tracking.punch_in_utc_time >='.$startdatetime.' and attendance_tracking.punch_in_utc_time <'.$enddatetime,'', FALSE)
                   ->order_by('employees.name')
                   ->get('attendance_tracking')
                   ->result_array();


		}

    function get_records_bydaterangeNdept($startdatetime,$enddatetime,$dept)
    {

      return $this->db
                   ->select('employees.employee_id, employees.name, employees.avatar, employees.ssn, attendance_tracking.punch_in_utc_time,attendance_tracking.punch_out_utc_time')
                   ->join('employees','employees.employee_id = attendance_tracking.employee_id', inner)
                   ->join('employees_positions','employees.employee_id = employees_positions.employee_id', inner)
                   ->join('departments','employees_positions.department_id = departments.department_id', inner) 
                   ->where('employees.status', 'Active')
                   ->where('departments.department_id',$dept)
                   ->where('attendance_tracking.punch_in_utc_time >='.$startdatetime.' and attendance_tracking.punch_in_utc_time <'.$enddatetime,'', FALSE)
                   ->order_by('employees.name')
                   ->get('attendance_tracking')
                   ->result_array();

    }
		
		function save_attendance()
		{

      $data=array(       
        'employee_id'=>$this->input->get('employee_id'),
        'punch_in_user_time'=>$this->input->get('punch_in_user_time'),
        'punch_in_note'=>$this->input->get('punch_in_note'),
        'punch_out_user_time'=>$this->input->get('punch_out_user_time'),
        'punch_out_user_time'=>$this->input->get('punch_out_user_time'),
        'state'=>$this->input->get('state'),
      );
          
          if ($this->input->get('attendance_id')=='0')
          {
              $this->db->insert('attendance_tracking',$data);
              return $this->db->insert_id();
          }
          
          $this->db->where('attendance_id',$this->input->get('attendance_id'));
          $this->db->update('attendance_tracking', $data); 

          return $this->input->get('attendance_id'); 
		}

    function delete_attendance($attendance_id)
    {
      $this->db->delete('attendance_tracking', array('attendance_id' => $attendance_id)); 

    }
  }
  ?>