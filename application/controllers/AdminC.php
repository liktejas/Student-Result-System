<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class AdminC extends CI_Controller 
{	
	public function index()
	{
		$this->load->view('Adminloginview');
	}
	public function loadstudentview()
	{
		$this->load->view('Studentloginview');
	}
	public function loadteacherview()
	{
		$this->load->view('Teacherloginview');
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
			$this->load->model("Adminmodel");
			$login_id = $this->Adminmodel->adminlogin($username, $password);
			if($login_id)
			{
				$session_data = array(
										'username' => $username,
										'id' => $login_id
									);
				$this->session->set_userdata($session_data);
				redirect(base_url().'AdminC/AdminRegister');
			}
			else
			{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid Username and Password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url().'AdminC/index');
			}
		}
		else
		{
			$this->index();
		}	
	}
	public function AdminRegister()
	{
		if(empty($_SESSION['username']))
		{
			redirect(base_url().'AdminC');
		}
		$this->load->view('AdminRegister');
	}
	public function StudentRegisterview()
	{
		if(empty($_SESSION['username']))
		{
			redirect(base_url().'AdminC');
		}
		$this->load->view("StudentRegister");
	}
	public function TeacherRegisterview()
	{
		if(empty($_SESSION['username']))
		{
			redirect(base_url().'AdminC');
		}
		$this->load->view("TeacherRegister");
	}
	function student_data()
	{
		$this->load->model("Adminmodel");
		// $data = $this->db->get('students');
		//$data['data'] = $this->Adminmodel->student_list();
		$data = $this->Adminmodel->student_list();
		//print_r($data);
		echo json_encode($data);
	}
	function student_save()
	{
		$this->form_validation->set_rules("rollno","Roll No.",'required');
		$this->form_validation->set_rules("name","Name",'required');
		$this->form_validation->set_rules("email","Email",'required');
		$this->form_validation->set_rules("dob","Date of Birth",'required');
		$this->form_validation->set_rules("username","Username",'required');
		$this->form_validation->set_rules("password","Password",'required');
		if($this->form_validation->run())
		{
		$this->load->model("Adminmodel");
		$data=$this->Adminmodel->save_student();
		echo json_encode($data);
		}
		else
		{
			$this->TeacherRegisterview();
		}
	}
	function student_update()
	{
		$this->load->model("Adminmodel");
		$data=$this->Adminmodel->update_student();
		echo json_encode($data);
	}
	function student_delete(){
		$this->load->model("Adminmodel");
		$data=$this->Adminmodel->delete_student();
		echo json_encode($data);
	}
	function teacher_data()
	{
		$this->load->model("Adminmodel");
		$data = $this->Adminmodel->teacher_list();
		// print_r($data);
		echo json_encode($data);
	}
	function teacher_save()
	{
		$this->form_validation->set_rules("tid","Teacher Id.",'required');
		$this->form_validation->set_rules("name","Name",'required');
		$this->form_validation->set_rules("email","Email",'required');
		$this->form_validation->set_rules("contact","Contact",'required');
		$this->form_validation->set_rules("dob","Date of Birth",'required');
		$this->form_validation->set_rules("username","Username",'required');
		$this->form_validation->set_rules("password","Password",'required');
		if($this->form_validation->run())
		{
			$this->load->model("Adminmodel");
			$data=$this->Adminmodel->save_teacher();
			echo json_encode($data);
		}
		else
		{
			$this->StudentRegisterview();
		}
	}
	function teacher_update()
	{
		$this->load->model("Adminmodel");
		$data=$this->Adminmodel->update_teacher();
		echo json_encode($data);
	}
	function teacher_delete(){
		$this->load->model("Adminmodel");
		$data=$this->Adminmodel->delete_teacher();
		echo json_encode($data);
	}
	function home(){
		$this->AdminRegister();
	}
	function logout(){
		$this->session->unset_userdata('username');
		redirect(base_url().'AdminC');
	}
}

