<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$this->login();
	}
	public function login(){
		$userdata = array(
			"nama_user",
			"id_user",
			"email_user",
		);
		$this->session->unset_userdata($userdata);
		$this->load->view("login/v_content_login");
	}
	public function auth(){
		$config = array(
			array(
				"field" => "email_user",
				"label" => "Email",
				"rules" => "required"
			),
			array(
				"field" => "password_user",
				"label" => "password",
				"rules" => "required"
			)
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run()){
			$sql = "select nama_user, id_submit_user, email_user from tbl_user where email_user = ? and password_user = ? and status_aktif_user = 1";
			$args = array(
				$this->input->post("email_user"),md5($this->input->post("password_user")),
			);
			$result = executeQuery($sql, $args);
			if($result->num_rows() > 0){
				$result_array = $result->result_array();
				$userdata = array(
					"nama_user" => $result_array[0]["nama_user"],
					"id_user" => $result_array[0]["id_submit_user"],
					"email_user" => $result_array[0]["email_user"],
				);
				$this->session->set_userdata($userdata);
				$msg = "User Authenticated";
				$this->session->set_flashdata("status_login","success");
				$this->session->set_flashdata("msg_login",$msg);
				redirect("admin/welcome/dashboard");
			}
			else{
				$msg = "Combination Not Found";
				$this->session->set_flashdata("status_login","error");
				$this->session->set_flashdata("msg_login",$msg);
				echo $this->db->last_query();
				redirect("admin/welcome");
			}
		}	
		else{
			$msg = validation_errors();
			$this->session->set_flashdata("status_login","error");
			$this->session->set_flashdata("msg_login",$msg);
			redirect("admin/welcome");
		}	
	}
	public function dashboard(){	
		$this->check_session();
		$this->load->view("welcome_message");
	}
	public function logout(){
		redirect("welcome");
	}
	private function check_session(){
		if($this->session->id_user == ""){
			$msg = "Session Expired";	
			$this->session->set_flashdata("status_login","error");
			$this->session->set_flashdata("msg_login",$msg);
			redirect("welcome");
		}
	}
	public function change_password(){
		$config = array(
			array(
				"field" => "password",
				"label" => "Password",
				"rules" => "required"
			)
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run()){
			$where = array(
				"id_submit_user" => $this->session->id_user
			);
			$data = array(
				"password_user" => md5($this->input->post("password"))
			);
			updateRow("tbl_user",$data,$where);
			$msg = "Password updated. Session Expired";
			$this->session->set_flashdata("status_login","error");
			$this->session->set_flashdata("msg_login",$msg);
			redirect("welcome");
		}
		else{
			$msg = validation_errors();
			$this->session->set_flashdata("status_login","error");
			$this->session->set_flashdata("msg_login",$msg);
			redirect("welcome/dashboard");
		}
	}
}
