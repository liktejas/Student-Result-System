<?php

class Studentmodelapi extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getRows($rollno)
	{
        if(!empty($rollno)){
            $query = $this->db->get_where('students', array('rollno' => $rollno));
            return $query->row_array();
        }else{
            $query = $this->db->get('students');
            return $query->result_array();
        }
    }

    public function insert($studentdata = array())
    {
        $insert = $this->db->insert('students', $studentdata);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function update($studentdata, $rollno) {
        if(!empty($studentdata) && !empty($rollno))
        {
            $update = $this->db->update('students', $studentdata, array('rollno'=>$rollno));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function delete($rollno)
    {
    	$delete = $this->db->delete('students',array('rollno'=>$rollno));
        return $delete?true:false;
    }

}


?>