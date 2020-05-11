<?php

class Studentmodel extends CI_model{

	function studentlogin($username, $password)
	{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query = $this->db->get('students');
			if($query->num_rows() > 0)
			{
				return $query->row()->rollno;
			}
			else
			{
				return false;
			}
	}
	function student_result_data()
	{
		$studentdata = $this->db->query("SELECT marks.rollno, marks.sub1, marks.sub2, marks.sub3, marks.sub4, marks.sub5 FROM students RIGHT JOIN marks ON students.rollno = marks.rollno WHERE marks.rollno=".$this->session->userdata('rollno'));
		return $studentdata->result();
	}



}

?>