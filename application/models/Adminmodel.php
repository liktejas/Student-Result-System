<?php

class Adminmodel extends CI_Model{

	function adminlogin($username, $password)
	{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query = $this->db->get('admin');
			if($query->num_rows() > 0)
			{
				return $query->row()->id;
			}
			else
			{
				return false;
			}
	}

	function student_list()
	{
		$studentdata = $this->db->get('students');
		return $studentdata->result();
	}

	function save_student(){
		$data = array(
				'rollno' 	=> $this->input->post('rollno'), 
				'name' 	=> $this->input->post('name'), 
				'email' => $this->input->post('email'), 
				'dob'   => $this->input->post('dob'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
		$result=$this->db->insert('students',$data);
		return $result;
	}

	function update_student(){
		$rollno=$this->input->post('rollno');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$dob=$this->input->post('dob');
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		//$this->db->set('rollno', $rollno);
		$this->db->set('name', $name);
		$this->db->set('email',$email);
		$this->db->set('dob', $dob);
		$this->db->set('username', $username);
		$this->db->set('password', $password);
		$this->db->where('rollno', $rollno);
		$result=$this->db->update('students');
		return $result;
	}
	function delete_student(){
		$rollno=$this->input->post('rollno');
		$this->db->where('rollno', $rollno);
		$result=$this->db->delete('students');
		return $result;
	}
	function teacher_list()
	{
		$teacherdata = $this->db->get('teachers');
		return $teacherdata->result();
	}
	function save_teacher(){
		$data = array(
				'tid' 	=> $this->input->post('tid'), 
				'name' 	=> $this->input->post('name'), 
				'email' => $this->input->post('email'), 
				'contact' => $this->input->post('contact'),
				'dob'   => $this->input->post('dob'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
		$result=$this->db->insert('teachers',$data);
		return $result;
	}
	function update_teacher(){
		$tid=$this->input->post('tid');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');
		$dob=$this->input->post('dob');
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$this->db->set('name', $name);
		$this->db->set('email',$email);
		$this->db->set('contact',$contact);
		$this->db->set('dob', $dob);
		$this->db->set('username', $username);
		$this->db->set('password', $password);
		$this->db->where('tid', $tid);
		$result=$this->db->update('teachers');
		return $result;
	}
	function delete_teacher(){
		$tid=$this->input->post('tid');
		$this->db->where('tid', $tid);
		$result=$this->db->delete('teachers');
		return $result;
	}

}//CI Model

?>
