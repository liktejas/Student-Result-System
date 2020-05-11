<?php

class Teachermodel extends CI_Model{

	function teacherlogin($username, $password)
	{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query = $this->db->get('teachers');
			if($query->num_rows() > 0)
			{
				return $query->row()->id;
			}
			else
			{
				return false;
			}
	}

	function studentmarks_list()
	{
		$studentmarks = $this->db->get('marks');
		return $studentmarks->result();
	}
	function save_studentmarks()
	{
		$data = array(
				'rollno' 	=> $this->input->post('rollno'), 
				'sub1' 	=> $this->input->post('sub1'), 
				'sub2' => $this->input->post('sub2'), 
				'sub3'   => $this->input->post('sub3'),
				'sub4' => $this->input->post('sub4'),
				'sub5' => $this->input->post('sub5')
			);
		$result=$this->db->insert('marks',$data);
		return $result;
	}
	function update_studentmarks()
	{
		$rollno=$this->input->post('rollno');
		$sub1=$this->input->post('sub1');
		$sub2=$this->input->post('sub2');
		$sub3=$this->input->post('sub3');
		$sub4=$this->input->post('sub4');
		$sub5=$this->input->post('sub5');

		//$this->db->set('rollno', $rollno);
		$this->db->set('sub1', $sub1);
		$this->db->set('sub2',$sub2);
		$this->db->set('sub3', $sub3);
		$this->db->set('sub4', $sub4);
		$this->db->set('sub5', $sub5);
		$this->db->where('rollno', $rollno);
		$result=$this->db->update('marks');
		return $result;
	}
	function delete_studentmarks()
	{
		$rollno=$this->input->post('rollno');
		$this->db->where('rollno', $rollno);
		$result=$this->db->delete('marks');
		return $result;
	}
	
}//Class

?>