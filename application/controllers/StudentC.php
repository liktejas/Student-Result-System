<?php

class StudentC extends CI_controller{

	public function index()
	{
		$this->load->view('Studentloginview');
	}

	public function form_validation()
	{
		//echo "Welcome";
		$this->form_validation->set_rules("username","Username",'required|alpha');
		$this->form_validation->set_rules('password',"Password",'required');
		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model("Studentmodel");
			$rollno = $this->Studentmodel->studentlogin($username, $password);
			if($rollno)
			{
				$session_data = array(
										'username' => $username,
										'rollno' => $rollno
									);
				
				$this->session->set_userdata($session_data);
				redirect(base_url().'StudentC/Student_check_marks');
			}
			else
			{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid Username and Password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url().'AdminC/loadstudentview');
			}
		}
		else
		{
			$this->index();
		}	
	}
	function Student_check_marks()
	{
		if(empty($_SESSION['username']))
		{
			redirect(base_url().'StudentC');
		}
		$this->load->view('Studentcheckmarks');
	}
	function logout(){
		$this->session->unset_userdata('username');
		redirect(base_url().'StudentC');
	}
	function student_result(){
		$this->load->model("Studentmodel");
		$data = $this->Studentmodel->student_result_data();
		//print_r($data);
		echo json_encode($data);
	}

}


?>