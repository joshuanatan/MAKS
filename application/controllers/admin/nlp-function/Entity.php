<?php
date_default_timezone_set("Asia/Bangkok");
class Entity extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library("wit");
  }
  public function index()
  {
    $this->check_session();
    $response = $this->wit->get_entities();
    $response = json_decode($response["response"],true);
    $data["entity"] = $response;
    $this->load->view("admin/nlp/v_entity", $data);
  }
  public function insert()
  {
    $this->check_session();
    $config = array(
      array(
        "field" => "entity_name",
        "label" => ucwords(str_replace("_", " ", "entity_name")),
        "rules" => "required"
      ),
    );
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $this->wit->post_entities($this->input->post("entity_name"));
      $this->session->set_flashdata("status", "success");
      $this->session->set_flashdata("msg", "Data is successfully added");
    } else {
      $this->session->set_flashdata("status", "danger");
      $this->session->set_flashdata("msg", "Data is not okay");
    }
    redirect("admin/nlp-function/entity");
  }
  public function delete($entity_name)
  {
    if($entity_name!= ""){
      $this->wit->delete_entities($entity_name);
    }
    $this->session->set_flashdata("status", "error");
    $this->session->set_flashdata("msg", "Data is successfully deleted");
    redirect("admin/nlp-function/entity");
  }
  private function check_session()
  {
    if ($this->session->id_user == "") {
      $msg = "Session Expired";
      $this->session->set_flashdata("status_login", "error");
      $this->session->set_flashdata("msg_login", $msg);
      redirect("admin/nlp-function/welcome");
    }
  }
}
