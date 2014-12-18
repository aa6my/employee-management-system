<?php
    /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_query_builder $db
    * @property CI_Session          $session
    */
  
  class Settings_actions extends Base_model
  {
      private function load_settings($setting_group)
      {
          return $this->db
                      ->select('setting_key,setting_value')  
                      ->where(array('setting_group'=>$setting_group))
                      ->get('settings')
                      ->result_array();
      }
      
      function get_setting($setting_name)
      {
          $result= $this->db
                        ->select('setting_value')  
                        ->where(array('setting_key'=>$setting_name))
                        ->get('settings')
                        ->row_array();
          return $result['setting_value'];
      }
      
      function get_settings($setting_group)
      {
           foreach($this->load_settings($setting_group) as $setting)
           {
               $new_settings[$setting['setting_key']]=$setting['setting_value'];
           }
           
           return $new_settings;
      }
      
      function save_setting($setting_key,$setting_value)
      {
          $this->db->update('settings',array('setting_value'=>$setting_value),array('setting_key'=>$setting_key));    
      }
      
      function save_settings($setting_group)
      {
          foreach($this->load_settings($setting_group) as $setting)
          {
              $this->save_setting($setting['setting_key'],$this->input->post($setting['setting_key']));
          }
          
          return TRUE;
      }
  }
?>