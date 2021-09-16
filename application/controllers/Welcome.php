<?php
date_default_timezone_set("Asia/Bangkok");
class Welcome extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library("wit");

    $config = array(
      'cipher' => 'aes-256',
      'mode' => 'cbc',
      'key' => 'THWmuoIc87a4AvugOywNLUJ0yYPD1ggH'
    );
    $this->load->library("encryption", $config);
  }
  public function index()
  {
    $sql = "select id_submit_system_request,phrase from system_request where status_aktif_system_request = 1 order by id_submit_system_request DESC limit 8 ";
    $result = executeQuery($sql);
    $data["phrase"] = $result->result_array();
    $this->load->view("landing/v_landing", $data);
  }
  public function process()
  {
    /**
     * perbandingan jumlah transaksi bulan maret dan april
     * perbandingan jumlah transaksi tahun 2021 dan 2020
     * perbandingan jumlah transaksi di jakarta bulan maret tahun 2020
     */
    $request = $this->input->post("question");

    $response = json_decode($this->wit->get_message($request)["response"], true);
    #print_r($response["entities"]);
    $has_entity = false;
    $replace_array = array();
    $counter = 0;
    foreach ($response["entities"] as $key => $value) {
      $has_entity = true;
      for($a = 0; $a<count($value); $a++){
        $entity_key = $value[$a]["name"];
        $entity_value = $value[$a]["body"];
        $checkmapping[$counter] = $entity_key;
        $replace_array["&" . $entity_key . $a] = $entity_value;
      }
      $counter++;
    }
    if ($has_entity) {
      sort($checkmapping);
      $checkmapping = implode(",", $checkmapping);
    } else {
      $checkmapping = "-";
    }

    $sql = "
    select * from (
      select *,ifnull(group_concat(entity_name order by entity_name ASC),'-') as entity_list from tbl_dataset
      left join tbl_dataset_entity on tbl_dataset_entity.id_fk_dataset = tbl_dataset.id_submit_dataset
      group by id_submit_dataset
    ) as a 
    inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = a.id_db_connection
    inner join tbl_result_type on tbl_result_type.id_pk_result_type = a.id_result_type
    where dataset_intent = ? and entity_list = ?";
    $args = array(
      $response["intents"][0]["name"], $checkmapping
    );
    $result = executeQuery($sql, $args);
    $result = $result->result_array();
    $dataset_list = array();
    $dataset_detail = array();
    for ($a = 0; $a < count($result); $a++) {
      if (!in_array($result[$a]["id_submit_dataset"], $dataset_list)) {
        array_push($dataset_list, $result[$a]["id_submit_dataset"]);
        $data = array(
          "hostname" => $result[$a]["db_hostname"],
          "username" => $result[$a]["db_username"],
          "password" => $this->encryption->decrypt($result[$a]["db_password"]),
          "dbname" => $result[$a]["db_name"],
          "result_type" => $result[$a]["result_type"],
          "query" => $result[$a]["dataset_query"],
          "name" => $result[$a]["dataset_name"],
          "notes" => $result[$a]["dataset_notes"],
          "id" => $result[$a]["id_submit_dataset"]
        );
        array_push($dataset_detail, $data);
      }
      $sql = "select * from tbl_dataset_related
      inner join tbl_dataset on tbl_dataset.id_submit_dataset = tbl_dataset_related.id_dataset_related
      where status_aktif_dataset_related = 1 and id_dataset = ?";
      $args = array(
        $result[$a]["id_submit_dataset"]
      );
      $support_result = executeQuery($sql, $args);
      $support_result = $support_result->result_array();
      for ($b = 0; $b < count($support_result); $b++) {
        if (!in_array($support_result[$b]["id_submit_dataset"], $dataset_list)) {
          array_push($dataset_list, $result[$a]["id_submit_dataset"]);
          $data = array(
            "hostname" => $result[$a]["db_hostname"],
            "username" => $result[$a]["db_username"],
            "password" => $this->encryption->decrypt($result[$a]["db_password"]),
            "dbname" => $result[$a]["db_name"],
            "result_type" => $result[$a]["result_type"],
            "query" => $result[$a]["dataset_query"],
            "name" => $result[$a]["dataset_name"],
            "notes" => $result[$a]["dataset_notes"],
            "id" => $result[$a]["id_submit_dataset"]
          );
          array_push($dataset_detail, $data);
        }
      }
    }
    for ($a = 0; $a < count($dataset_detail); $a++) {
      foreach ($replace_array as $key => $value) {
        $dataset_detail[$a]["query"] = str_replace($key, $value, $dataset_detail[$a]["query"]);
      }
      $conn = new mysqli($dataset_detail[$a]["hostname"], $dataset_detail[$a]["username"], $dataset_detail[$a]["password"]);

      // Check connection
      if ($conn->connect_error) {
      } else {
        $config = array(
          "hostname" => $dataset_detail[$a]["hostname"],
          "username" => $dataset_detail[$a]["username"],
          "password" => $dataset_detail[$a]["password"],
          "database" => $dataset_detail[$a]["dbname"],
          "dbdriver" => "mysqli"
        );
        $db1 = $this->load->database($config, true);
        $query_result = $db1->query($dataset_detail[$a]["query"]);

        if ($query_result) {
          if ($query_result->num_rows() > 0) {
            $query_result = $query_result->result_array();
            $sql = "select db_field, db_field_alias where tbl_dataset_dbfield_mapping where id_fk_dataset = ?";
            $args = array(
              $dataset_detail[$a]["id"]
            );
            $db_field = executeQuery($sql, $args)->result_array();
          }
        }
        $this->load->view("result_template/main");
      }
    }
  }
  public function load_registered_phrase($id_system_request)
  {
    $where = array(
      "id_system_request" => $id_system_request
    );
    $field = array(
      "system_request_result"
    );
    $result = selectRow("system_request_result", $where, $field, "", "", "id_submit_system_request_variable", "DESC");
    $result = $result->result_array();
    header("Content-type:text/html");
    echo html_entity_decode(json_decode($result[0]["system_request_result"]));
  }
  public function phrase()
  {

    $where = array(
      "status_aktif_system_request" => 1
    );
    $field = array(
      "id_submit_system_request", "phrase", "tgl_system_request_add"
    );
    $result = selectRow("system_request", $where, $field, "10", "", "phrase", "ASC");
    $data["phrase"] = $result->result_array();

    $this->load->view("landing/v_head");
    $this->load->view("landing/v_phrase", $data);
    $this->load->view("landing/v_close");
    $this->load->view("landing/v_phrase_js");
  }

  private function system_request_result($id_system_request, $step, $result)
  {
    $data = array(
      "id_system_request" => $id_system_request,
      "system_request_step" => $step,
      "system_request_result" => $result
    );
    insertRow("system_request_result", $data);
  }
  private function system_request_log($id_system_request, $executed_function, $connection_status, $connection_msg)
  {
    $data = array(
      "id_system_request" => strtoupper($id_system_request),
      "executed_function" => strtoupper($executed_function),
      "connection_status" => strtoupper($connection_status),
      "connection_msg" => strtoupper($connection_msg),
      "tgl_system_request_log" => date("Y-m-d H:i:s"),
    );
    insertRow("system_request_log", $data);
  }
}
