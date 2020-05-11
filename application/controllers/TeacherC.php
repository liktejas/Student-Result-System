<?php

class TeacherC extends CI_Controller{
	
	public function index()
	{
		$this->load->view('Teacherloginview');
	}
	public function form_validation()
	{
		$this->form_validation->set_rules("username","Username",'required|alpha');
		$this->form_validation->set_rules('password',"Password",'required');
		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model("Teachermodel");
			$login_id = $this->Teachermodel->teacherlogin($username, $password);
			if($login_id)
			{
				$session_data = array(
										'username' => $username,
										'id' => $login_id
									);
				$this->session->set_userdata($session_data);
				redirect(base_url().'TeacherC/marksentry');
			}
			else
			{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid Username and Password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url().'AdminC/loadteacherview');
			}
		}
		else
		{
			$this->index();
		}
	}
	public function marksentry()
	{
		if(empty($_SESSION['username']))
		{
			redirect(base_url().'TeacherC');
		}
		$this->load->view('marksentryview');
	}
	function logout(){
		$this->session->unset_userdata('username');
		redirect(base_url().'TeacherC');
	}
	function studentmarks_data(){
		$this->load->model("Teachermodel");
		$data = $this->Teachermodel->studentmarks_list();
		//print_r($data);
		echo json_encode($data);
	}
	function studentmarks_save(){
		$this->form_validation->set_rules("rollno","Roll No.",'required');
		$this->form_validation->set_rules("sub1","Subject 1",'required');
		$this->form_validation->set_rules("sub2","Subject 2",'required');
		$this->form_validation->set_rules("sub3","Subject 3",'required');
		$this->form_validation->set_rules("sub4","Subject 4",'required');
		$this->form_validation->set_rules("sub5","Subject 5",'required');
		//$this->form_validation->set_rules("password","Subject ",'required');
		if($this->form_validation->run())
		{
			$this->load->model("Teachermodel");
			$data=$this->Teachermodel->save_studentmarks();
			echo json_encode($data);
		}
		else
		{
			$this->StudentRegisterview();
		}
	}
	function studentmarks_update(){
		$this->load->model("Teachermodel");
		$data=$this->Teachermodel->update_studentmarks();
		echo json_encode($data);
	}
	function studentmarks_delete(){
		$this->load->model("Teachermodel");
		$data=$this->Teachermodel->delete_studentmarks();
		echo json_encode($data);
	}
}//Class


?>