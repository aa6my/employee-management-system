<?php
    /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_query_builder $db
    * @property CI_Session          $session
    */
  
  class Timeoff_actions extends Base_model
  {
      function get_records($status=array('approved','denied'))
      {
          return $this->db
                      ->select('record_id, start_time, end_time, type, name, timeoff.status,type')  
                      ->join('employees','employees.employee_id = timeoff.employee_id','LEFT')
                      ->where_in('timeoff.status',$status)
                      ->get('timeoff')
                      ->result_array();
      }
      
      function get_record($record_id,$status=array('approved','denied'))
      {
          return $this->db
                      ->select('*')
                      ->where('record_id',$record_id)
                      ->where_in('status',$status)
                      ->get('timeoff')
                      ->row_array();
      }
      
      function save_record()
      {
          $employee_id=$this->input->post('employee_id');
          $employee_id=$employee_id[0];
          
          $data=array(
            'start_time'=>date('Y-m-d H:i',strtotime($this->input->post('start_time'))),
            'end_time'=>date('Y-m-d H:i',strtotime($this->input->post('end_time'))),
            'type'=>$this->input->post('type')
          );
          
          if ($employee_id==$this->session->current->userdata('employee_id'))
          {
              $data['employee_comment']=$this->input->post('employee_comment');
          }
          else
          {
              $data['comment']=$this->input->post('comment');
          }
          
          if ($this->input->post('record_id')=='0')
          {
              $data['employee_id']=$employee_id;
              $data['status']=($employee_id==$this->session->current->userdata('employee_id'))?'request':'approved';
              
              $this->db->insert('timeoff',$data);
              return $this->db->insert_id();
          }
          
          $this->db->update('timeoff',$data,array('record_id'=>$this->input->post('record_id')));
          return TRUE;
      }
      
      function delete_record($record_id)
      {
          $this->db->delete('timeoff',array('record_id'=>$record_id));
      }
      
      function change_status()
      {
          $this->db->update('timeoff',
            array(
                'status'=>$this->input->post('status'),
                'comment'=>$this->input->post('comment')
            ),
            array(
                'record_id'=>$this->input->post('record_id')
            )
          );
      }
      
      function get_employee_records()
      {
          return $this->db
                      ->select('record_id,start_time, end_time, type, status')
                      ->where('employee_id',$this->session->current->userdata['employee_id'])
                      ->get('timeoff')
                      ->result_array();
      }
  }
?>