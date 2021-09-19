<?php
date_default_timezone_set("Asia/Bangkok");
class Intent extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library("wit");
  }
  public function index()
  {
    $this->check_session();
    $response = $this->wit->get_intents();
    $response = json_decode($response["response"],true);
    $data["intent"] = $response;
    $this->load->view("admin/nlp/v_intent", $data);
  }
  public function insert()
  {
    $this->check_session();
    $config = array(
      array(
        "field" => "intent_name",
        "label" => ucwords(str_replace("_", " ", "intent_name")),
        "rules" => "required"
      ),
    );
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $this->wit->post_intents(str_replace(" ","_",$this->input->post("intent_name")));
      $this->session->set_flashdata("status", "success");
      $this->session->set_flashdata("msg", "Data is successfully added");
    } else {
      $this->session->set_flashdata("status", "danger");
      $this->session->set_flashdata("msg", "Data is not okay");
    }
    redirect("admin/nlp-function/intent");
  }
  public function delete($intent_name)
  {
    if($intent_name!= ""){
      $this->wit->delete_intents($intent_name);
    }
    $this->session->set_flashdata("status", "error");
    $this->session->set_flashdata("msg", "Data is successfully deleted");
    redirect("admin/nlp-function/intent");
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
