<?php

class Teacherapi extends CI_Controller
{
	public function teacher_get()
	{
		$query = $this->db->query("SELECT * FROM teachers");
		if($query->num_rows() > 0)
		{
			$d['status']='200';
			$d['msg']='success';
			foreach ($query->result() as $row)
			{
				$d['data'][] = array(
										'id' => $row->id,
										'tid' => $row->tid,
										'name' => $row->name,
										'email' => $row->email,
										'contact' => $row->contact,
										'dob' => $row->dob,
										'username' => $row->username,
										'password' => $row->password

									);
			}
		}
		else
		{
			$d['status']='400';
			$d['msg']='No data found';
			$d['data']="";
		}
		echo json_encode($d);
	}

	public function teacher_post()
	{
		$d = array();
		$error = array();
		$d['tid'] = $_POST['tid'];
		$d['name'] = $_POST['name'];
		$d['email'] = $_POST['email'];
		$d['contact'] = $_POST['contact'];
		$d['dob'] = $_POST['dob'];
		$d['username'] = $_POST['username'];
		$d['password'] = $_POST['password'];
		if(!empty($d['tid']) && !empty($d['name']) && !empty($d['email']) && !empty($d['contact']) && !empty($d['dob']) && !empty($d['username']) && !empty($d['password']))
		{
			$query = $this->db->insert("teachers",$d);
		}
		else
		{
			$error['status'] = '400';
			$error['msg'] = 'Please fill all credentials';
			echo json_encode($error);
			exit();	
		}
		if($query)
		{
			$d['status'] = '200';
			$d['msg'] = 'Teacher has been added Successfully';
		}
		else
		{
			$error['status'] = '400';
			$error['msg'] = 'Failed to add Teacher';
		}
		echo json_encode($d);
	}

	public function teacher_delete($tid)	//http://localhost/Result/api/Teacherapi/teacher_delete/4
	{
		if($tid)
            $query = $this->db->delete('teachers', array('tid' => $tid));

        if($query)
        {
            $d['status']='200';
            $d['msg']='Teacher has been deleted successfully'; 
        }
        else
        {
            $d['status']='400';
            $d['msg']='No Teacher is deleted';
        }
         echo json_encode($d);
	}

	public function teacher_put()
	{
		$d = array();
		$error = array();
        $tid = $_POST['tid'];

        $d['name'] = $_POST['name'];
        $d['email'] = $_POST['email'];
        $d['contact'] = $_POST['contact'];
        $d['dob'] = $_POST['dob'];
        $d['username'] = $_POST['username'];
        $d['password'] = $_POST['password'];

        if(!empty($tid) && !empty($d['name']) && !empty($d['email']) && !empty($d['contact']) && !empty($d['dob']) && !empty($d['username']) && !empty($d['password']))
        {
            $this->db->where('tid',$tid);
            $q = $this->db->update('teachers',$d);
        }
        else
        {

        	$error['status']='400';
        	$error['msg']='Please fill all credentials';
        	echo json_encode($error);
        	exit();

        }

        if($q)
        {
            $d['status']='200';
            $d['msg']='Teacher has been successfully updated'; 
        }
        else
        {
            $error['status']='400';
            $error['msg']='Failed to Update Teacher';
        }
         echo json_encode($d);
	}
	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$d['username'] = $username;
		$d['password'] = $password;
		$query = $this->db->query("SELECT username, password FROM teachers WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
		if($query->num_rows() > 0)
		{
			$d['status']='200';
			$d['msg']='success';
		}
		else
		{
			$d['status']='400';
			$d['msg']='No data found';
		}
		echo json_encode($d);
	}

	//Admin Login
	public function adminlogin()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$d['username'] = $username;
		$d['password'] = $password;
		$query = $this->db->query("SELECT username, password FROM admin WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
		if($query->num_rows() > 0)
		{
			$d['status']='200';
			$d['msg']='success';
		}
		else
		{
			$d['status']='400';
			$d['msg']='No data found';
		}
		echo json_encode($d);
	}

	public function marks_post()
	{
		$d = array();
		$error = array();
		$d['rollno'] = $_POST['rollno'];
		$d['sub1'] = $_POST['sub1'];
		$d['sub2'] = $_POST['sub2'];
		$d['sub3'] = $_POST['sub3'];
		$d['sub4'] = $_POST['sub4'];
		$d['sub5'] = $_POST['sub5'];
		if(!empty($d['rollno']) && !empty($d['sub1']) && !empty($d['sub2']) && !empty($d['sub3']) && !empty($d['sub4']) && !empty($d['sub5']))
		{
			$query = $this->db->insert("marks",$d);
		}
		else
		{
			$error['status'] = '400';
			$error['msg'] = 'Please fill all credentials';
			echo json_encode($error);
			exit();	
		}
		if($query)
		{
			$d['status'] = '200';
			$d['msg'] = 'Marks has been added Successfully';
		}
		else
		{
			$error['status'] = '400';
			$error['msg'] = 'Failed to add Marks';
		}
		echo json_encode($d);
	}

	public function marks_get()
	{
		$query = $this->db->query("SELECT * FROM marks");
		if($query->num_rows() > 0)
		{
			$d['status']='200';
			$d['msg']='success';
			foreach ($query->result() as $row)
			{
				$d['data'][] = array(
										'rollno' => $row->rollno,
										'sub1' => $row->sub1,
										'sub2' => $row->sub2,
										'sub3' => $row->sub3,
										'sub4' => $row->sub4,
										'sub5' => $row->sub5
									);
			}
		}
		else
		{
			$d['status']='400';
			$d['msg']='No data found';
			$d['data']="";
		}
		echo json_encode($d);
	}

	public function marks_put()
	{
		$d = array();
		$error = array();
        $rollno = $_POST['rollno'];
        $d['sub1'] = $_POST['sub1'];
        $d['sub2'] = $_POST['sub2'];
        $d['sub3'] = $_POST['sub3'];
        $d['sub4'] = $_POST['sub4'];
        $d['sub5'] = $_POST['sub5'];

        if(!empty($rollno) && !empty($d['sub1']) && !empty($d['sub2']) && !empty($d['sub3']) && !empty($d['sub4']) && !empty($d['sub5']))
        {
            $this->db->where('rollno',$rollno);
            $q = $this->db->update('marks',$d);
        }
        else
        {

        	$error['status']='400';
        	$error['msg']='Please fill all credentials';
        	echo json_encode($error);
        	exit();

        }

        if($q)
        {
            $d['status']='200';
            $d['msg']='Marks has been successfully updated'; 
        }
        else
        {
            $error['status']='400';
            $error['msg']='Failed to Update Marks';
        }
         echo json_encode($d);
	}
	public function marks_delete($rollno)	//http://localhost/Result/api/Teacherapi/marks_delete/4
	{
		if($rollno)
            $query = $this->db->delete('marks', array('rollno' => $rollno));

        if($query)
        {
            $d['status']='200';
            $d['msg']='Marks has been deleted successfully'; 
        }
        else
        {
            $d['status']='400';
            $d['msg']='No Marks are deleted';
        }
         echo json_encode($d);
	}

	//Student Login
	public function student_login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$d['username'] = $username;
		$d['password'] = $password;
		$query = $this->db->query("SELECT username, password FROM students WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
		if($query->num_rows() > 0)
		{
			$d['status']='200';
			$d['msg']='success';
		}
		else
		{
			$d['status']='400';
			$d['msg']='No data found';
		}
		echo json_encode($d);
	}
	// public function student_marks()
	// {

	// 	$rollno = $_POST['rollno'];
	// 	$d['rollno'] = $rollno;
	// 	$query = $this->db->query("SELECT marks.rollno, marks.sub1, marks.sub2, marks.sub3, marks.sub4, marks.sub5 FROM students RIGHT JOIN marks ON students.rollno = marks.rollno WHERE marks.rollno='".$_POST['rollno']."'");

	// 	if($query->num_rows() > 0)
	// 	{
	// 		$d['status']='200';
	// 		$d['msg']='success';
			
	// 	}
	// 	else
	// 	{
	// 		$d['status']='400';
	// 		$d['msg']='No data found';
	// 		$d['data']="";
	// 	}
	// 	echo json_encode($d);
	// }

}//class

?>