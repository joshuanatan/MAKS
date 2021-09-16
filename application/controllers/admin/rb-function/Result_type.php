<?php
date_default_timezone_set("Asia/Bangkok");
class Result_type extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $sql = "select id_pk_result_type,result_type,status_aktif_result_type,tgl_result_type_last_modified from tbl_result_type where status_aktif_result_type < 2";
    $result = executeQuery($sql);
    $data["result_type"] = $result->result_array();
    $this->load->view("admin/rb/result_type/v_result_type", $data);
  }
  public function recycle_bin()
  {
    $sql = "select id_pk_result_type, result_type, status_aktif_result_type, tgl_result_type_last_modified from tbl_result_type where status_aktif_result_type = 2";
    $result = executeQuery($sql);
    $data["result_type"] = $result->result_array();
    $this->load->view("admin/rb/result_type/v_result_type_recycle_bin", $data);
  }
  public function activate($id_pk_result_type)
  {
    $where = array(
      "id_pk_result_type" => $id_pk_result_type
    );
    $data = array(
      "status_aktif_result_type" => 1,
      "id_user_result_type_last_modified" => $this->session->id_user,
      "tgl_result_type_last_modified" => date("Y-m-d H:i:s")
    );
    updateRow("tbl_result_type", $data, $where);
    $msg = "Data is successfully activated";
    $this->session->set_flashdata("status_result", "success");
    $this->session->set_flashdata("msg_result", $msg);
    redirect("admin/rb-function/result_type");
  }
  public function delete($id_pk_result_type)
  {
    $where = array(
      "id_pk_result_type" => $id_pk_result_type
    );
    $data = array(
      "status_aktif_result_type" => 2,
      "id_user_result_type_last_modified" => $this->session->id_user,
      "tgl_result_type_last_modified" => date("Y-m-d H:i:s")
    );
    updateRow("tbl_result_type", $data, $where);
    $msg = "Data is successfully deactivated";
    $this->session->set_flashdata("status_result", "error");
    $this->session->set_flashdata("msg_result", $msg);
    redirect("admin/rb-function/result_type");
  }
  public function deactive($id_pk_result_type)
  {
    $where = array(
      "id_pk_result_type" => $id_pk_result_type
    );
    $data = array(
      "status_aktif_result_type" => 0,
      "id_user_result_type_last_modified" => $this->session->id_user,
      "tgl_result_type_last_modified" => date("Y-m-d H:i:s")
    );
    updateRow("tbl_result_type", $data, $where);
    $msg = "Data is successfully deactivated";
    $this->session->set_flashdata("status_result", "error");
    $this->session->set_flashdata("msg_result", $msg);
    redirect("admin/rb-function/result_type");
  }
  public function insert()
  {
    $config = array(
      array(
        "field" => "result_type",
        "label" => "Result Type",
        "rules" => "required"
      )
    );
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $where  = array(
        "result_type" => strtoupper($this->input->post("result_type"))
      );
      $field = array(
        "result_type"
      );
      $result = selectRow("tbl_result_type", $where, $field);
      if ($result->num_rows() > 0) {
        $this->session->set_flashdata("status_result", "error");
        $this->session->set_flashdata("msg_result", "Data Exists");
      } else {
        $data = array(
          "result_type" => strtoupper($this->input->post("result_type")),
          "status_aktif_result_type" => 1,
          "id_user_result_type_last_modified" => $this->session->id_user,
          "tgl_result_type_last_modified" => date("Y-m-d H:i:s")
        );
        insertRow("tbl_result_type", $data);
        $msg = "Result is successfully added to database";
        $this->session->set_flashdata("status_result", "success");
        $this->session->set_flashdata("msg_result", $msg);
      }
    } else {
      $msg = validation_errors();
      $this->session->set_flashdata("status_result", "error");
      $this->session->set_flashdata("msg_result", $msg);
    }
    redirect("admin/rb-function/result_type");
  }
  public function update()
  {
    $config = array(
      array(
        "field" => "id_pk_result_type",
        "label" => "Result Control",
        "rules" => "required"
      ),
      array(
        "field" => "result_type",
        "label" => "Result Type",
        "rules" => "required"
      )
    );
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $sql = "select result_type from tbl_result_type where result_type = ?";
      $args = array(
        strtoupper($this->input->post("result_type"))
      );
      $result = executeQuery($sql,$args);
      if ($result->num_rows() > 0) {
        $this->session->set_flashdata("status_result", "error");
        $this->session->set_flashdata("msg_result", "Data Exists");
      } else {
        $where = array(
          "id_pk_result_type" => $this->input->post("id_pk_result_type")
        );
        $data = array(
          "result_type" => strtoupper($this->input->post("result_type")),
          "id_user_result_type_last_modified" => $this->session->id_user,
          "tgl_result_type_last_modified" => date("Y-m-d H:i:s")
        );
        updateRow("tbl_result_type", $data, $where);
        $msg = "Data is successfully updated to database";
        $this->session->set_flashdata("status_result", "success");
        $this->session->set_flashdata("msg_result", $msg);
      }
    } else {
      $msg = validation_errors();
      $this->session->set_flashdata("status_result", "error");
      $this->session->set_flashdata("msg_result", $msg);
    }
    redirect("admin/rb-function/result_type");
  }
}
