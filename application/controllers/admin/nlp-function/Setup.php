<?php
date_default_timezone_set("Asia/Bangkok");
class Setup extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->check_session();
    $sql = "select id_submit_wit_ai_acc,registered_email,registered_name,status_aktif_wit_ai_acc,date_wit_ai_acc_last_modified,application_id,application_name,server_access_token from tbl_wit_ai_acc where status_aktif_wit_ai_acc < 2";
    $result = executeQuery($sql);
    $data["acc"] = $result->result_array();
    $this->load->view("admin/nlp/setup/v_setup", $data);
  }
  public function insert()
  {
    $this->check_session();
    $config = array(
      array(
        "field" => "registered_name",
        "label" => ucwords(str_replace("_", " ", "registered_name")),
        "rules" => "required"
      ),
      array(
        "field" => "registered_email",
        "label" => "Email",
        "rules" => "required|valid_email"
      ),
      array(
        "field" => "application_id",
        "label" => ucwords(str_replace("_", " ", "application_id")),
        "rules" => "required"
      ),
      array(
        "field" => "application_name",
        "label" => ucwords(str_replace("_", " ", "application_name")),
        "rules" => "required"
      ),
      array(
        "field" => "server_access_token",
        "label" => ucwords(str_replace("_", " ", "server_access_token")),
        "rules" => "required"
      )
    );
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $data = array(
        "registered_email" => $this->input->post("registered_email"),
        "registered_name" => $this->input->post("registered_name"),
        "application_id" => $this->input->post("application_id"),
        "application_name" => $this->input->post("application_name"),
        "server_access_token" => $this->input->post("server_access_token"),
        "status_aktif_wit_ai_acc" => 0,
        "date_wit_ai_acc_last_modified" => date("Y-m-d H:i:s"),
        "id_user_wit_ai_acc_last_modified" => $this->session->id_user
      );
      insertRow("tbl_wit_ai_acc", $data);
      $this->session->set_flashdata("status", "success");
      $this->session->set_flashdata("msg", "Data is successfully added");
      redirect("admin/nlp-function/setup");
    } else {
      $this->session->set_flashdata("status", "danger");
      $this->session->set_flashdata("msg", "Data is not okay");
      redirect("admin/nlp-function/setup");
    }
  }
  public function update()
  {
    $this->check_session();
    $config = array(
      array(
        "field" => "registered_name",
        "label" => ucwords(str_replace("_", " ", "registered_name")),
        "rules" => "required"
      ),
      array(
        "field" => "registered_email",
        "label" => "Email",
        "rules" => "required"
      ),
      array(
        "field" => "application_id",
        "label" => ucwords(str_replace("_", " ", "application_id")),
        "rules" => "required"
      ),
      array(
        "field" => "application_name",
        "label" => ucwords(str_replace("_", " ", "application_name")),
        "rules" => "required"
      ),
      array(
        "field" => "server_access_token",
        "label" => ucwords(str_replace("_", " ", "server_access_token")),
        "rules" => "required"
      )
    );
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $data = array(
        "registered_email" => $this->input->post("registered_email"),
        "registered_name" => $this->input->post("registered_name"),
        "application_id" => $this->input->post("application_id"),
        "application_name" => $this->input->post("application_name"),
        "server_access_token" => $this->input->post("server_access_token"),
        "date_wit_ai_acc_last_modified" => date("Y-m-d H:i:s"),
        "id_user_wit_ai_acc_last_modified" => $this->session->id_user
      );
      $where = array(
        "id_submit_wit_ai_acc" => $this->input->post("id_submit_wit_ai_acc")
      );
      updateRow("tbl_wit_ai_acc", $data, $where);
      $this->session->set_flashdata("status", "success");
      $this->session->set_flashdata("msg", "Data is successfully updated");
      redirect("admin/nlp-function/setup");
    } else {
      $this->session->set_flashdata("status", "danger");
      $this->session->set_flashdata("msg", "Data is not okay");
      redirect("admin/nlp-function/setup");
    }
  }
  public function delete($id_submit_wit_ai_acc)
  {
    $this->check_session();
    $where = array(
      "id_Submit_wit_ai_acc" => $id_submit_wit_ai_acc
    );
    $data = array(
      "status_aktif_wit_ai_acc" => 2,
      "date_wit_ai_acc_last_modified" => date("Y-m-d H:i:s"),
      "id_user_wit_ai_acc_last_modified" => $this->session->id_user
    );
    updateRow("tbl_wit_ai_acc", $data, $where);
    $this->session->set_flashdata("status", "error");
    $this->session->set_flashdata("msg", "Data is successfully deleted");
    redirect("admin/nlp-function/setup");
  }
  public function deactive($id_submit_wit_ai_acc)
  {
    $this->check_session();
    $where = array(
      "id_Submit_wit_ai_acc" => $id_submit_wit_ai_acc
    );
    $data = array(
      "status_aktif_wit_ai_acc" => 0,
      "date_wit_ai_acc_last_modified" => date("Y-m-d H:i:s"),
      "id_user_wit_ai_acc_last_modified" => $this->session->id_user
    );
    updateRow("tbl_wit_ai_acc", $data, $where);
    $this->session->set_flashdata("status", "error");
    $this->session->set_flashdata("msg", "Data is successfully deactivated");
    redirect("admin/nlp-function/setup");
  }
  public function activate($id_submit_wit_ai_acc)
  {
    $this->check_session();
    $where = array(
      "status_aktif_wit_ai_acc " => 1
    );
    $data = array(
      "status_aktif_wit_ai_acc" => 0
    );
    updateRow("tbl_wit_ai_acc", $data, $where);
    $where = array(
      "id_Submit_wit_ai_acc" => $id_submit_wit_ai_acc
    );
    $data = array(
      "status_aktif_wit_ai_acc" => 1,
      "date_wit_ai_acc_last_modified" => date("Y-m-d H:i:s"),
      "id_user_wit_ai_acc_last_modified" => $this->session->id_user
    );
    updateRow("tbl_wit_ai_acc", $data, $where);
    $this->session->set_flashdata("status", "success");
    $this->session->set_flashdata("msg", "All account is deactivated. Selected account is successfully activated");
    redirect("admin/nlp-function/setup");
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
