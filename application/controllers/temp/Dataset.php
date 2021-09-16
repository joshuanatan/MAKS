<?php
class Dataset extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function random_sales_store(){
        $config = array(
            "hostname" => "127.0.0.1",
            "username" => "root",
            "password" => "",
            "database" => "skripsi_dataset",
            "dbdriver" => "mysqli"
        );
        $db = $this->load->database($config,true);
        $store_id = array(
            "215","217","243","255","257","261","263","267","273","275","283","315","371","375","377","379","389","405","409","415","419","426","441","453","471","501","503","507","511","517","523","528","533","537","545","553","555","563","567","571","585","595"
        );
        $where = array(
            "trxnum >" => 0
        );
        $field = array(
            "trxnum"
        );
        $db->select($field);
        $result = $db->get_where("tbl_sales",$where);
        $result = $result->result_array();
        for($a = 0; $a<count($result); $a++){
            $where = array(
                "trxnum" => $result[$a]["trxnum"]
            );
            $data = array(
                "store" => $store_id[rand(0,count($store_id)-1)]
            );
            $db->update("tbl_sales",$data,$where);
        }
    }
}
?>