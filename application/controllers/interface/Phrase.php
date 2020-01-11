<?php 
class Phrase extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function search(){
        $like = array(
            "phrase" => $this->input->post("text")
        );
        $where = array(
            "status_aktif_system_request" => 1
        );
        $field = array(
            "id_submit_system_request","phrase","tgl_system_request_add"
        );
        $result = selectRow("system_request",$where,$field,"10","","","","",$like);
        $result = $result->result_array();
        echo json_encode($result);
    }
}