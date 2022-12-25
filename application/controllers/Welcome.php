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
    $this->load->view("landing/v_landing");
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
    #print_r($response);
    if(count($response["intents"])>0):
      $has_entity = false;
      $replace_array = array();
      $counter = 0;
      foreach ($response["entities"] as $key => $value) {
        $has_entity = true;
        for ($a = 0; $a < count($value); $a++) {
          $entity_key = $value[$a]["name"];
          $entity_value = $value[$a]["body"];
          $checkmapping[$counter] = $entity_key;
          $replace_array["&" . $entity_key . ($a + 1)] = $entity_value;
          $counter++;
        }
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
      where dataset_intent = ? and entity_list = ? and status_aktif_dataset = 1";
      $args = array(
        $response["intents"][0]["name"], $checkmapping
      );
      $result = executeQuery($sql, $args);
      $result = $result->result_array();
      $dataset_list = array();
      $dataset_detail = array();
      $dataset_detail_support = array();
      if (count($result) > 0) {
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
          inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = tbl_dataset.id_db_connection
          inner join tbl_result_type on tbl_result_type.id_pk_result_type = tbl_dataset.id_result_type
          where status_aktif_dataset_related = 1 and id_dataset = ?";
          $args = array(
            $result[$a]["id_submit_dataset"]
          );
          $support_result = executeQuery($sql, $args);
          $support_result = $support_result->result_array();
          for ($b = 0; $b < count($support_result); $b++) {
            if (!in_array($support_result[$b]["id_submit_dataset"], $dataset_list)) {
              array_push($dataset_list, $support_result[$b]["id_submit_dataset"]);
              $data = array(
                "hostname" => $support_result[$b]["db_hostname"],
                "username" => $support_result[$b]["db_username"],
                "password" => $this->encryption->decrypt($support_result[$b]["db_password"]),
                "dbname" => $support_result[$b]["db_name"],
                "result_type" => $support_result[$b]["result_type"],
                "query" => $support_result[$b]["dataset_query"],
                "name" => $support_result[$b]["dataset_name"],
                "notes" => $support_result[$b]["dataset_notes"],
                "id" => $support_result[$b]["id_submit_dataset"]
              );
              array_push($dataset_detail_support, $data);
            }
          }
        }
        $dataset_detail = array_merge($dataset_detail,$dataset_detail_support);
        
      } else {
        $sql = "
        select * from (
          select *,ifnull(group_concat(entity_name order by entity_name ASC),'-') as entity_list from tbl_dataset
          left join tbl_dataset_entity on tbl_dataset_entity.id_fk_dataset = tbl_dataset.id_submit_dataset
          group by id_submit_dataset
        ) as a 
        inner join tbl_db_connection on tbl_db_connection.id_submit_db_connection = a.id_db_connection
        inner join tbl_result_type on tbl_result_type.id_pk_result_type = a.id_result_type
        where dataset_intent = ? and entity_list = '-'";
        $args = array(
          $response["intents"][0]["name"]
        );
        $result = executeQuery($sql, $args);
        $result = $result->result_array();
        if (count($result) > 0) {
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
          }
        }
      }
      $chart = array();
      $table = array();
      $widget = array();
      for ($a = 0; $a < count($dataset_detail); $a++) {
        foreach ($replace_array as $key => $value) {
          $dataset_detail[$a]["query"] = str_replace($key, $value, $dataset_detail[$a]["query"]);
        }
        $conn = new mysqli($dataset_detail[$a]["hostname"], $dataset_detail[$a]["username"], $dataset_detail[$a]["password"]);
        if ($conn->connect_error) {
        } else {
          $conn->close();
          $config = array(
            "hostname" => $dataset_detail[$a]["hostname"],
            "username" => $dataset_detail[$a]["username"],
            "password" => $dataset_detail[$a]["password"],
            "database" => $dataset_detail[$a]["dbname"],
            "dbdriver" => "mysqli",
          );
          $db1 = $this->load->database($config, true);
          $result = $db1->query($dataset_detail[$a]["query"]);
          if ($result) {
            $sql = "select * from tbl_dataset_dbfield_mapping where id_fk_dataset = ?";
            $args = array(
              $dataset_detail[$a]["id"]
            );
            $db_field = executeQuery($sql,$args);
            $dataset_result = array(
              "title" => $dataset_detail[$a]["name"],
              "dataset_desc" => $dataset_detail[$a]["notes"],
              "result_type" => $dataset_detail[$a]["result_type"],
              "value" => array(
                "header" => $db_field->result_array(),
                "content" => $result->result_array(),
              )
            );
            if(strtolower($dataset_detail[$a]["result_type"]) == "bar chart"):
              array_push($chart, $dataset_result);
            elseif(strtolower($dataset_detail[$a]["result_type"]) == "table"):
              array_push($table, $dataset_result);
            elseif(strtolower($dataset_detail[$a]["result_type"]) == "widget"):
              array_push($widget, $dataset_result);
            endif;
          }
          else{
            #print_r($dataset_detail);
            $sql = 'set @month_name1 = "februari"; set @month_name2 = "april"; select sum(trxamt) as nominal_transaksi, store_city from tbl_sales inner join tbl_toko on tbl_toko.store = tbl_sales.store where store_city = "surabaya" and year(trxdate) = 2021 and case when @month_name1="januari" then month(trxdate)=1 when @month_name1="februari" then month(trxdate)=2 when @month_name1="maret" then month(trxdate)=3 when @month_name1="april" then month(trxdate)=4 when @month_name1="mei" then month(trxdate)=5 when @month_name1="juni" then month(trxdate)=6 when @month_name1="juli" then month(trxdate)=7 when @month_name1="agustus" then month(trxdate)=8 when @month_name1="september" then month(trxdate)=9 when @month_name1="oktober" then month(trxdate)=10 when @month_name1="november" then month(trxdate)=11 when @month_name1="desember" then month(trxdate)=12 end union select sum(trxamt), store_city from tbl_sales inner join tbl_toko on tbl_toko.store = tbl_sales.store where store_city = "batam" and year(trxdate) = 2021 and case when @month_name2="januari" then month(trxdate)=1 when @month_name2="februari" then month(trxdate)=2 when @month_name2="maret" then month(trxdate)=3 when @month_name2="april" then month(trxdate)=4 when @month_name2="mei" then month(trxdate)=5 when @month_name2="juni" then month(trxdate)=6 when @month_name2="juli" then month(trxdate)=7 when @month_name2="agustus" then month(trxdate)=8 when @month_name2="september" then month(trxdate)=9 when @month_name2="oktober" then month(trxdate)=10 when @month_name2="november" then month(trxdate)=11 when @month_name2="desember" then month(trxdate)=12 end;';
            $sql =  trim(preg_replace('/\s+/', ' ', $sql));
            $result = $db1->query($sql);
            print_r($db1->error());
            #echo $db1->last_query();
            #echo $result;
          }
        }
      }
      $data = array(
        "chart" => $chart,
        "table" => $table,
        "widget" => $widget,
        "search" => $request
      );
      $this->load->view("result_template/main",$data);
    else:
      $this->load->view("landing/v_error");
    endif;
  }
}
