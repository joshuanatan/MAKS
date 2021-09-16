<?php
date_default_timezone_set("Asia/Bangkok");
class dataset extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $config = array(
      'cipher' => 'aes-256',
      'mode' => 'cbc',
      'key' => 'THWmuoIc87a4AvugOywNLUJ0yYPD1ggH'
    );
    $this->load->library("encryption", $config);
    $this->load->library("wit");
  }
  public function index()
  {
    $this->check_session();
    $sql = "select * from (
      select *, group_concat(final_jmlh_entity), ifnull(group_concat(final_jmlh_entity),'-') as jmlh_entity_lengkap from (
        select *, count(entity_name) as jmlh_entity, concat(count(entity_name),' ',entity_name) as final_jmlh_entity 
        from tbl_dataset
        inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = tbl_dataset.id_db_connection
        inner join tbl_result_type on tbl_result_type.id_pk_result_type = tbl_dataset.id_result_type
        left join tbl_dataset_entity on tbl_dataset_entity.id_fk_dataset = tbl_dataset.id_submit_dataset
        group by id_submit_dataset, entity_name
      ) as a 
      group by id_submit_dataset
    ) as b
    where status_aktif_dataset < 2 ";
    $result = executeQuery($sql);
    $data["dataset"] = $result->result_array();
    $this->load->view("admin/km/dataset/v_dataset",$data);
  }
  public function recycle_bin()
  {
    $this->check_session();
    $sql = "select id_submit_dataset, dataset_name, dataset_query, dataset_notes, db_hostname, db_name, tgl_dataset_last_modified, status_aktif_dataset, id_result_type,result_type
    from tbl_dataset 
    inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = tbl_dataset.id_db_connection 
    inner join tbl_result_type on tbl_result_type.id_pk_result_type = tbl_dataset.id_result_type
    where status_aktif_dataset = 2 ";
    $result = executeQuery($sql);
    $data["dataset"] = $result->result_array();
    $this->load->view("admin/km/dataset/v_dataset_recycle_bin", $data);
  }
  public function add()
  {
    $response = $this->wit->get_intents();
    $response = json_decode($response["response"],true);
    if(array_key_exists("error",$response)){
      echo '<script type="text/javascript">alert("Wit.ai token is incorrect");</script>';
      echo '<script>document.location.href = "'.base_url().'admin/nlp-function/setup"</script>';
    }
    $data["intent"] = $response;

    $response = $this->wit->get_entities();
    $response = json_decode($response["response"],true);
    $data["entity"] = $response;

    $sql = "select id_submit_db_connection,db_hostname,db_name from tbl_db_connection where status_aktif_db_connection = 1"; 
    $result = executeQuery($sql);
    $data["database"] = $result->result_array();

    $sql = "select id_pk_result_type, result_type,status_aktif_result_type,tgl_result_type_last_modified from tbl_result_type where status_aktif_result_type < 2";
    $result = executeQuery($sql);
    $data["result_type"] = $result->result_array();

    $this->load->view("admin/km/dataset/v_dataset_add", $data);
    $this->load->view("admin/km/dataset/v_dataset_js", $data);
  }
  public function insert()
  {
    $this->check_session();
    $this->form_validation->set_rules("dataset_name","dataset_name","required");
    $this->form_validation->set_rules("dataset_query","dataset_query","required");
    $this->form_validation->set_rules("notes","notes","required");
    $this->form_validation->set_rules("id_result_type","id_result_type","required");
    $this->form_validation->set_rules("id_db_connection","id_db_connection","required");
    $this->form_validation->set_rules("intent","intent","required");
    if ($this->form_validation->run()) {
      $this->wit->post_intents($this->input->post("intent"));
      $data = array(
        "dataset_name" => $this->input->post("dataset_name"),
        "dataset_query" => $this->input->post("dataset_query"),
        "dataset_notes" => $this->input->post("notes"),
        "dataset_intent" => $this->input->post("intent"),
        "id_result_type" => $this->input->post("id_result_type"),
        "id_db_connection" => $this->input->post("id_db_connection"),
        "status_aktif_dataset" => 1,
        "tgl_dataset_last_modified" => date("Y-m-d H:i:s"),
        "id_user_dataset_last_modified" => $this->session->id_user
      );
      $id_dataset = insertRow("tbl_dataset", $data);

      if($this->input->post("entity_checks") != ""){
        $checks = $this->input->post("entity_checks");
        foreach($checks as $a){
          $this->wit->post_entities($this->input->post("entity_name".$a));
          $data = array(
            "id_fk_dataset" => $id_dataset,
            "entity_name" => $this->input->post("entity_name".$a)
          );
          insertRow("tbl_dataset_entity",$data);
        }
      }

      if($this->input->post("db_field_checks") != ""){
        $checks = $this->input->post("db_field_checks");
        foreach($checks as $a){
          $data = array(
            "id_fk_dataset" => $id_dataset,
            "tbl_name" => $this->input->post("table_name".$a), 
            "db_field" => $this->input->post("db_field".$a), 
            "db_field_alias" => $this->input->post("db_field_alias".$a), 
          );
          insertRow("tbl_dataset_dbfield_mapping",$data);
        }
      }
      $this->session->set_flashdata("status_dataset", "success");
      $this->session->set_flashdata("msg_dataset", "Data berhasil diinput");
      redirect("admin/km-function/dataset/add");
    }
    else{
      $msg = validation_errors();
      $this->session->set_flashdata("status_dataset", "error");
      $this->session->set_flashdata("msg_dataset", $msg);
      redirect("admin/km-function/dataset/add");
    }
  }
  public function delete($id_submit_dataset)
  {
    $this->check_session();
    $where = array(
      "id_submit_dataset" => $id_submit_dataset
    );
    $data = array(
      "status_aktif_dataset" => 2,
      "tgl_dataset_last_modified" => date("Y-m-d H:i:s"),
      "id_user_dataset_last_modified" => $this->session->id_user
    );
    updateRow("tbl_dataset", $data, $where);
    $msg = "Data is successfully deactivated";
    $this->session->set_flashdata("status_dataset", "success");
    $this->session->set_flashdata("msg_dataset", $msg);
    redirect("admin/km-function/dataset");
  }
  public function deactive($id_submit_dataset)
  {
    $this->check_session();
    $where = array(
      "id_submit_dataset" => $id_submit_dataset
    );
    $data = array(
      "status_aktif_dataset" => 0,
      "tgl_dataset_last_modified" => date("Y-m-d H:i:s"),
      "id_user_dataset_last_modified" => $this->session->id_user
    );
    updateRow("tbl_dataset", $data, $where);
    $msg = "Data is successfully deactivated";
    $this->session->set_flashdata("status_dataset", "success");
    $this->session->set_flashdata("msg_dataset", $msg);
    redirect("admin/km-function/dataset");
  }
  public function activate($id_submit_dataset)
  {
    $this->check_session();
    $where = array(
      "id_submit_dataset" => $id_submit_dataset
    );
    $data = array(
      "status_aktif_dataset" => 1,
      "tgl_dataset_last_modified" => date("Y-m-d H:i:s"),
      "id_user_dataset_last_modified" => $this->session->id_user
    );
    updateRow("tbl_dataset", $data, $where);
    $msg = "Data is successfully activated";
    $this->session->set_flashdata("status_dataset", "success");
    $this->session->set_flashdata("msg_dataset", $msg);
    redirect("admin/km-function/dataset");
  }
  public function edit($id_submit_dataset)
  {
    $this->check_session();
    $response = $this->wit->get_intents();
    $response = json_decode($response["response"],true);
    if(array_key_exists("error",$response)){
      echo '<script type="text/javascript">alert("Wit.ai token is incorrect");</script>';
      echo '<script>document.location.href = "'.base_url().'admin/nlp-function/setup"</script>';
    }
    $data["intent"] = $response;

    $response = $this->wit->get_entities();
    $response = json_decode($response["response"],true);
    $data["entity"] = $response;

    $sql = "select id_submit_db_connection,db_hostname,db_name from tbl_db_connection where status_aktif_db_connection = 1"; 
    $result = executeQuery($sql);
    $data["database"] = $result->result_array();

    $sql = "select id_pk_result_type, result_type,status_aktif_result_type,tgl_result_type_last_modified from tbl_result_type where status_aktif_result_type < 2";
    $result = executeQuery($sql);
    $data["result_type"] = $result->result_array();

    $sql = "select * from tbl_dataset where id_submit_dataset = ?";
    $args = array(
      $id_submit_dataset
    );
    $result = executeQuery($sql, $args);
    $data["detail"] = $result->result_array();

    $sql = "select * from tbl_dataset_dbfield_mapping where id_fk_dataset = ?";
    $args = array(
      $id_submit_dataset
    );
    $result = executeQuery($sql, $args);
    $data["dbfield"] = $result->result_array();

    $sql = "select * from tbl_dataset_entity where id_fk_dataset = ?";
    $args = array(
      $id_submit_dataset
    );
    $result = executeQuery($sql,$args);
    $data["entity_registered"] = $result->result_array();
    
    $this->load->view("admin/km/dataset/v_dataset_edit", $data);
    $this->load->view("admin/km/dataset/v_dataset_js", $data);
  }
  public function update()
  {
    $this->check_session();
    $this->form_validation->set_rules("id_submit_dataset","id_submit_dataset","required");
    $this->form_validation->set_rules("dataset_name","dataset_name","required");
    $this->form_validation->set_rules("dataset_query","dataset_query","required");
    $this->form_validation->set_rules("notes","notes","required");
    $this->form_validation->set_rules("id_result_type","id_result_type","required");
    $this->form_validation->set_rules("id_db_connection","id_db_connection","required");
    $this->form_validation->set_rules("intent","intent","required");
    if ($this->form_validation->run()) {
      $this->wit->post_intents($this->input->post("intent"));
      $where = array(
        "id_submit_dataset" => $this->input->post("id_submit_dataset")
      );
      $data = array(
        "dataset_name" => $this->input->post("dataset_name"),
        "dataset_query" => $this->input->post("dataset_query"),
        "dataset_notes" => $this->input->post("notes"),
        "dataset_intent" => $this->input->post("intent"),
        "id_result_type" => $this->input->post("id_result_type"),
        "id_db_connection" => $this->input->post("id_db_connection"),
        "tgl_dataset_last_modified" => date("Y-m-d H:i:s"),
        "id_user_dataset_last_modified" => $this->session->id_user
      );
      updateRow("tbl_dataset", $data,$where);

      $where = array(
        "id_fk_dataset" => $this->input->post("id_submit_dataset")
      );
      deleteRow("tbl_dataset_entity",$where);
      if($this->input->post("entity_checks") != ""){
        $checks = $this->input->post("entity_checks");
        foreach($checks as $a){
          $this->wit->post_entities($this->input->post("entity_name".$a));
          $data = array(
            "id_fk_dataset" => $this->input->post("id_submit_dataset"),
            "entity_name" => $this->input->post("entity_name".$a)
          );
          insertRow("tbl_dataset_entity",$data);
        }
      }

      $where = array(
        "id_fk_dataset" => $this->input->post("id_submit_dataset")
      );
      deleteRow("tbl_dataset_dbfield_mapping",$where);
      if($this->input->post("db_field_checks") != ""){
        $checks = $this->input->post("db_field_checks");
        foreach($checks as $a){
          $data = array(
            "id_fk_dataset" => $this->input->post("id_submit_dataset"),
            "tbl_name" => $this->input->post("table_name".$a), 
            "db_field" => $this->input->post("db_field".$a), 
            "db_field_alias" => $this->input->post("db_field_alias".$a), 
          );
          insertRow("tbl_dataset_dbfield_mapping",$data);
        }
      }
      $this->session->set_flashdata("status_dataset", "success");
      $this->session->set_flashdata("msg_dataset", "Data berhasil diinput");
      redirect("admin/km-function/dataset/edit/".$this->input->post("id_submit_dataset"));
    }
    else{
      $msg = validation_errors();
      $this->session->set_flashdata("status_dataset", "error");
      $this->session->set_flashdata("msg_dataset", $msg);
      redirect("admin/km-function/dataset/edit/".$this->input->post("id_submit_dataset"));
    }
  }
  public function related($id_submit_dataset)
  {
    $this->check_session();
    $this->session->id_dataset = $id_submit_dataset;
    $sql = "
    select * 
    from tbl_dataset_related
    inner join (
      select *, ifnull(group_concat(final_jmlh_entity separator ', '),'-') as jmlh_entity_final, ifnull(group_concat(final_jmlh_entity),'-') as jmlh_entity_lengkap from (
        select *, count(entity_name) as jmlh_entity, concat(entity_name,' ','(',count(entity_name),')') as final_jmlh_entity 
        from tbl_dataset
        inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = tbl_dataset.id_db_connection
        inner join tbl_result_type on tbl_result_type.id_pk_result_type = tbl_dataset.id_result_type
        left join tbl_dataset_entity on tbl_dataset_entity.id_fk_dataset = tbl_dataset.id_submit_dataset
        group by id_submit_dataset, entity_name
      ) as a 
      group by id_submit_dataset
    ) as b on b.id_submit_dataset = tbl_dataset_related.id_dataset_related
    where id_dataset = ? and status_aktif_dataset_related = 1";
    $args = array(
      $id_submit_dataset
    );
    $result = executeQuery($sql,$args);
    $data["registered_related"] = $result->result_array();

    $sql = "
    select * 
    from (
      select *, ifnull(group_concat(final_jmlh_entity separator ', '),'-') as jmlh_entity_final, ifnull(group_concat(final_jmlh_entity),'-') as jmlh_entity_lengkap from (
        select *, count(entity_name) as jmlh_entity, concat(entity_name,' ','(',count(entity_name),')') as final_jmlh_entity 
        from tbl_dataset
        inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = tbl_dataset.id_db_connection
        inner join tbl_result_type on tbl_result_type.id_pk_result_type = tbl_dataset.id_result_type
        left join tbl_dataset_entity on tbl_dataset_entity.id_fk_dataset = tbl_dataset.id_submit_dataset
        group by id_submit_dataset, entity_name
      ) as a 
      group by id_submit_dataset
    ) as b 
    where id_submit_dataset = ?";
    $args = array(
      $id_submit_dataset
    );
    $result = executeQuery($sql,$args);
    $data["detail_dataset"] = $result->result_array();
    
    $query = "
    select * from(
      select *, ifnull(group_concat(final_jmlh_entity separator ', '),'-') as jmlh_entity_final, ifnull(group_concat(final_jmlh_entity),'-') as jmlh_entity_lengkap from (
        select *, count(entity_name) as jmlh_entity, concat(entity_name,' ','(',count(entity_name),')') as final_jmlh_entity 
        from tbl_dataset
        inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = tbl_dataset.id_db_connection
        inner join tbl_result_type on tbl_result_type.id_pk_result_type = tbl_dataset.id_result_type
        left join tbl_dataset_entity on tbl_dataset_entity.id_fk_dataset = tbl_dataset.id_submit_dataset
        group by id_submit_dataset, entity_name
      ) as a 
      group by id_submit_dataset) as b 
    where status_aktif_dataset = 1 and id_submit_dataset != ? and id_submit_dataset not in (select id_dataset_related from tbl_dataset_related where id_dataset = ? and status_aktif_dataset_related = 1)
    group by id_submit_dataset";
    $args = array(
      $id_submit_dataset,$id_submit_dataset
    );
    $result = executeQuery($query,$args);
    $data["dataset_list"] = $result->result_array();
    $this->load->view("admin/km/dataset/v_dataset_related", $data);
    $this->load->view("admin/km/dataset/v_dataset_related_js");
  }
  public function remove_related()
  {
    $this->check_session();
    $checks = $this->input->post("checks");
    if ($checks != "") {
      foreach ($checks as $a) {
        $where = array(
          "id_submit_dataset_related" => $a
        );
        $data = array(
          "status_aktif_dataset_related" => 0,
          "tgl_dataset_related_last_modified" => date("Y-m-d H:i:S"),
          "id_user_dataset_related_last_modified" => $this->session->id_user
        );
        updateRow("tbl_dataset_related", $data, $where);
      }
    }
    redirect("admin/km-function/dataset/related/" . $this->session->id_dataset);
  }
  public function insert_related()
  {
    $this->check_session();
    $checks = $this->input->post("related_dataset_check");
    if ($checks != "") {
      foreach ($checks as $a) {
        $data = array(
          "id_dataset" => $this->session->id_dataset,
          "id_dataset_related" => $a,
          "status_aktif_dataset_related" => 1,
          "tgl_dataset_related_last_modified" => date("Y-m-d H:i:S"),
          "id_user_dataset_related_last_modified" => $this->session->id_iser
        );
        insertRow("tbl_dataset_related", $data);
      }
    }
    redirect("admin/km-function/dataset/related/" . $this->session->id_dataset);
  }
  private function check_session()
  {
    if ($this->session->id_user == "") {
      $msg = "Session Expired";
      $this->session->set_flashdata("status_login", "error");
      $this->session->set_flashdata("msg_login", $msg);
      redirect("welcome");
    }
  }
  public function trial()
  {
    $data["intent"] = $this->input->post("intent");
    $entity_check = $this->input->post("check");
    if ($entity_check != "") {
      foreach ($entity_check as $a) {
        $entity = $this->input->post("entity" . $a);
        $value = $this->input->post("value" . $a);
        //echo $value;
        $data["entity"][$entity] = explode(",", $value);
      }
    }
    $encode = json_encode($data);
    $url = $this->get_dataset_trial_url;
    $header = array(
      "client-token:" . $this->get_dataset_trial_token
    );
    $body = array(
      "text_entity_list" => $encode
    );
    $response = $this->curl->post($url, $header, $body);
    header("content-type:application/json");
    //echo $encode;
    echo $response["response"];
  }
}
