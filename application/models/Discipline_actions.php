<?php
    /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_query_builder $db
    * @property CI_Session          $session
    */
  class Discipline_actions extends Base_model
  {
      function get_records()
      {
          return $this->db
                      ->select('record_id, date, headline, name')
                      ->join('employees','employees.employee_id = discipline.employee_id','LEFT')
                      ->get('discipline')
                      ->result_array();
      }
      
      function get_record($record_id)
      {
          return $this->db
                      ->select('discipline.*, name,avatar, position_name, department_name')
                      ->join('employees','employees.employee_id = discipline.employee_id','LEFT') 
                      ->join('employees_positions','employees_positions.employee_id = employees.employee_id AND employees_positions.is_current=1','LEFT')
                      ->join('positions','positions.position_id = employees_positions.position_id','LEFT')
                      ->join('departments','departments.department_id = employees_positions.department_id','LEFT')
                      ->where('record_id',$record_id)
                      ->get('discipline')
                      ->row_array();
      }
      
      function save_record()
      {
          $data=array(
            'date'=>date('Y-m-d',strtotime($this->input->post('date'))),
            'headline'=>$this->input->post('headline'),
            'description'=>$this->input->post('description'),
            'comment'=>$this->input->post('comment'),
            'taken_actions'=>$this->input->post('taken_actions')
          );
          
          if ($this->input->post('record_id')=='0')
          {
              $employee_id=$this->input->post('employee_id');
              $data['employee_id']=$employee_id[0];
              $this->db->insert('discipline',$data);
              return $this->db->insert_id();
          }
          
          $this->db->update('discipline',$data,array('record_id'=>$this->input->post('record_id')));
          return TRUE;
      }
      
      function delete_record($record_id)
      {
          $this->db->delete('discipline',array('record_id'=>$record_id));
      }
      
      function get_employee_records()
      {
          return $this->db
                      ->select('record_id, headline, date')
                      ->where('employee_id',$this->session->current->userdata('employee_id'))
                      ->order_by('date','DESC')
                      ->limit(5)
                      ->get('discipline')
                      ->result_array();
      }
      
      function save_comment()
      {
          $this->db->update('discipline',array('comment'=>$this->input->post('comment')),array('record_id'=>$this->input->post('record_id'),'employee_id'=>$this->session->current->userdata('employee_id')));
          
      }
  }
?>