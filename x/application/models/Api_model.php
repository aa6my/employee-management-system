<?php

   /**
    * @property CI_Loader           $load
    * @property CI_Form_validation  $form_validation
    * @property CI_Input            $input
    * @property CI_DB_active_record $db
    * @property CI_Session          $session
    */

class Api_model extends CI_Model
{
  function __construct()
    {
  
        parent::__construct();
    }

  function get_data_join($table,$where, $join_to, $join_id, $likes, $places)
    {

            $this->db->select('*');
            $this->db->from($table);

            if($where!=false){
               $this->db->where($where);
            }
           
           if($join_to!=false && $join_id!=false){
                for ($i=0; $i < count($join_to); $i++){
                    $this->db->join($join_to[$i], $join_to[$i].".".$join_id[$i]." = ".$table.".".$join_id[$i]);
                }
                
           }

           if($likes!=false){
            $this->db->like($likes, 'after'); 
           }
            
            $query = $this->db->get();
            return $query->result_array(); 
            
    }



    /**
     * [get_specified_row This function can use for all the tables, default function is to call the specified results rows in table]
     * @param  [string] $table [name of table you want to fetch data]
     * @param  [array] $where [where condition]
     * @param  [array] $order_by [order by]
     * @return [type] [return sepcified row]
     */
    function get_specified_row($table,$where,$order_by,$tableNameToJoin, $tableRelation)
    {
        
        $this->db->select('*');
        $this->db->from($table);

        if($where!=false)
        {
             $this->db->where($where); 
        }

        if($order_by!=false)
        {
            $this->db->order_by($order_by[0], $order_by[1]);
        }

        if($tableNameToJoin && $tableRelation){

                $this->db->join($tableNameToJoin, $tableRelation);
           }

        $query = $this->db->get();
        return $query->row_array();    
    }

    /**
    * [get_all_rows This function can use for all the tables, default function is to call all the results rows in table]
    * @param  [string] $table [name of table you want to fetch data]
    * @param  [array] $where [condition to apply]
    * @return [type]        [return data sets]
    */
   
  function get_all_rows($table,$where, $tableNameToJoin, $tableRelation, $likes, $places)
    {

            $this->db->select('*');
            $this->db->from($table);

            if($where!=false){
               $this->db->where($where);
            }
           
           if($tableNameToJoin!=false && $tableRelation!=false){

                $this->db->join($tableNameToJoin, $tableRelation);
           }

           if($likes!=false){
            $this->db->like($likes, 'after'); 
           }
      
            $query = $this->db->get();
            return $query->result_array(); 
           }

     /**
     * [insert_new_data insert data into table - any type of table]
     * @param  [type] $arrayData [data value received from controller(column and value already)]
     * @param  [type] $table     [name of table to insert the data]
     * @return [type]            [description]
     */
     function insert_new_data($arrayData,$table)
    {

        $this->db->insert($table,$arrayData);
        //$this->db->_error_message();
       // return  $this->db->_error_message();
        return $this->db->insert_id();
    }

     /**
     * [delete_data delete all type of table]
     * @param  [type] $table [name of table]
     * @param  [type] $where [condition to applied]
     * @return [type]        [description]
     */
    public function delete_data($table, $where){

        $this->db->where($where);
        $this->db->delete($table);
    }

     /**
     * [update_data update datas in any tables you want]
     * @param  [array] $columnToUpdate [what column you want to update = array value]
     * @param  [string] $tableToUpdate  [what table you want to update]
     * @param  [array] $usingCondition [using condition or not]
     * @return [type]                 [description]
     */
    
    function update_data($columnToUpdate, $tableToUpdate, $usingCondition)
    {
        
        $this->db->where($usingCondition);
        $this->db->update($tableToUpdate, $columnToUpdate);


    }

    /** Api only */

    public function get_all_orderby($table, $order_id, $order_val)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_id, $order_val);
        $query = $this->db->get();
        return $query->row_array();
    }
}