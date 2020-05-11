<?php

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Newapi extends REST_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		//load studentapi model
		$this->load->model("apimodel/studentmodelapi");
	}

											//http://localhost/Result/api/Newapi/student/1 (rollno=1)
	public function student_get($rollno=0) 		//http://localhost/Result/api/Newapi/student (all )
	{

		$students = $this->studentmodelapi->getRows($rollno);
		if(!empty($students))
		{
			$this->response($students, REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response([
				'status' => FALSE,
				'message' => 'No user were found.'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function student_post()	//http://localhost/Result/api/Newapi/student/
	{
		$studentdata = array();
		$studentdata['rollno'] = $this->post('rollno');
		$studentdata['name'] = $this->post('name');
		$studentdata['email'] = $this->post('email');
		$studentdata['dob'] = $this->post('dob');
		$studentdata['username'] = $this->post('username');
		$studentdata['password'] = $this->post('password');

		if(!empty($studentdata['rollno']) && !empty($studentdata['name']) && !empty($studentdata['email']) && !empty($studentdata['dob']) && !empty($studentdata['username']) && !empty($studentdata['password']))
		{
			$insert = $this->studentmodelapi->insert($studentdata);

			if($insert)
			{
				$this->response([
					'status' => TRUE,
					'message' => 'Student has been added successfully.'
				], REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response("Something went wrong, Student not added, Please insert correct credentials.",REST_Controller::HTTP_BAD_REQUEST);
			}
		}
		else
		{
			$this->response("Please enter complete student information to add Student.",REST_Controller::HTTP_BAD_REQUEST);
		}
	}//student_post()

	public function student_put() //http://localhost/Result/api/Newapi/student  	//key: rollno  | value: 5 
	{
		$studentdata = array();
		$rollno = $this->put('rollno');
		//$studentdata['rollno'] = $this->put('rollno');
		$studentdata['name'] = $this->put('name');
		$studentdata['email'] = $this->put('email');
		$studentdata['dob'] = $this->put('dob');
		$studentdata['username'] = $this->put('username');
		$studentdata['password'] = $this->put('password');

		if(!empty($rollno) && !empty($studentdata['name']) && !empty($studentdata['email']) && !empty($studentdata['dob']) && !empty($studentdata['username']) && !empty($studentdata['password']))
		{
			$update = $this->studentmodelapi->update($studentdata, $rollno);
			if($update){
				//set the response and exit
				$this->response([
					'status' => TRUE,
					'message' => 'Student has been updated successfully.'
				], REST_Controller::HTTP_OK);
			}else{
				//set the response and exit
				$this->response("Something went wrong, Student not updated, Please insert correct credentials.", REST_Controller::HTTP_BAD_REQUEST);
			}
        }else{
			//set the response and exit
            $this->response("Please enter complete student information to update Student.", REST_Controller::HTTP_BAD_REQUEST);
		}
	}//student_update()

	public function student_delete($rollno)		//http://localhost/Result/api/Newapi/student/5
	{
		if($rollno){
            //delete post
            $delete = $this->studentmodelapi->delete($rollno);
            
            if($delete){
                //set the response and exit
				$this->response([
					'status' => TRUE,
					'message' => 'Student has been removed successfully.'
				], REST_Controller::HTTP_OK);
            }else{
                //set the response and exit
				$this->response("Something went wrong, Student not deleted", REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
			//set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No Student were found.'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

}//class

?>