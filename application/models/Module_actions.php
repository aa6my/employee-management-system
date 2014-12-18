<?php
    /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_query_builder $db
    * @property CI_Session          $session
    */
  
  class Module_actions extends Base_model
  {
  
    function check_module()
    {
        $result=$this->db
               ->select('mod_id, name, isallow')
               ->order_by('sequence')
               ->get('ems_module')
               ->result_array();

        if (count($result)==0)
        {
            $this->set_error($this->lang->line('Module Available List Not Set'));
            return FALSE;
        }
	
        $this->session->set_userdata($result);      
        return TRUE;	
    }

    function is_allowed($moduleid)
    {
        foreach ($this->session->current->userdata as $value) {
            if(count($value) == 3)
            {
                if($moduleid == $value['mod_id'])
                {
                    if($value['isallow'] == 1)
                    {
                        return TRUE;
                    }
                    else
                    {
                        return FALSE;
                    }
                }
            }
        }
        
    }
  
  }

?>