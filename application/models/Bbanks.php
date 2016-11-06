<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bbanks extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
    
    function insert($data){
        $this->db->set($data);
        if($this->db->insert('users')){
            return true;
        }  else {
            return false;
        }
    }
    
    function getAllBloodbanks($search_data){
        if(!empty ($search_data['k_search'])){
            $query = $this->db->query("select *,eb.name as eb_branch,eb.status as eb_status from entities e join entity_branches eb on e.id=eb.entity_id join entity_types et on e.entity_type=et.id where et.id=2 and (e.name like '%".$search_data['k_search']."%' or e.description like '%".$search_data['k_search']."%')");
        }  else {
            $query = $this->db->query("select *,eb.name as eb_branch,eb.status as eb_status from entities e join entity_branches eb on e.id=eb.entity_id join entity_types et on e.entity_type=et.id where et.id=2");    
        }        
        $data = $query->result();
        return $data;
    }   
    
    function getAllUsers(){
        $query = $this->db->query("select * from users");
        $result = $query->result();
        return $result;
    }
    
    function createBbank($reqdata){
        $this->db->trans_start();
        $result = FALSE;
        $query = $this->db->query("insert into entities(entity_type,name,description,status,website,created_at,created_by,modified_at,modified_by) values('".$reqdata['e_type']."',".$this->db->escape($reqdata['e_name']).",".$this->db->escape($reqdata['e_description']).",".$reqdata['e_status'].",".$this->db->escape($reqdata['e_website']).",now(),'1',now(),'1')");
        if($query){
            $query_result = $this->db->query("insert into entity_branches(entity_id,name,addressline1,addressline2,city,state,country,zipcode,poc_name,mobile,landline,email,status,created_at,created_by,modified_at,modified_by) values('".$this->db->insert_id()."',".$this->db->escape($reqdata['e_name'].$reqdata['e_loc_city']).",".$this->db->escape($reqdata['e_loc_addressline1']).",".$this->db->escape($reqdata['e_loc_addressline2']).",".$this->db->escape($reqdata['e_loc_city']).",".$this->db->escape($reqdata['e_loc_state']).",'India',".$this->db->escape($reqdata['e_loc_zipcode']).",".$this->db->escape($reqdata['e_poc_firstname'].$reqdata['e_poc_lastname']).",".$this->db->escape($reqdata['e_poc_mobile']).",".$this->db->escape($reqdata['e_loc_phone']).",".$this->db->escape($reqdata['e_poc_email']).",".$reqdata['e_status'].",now(),'1',now(),'1')");
            if($query_result){
                $result = $this->db->insert_id();
                $this->db->trans_complete();
            }
        }
        return $result;
    }

    function raiserequest($reqdata){
        $this->db->trans_start();
        $result = FALSE;
        $query = $this->db->query("insert into blood_requests(blood_group,no_of_units,required_date,required_time,hospital_name,loc_addressline1,loc_addressline2,loc_city,loc_state,loc_zipcode,poc_name,poc_email,poc_mobile,raised_by) values(".$this->db->escape($reqdata['blood_group']).",".$this->db->escape($reqdata['no_of_units']).",".$this->db->escape($reqdata['required_date']).",".$this->db->escape($reqdata['required_time']).",".$this->db->escape($reqdata['hospital_name']).",".$this->db->escape($reqdata['loc_addressline1']).",".$this->db->escape($reqdata['loc_addressline2']).",".$this->db->escape($reqdata['loc_city']).",".$this->db->escape($reqdata['loc_state']).",".$this->db->escape($reqdata['loc_zipcode']).",".$this->db->escape($reqdata['poc_name']).",".$this->db->escape($reqdata['poc_email']).",".$this->db->escape($reqdata['poc_mobile']).",".$this->db->escape($reqdata['raised_by']).")");
        if($query){
            $result = $this->db->insert_id();
            $this->db->trans_complete();
        }
        return $result;
    }

    function raisedrequests($reqdata){
        $result = FALSE;
        $query = $this->db->query("select * from blood_requests where raised_by=".$this->db->escape($reqdata['raised_by']));
        if($query){
            $result = $query->result();
        }
        return $result;
    }
    
}

?>