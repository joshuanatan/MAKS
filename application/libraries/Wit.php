<?php

class Wit
{
  private $server_access_token;
  protected $CI;
  public function __construct()
  {
    $this->CI = &get_instance();
    $this->CI->load->helper('standardquery_helper');
    $this->get_server_token();
  }
  private function get_server_token()
  {
    $where = array(
      "status_aktif_wit_ai_acc" => 1
    );
    $field = array(
      "server_access_token"
    );
    $result = selectRow("tbl_wit_ai_acc", $where, $field);
    $result_array = $result->result_array();
    $this->server_access_token = $result_array[0]["server_access_token"];
  }
  public function check_load_library()
  {
    return $this->server_access_token;
  }

  /*entities*/
  public function get_intents()
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.wit.ai/intents",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer " . $this->server_access_token
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $respond["err"] = $err;
    $respond["response"] = $response;
    curl_close($curl);
    return $respond;
  }
  public function get_entities()
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.wit.ai/entities",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer " . $this->server_access_token
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $respond["err"] = $err;
    $respond["response"] = $response;
    curl_close($curl);
    return $respond;
  }
  public function post_intents($intent_name)
  {
    $body = array(
      "name" => $intent_name
    );

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.wit.ai/intents",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($body),
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
        "Authorization: Bearer " . $this->server_access_token
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $respond["err"] = $err;
    $respond["response"] = $response;
    curl_close($curl);
    return $respond;
  }
  public function post_entities($entity_name)
  {
    $body = array(
      "name" => $entity_name,
      "roles" => []
    );

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.wit.ai/entities",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($body),
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
        "Authorization: Bearer " . $this->server_access_token
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $respond["err"] = $err;
    $respond["response"] = $response;
    curl_close($curl);
    return $respond;
  }

  public function get_message($message)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.wit.ai/message?q=" . urlencode($message),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer " . $this->server_access_token
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $respond["err"] = $err;
    $respond["response"] = $response;
    curl_close($curl);
    return $respond;
  }
}
