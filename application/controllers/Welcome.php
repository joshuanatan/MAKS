<?php
class Welcome extends CI_Controller{
    private $id_system_request;
    private $answer;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $where = array(
            "status_aktif_system_request" => 1
        );
        $field = array(
            "id_submit_system_request","phrase"
        );
        $result = selectRow("system_request",$where,$field,8,"","id_submit_system_request","DESC");
        $data["phrase"] = $result->result_array();
        $this->load->view("landing/v_head");
        $this->load->view("landing/v_landing",$data);
        $this->load->view("landing/v_close");
        $this->load->view("plugin/speech-to-text/speech-to-text-js");
        $this->welcome_speech();
    }
    private function create_new_request($phrase){
        $data = array(
            "phrase" => $phrase,
            "status_aktif_system_request" => 1,
            "tgl_system_request_add" => date("Y-m-d H:i:s")
        );
        $this->id_system_request = insertRow("system_request",$data);
    }
    private function system_request_result($id_system_request,$step,$result){
        $data = array(
            "id_system_request" => $id_system_request,
            "system_request_step" => $step,
            "system_request_result" => $result
        );
        insertRow("system_request_result",$data);
    }
    private function system_request_log($id_system_request,$executed_function,$connection_status,$connection_msg){
        $data = array(
            "id_system_request" => strtoupper($id_system_request),
            "executed_function" => strtoupper($executed_function),
            "connection_status" => strtoupper($connection_status),
            "connection_msg" => strtoupper($connection_msg),
            "tgl_system_request_log" => date("Y-m-d H:i:s"),
        );
        insertRow("system_request_log",$data);
    }
    public function process(){
        #menampung request dari user
        $request = $this->input->post("question");
        #mengeluarkan request pada saat penampilan hasil
        $this->request_text($request);
        #membuat log request baru
        $this->create_new_request($request);
        #membuat close button
        $this->close_button();  
        
         #analisa 1. Natural Language Processing -> Intent & Entity
         $extraction = $this->get_text_meaning($request);
         //print_r($extraction);
         if($extraction){
            #membuat log hasil analisa 1
            $this->system_request_result($this->id_system_request,"get_text_meaning",json_encode($extraction));
            #analisa 2 Intent & Entity -> Set of Datasets
            $dataset = $this->get_result_dataset($extraction);
            if($dataset){
                #membuat log hasil analisa 2
                $this->system_request_result($this->id_system_request,"get_result_dataset",json_encode($dataset));
                #analisa 3 Set of Datasets -> Dashboard
                $dashboard = $this->get_visualization($dataset);
                if($dashboard){
                    #membuat log hasil analisa 3
                    $this->system_request_result($this->id_system_request,"get_visualization",json_encode($dashboard));
                    
                    #menampilkan hasil dan di render dalam bentuk html
                    header("content-type:text/html");
                    echo html_entity_decode($dashboard);
                    #end menampilkan hasil
                    
                    #load library text to speech & speech to text
                    $this->text_to_speech();
                    //$this->load->view("landing/v_result_js");
                    #end load library text to speech & speech to text
                }
                else{
                    #error page
                    $fail_code = "Dashboard Generator: Result type for some datasets can not be found";
                    $this->error_page($fail_code);
                }
            }
            else{
                #error page
                $fail_code = "Dataset Retrival: Dataset query for requested Intent & Entity combination can not be found";
                $this->error_page($fail_code);
            }
         }
         else{
            #error page
            $fail_code = "Text Extraction: Natural language processing can not evaluate the request";
            $this->error_page($fail_code);
         }
    }

     private function get_text_meaning($request){
        $url = "http://joshuanatan.info/maks_nlp/ws/endpoint/get_text_meaning";
        $header = array(
            "client-token:0cbe03bbbd1dd1667e98145030304c30"
        );
        $body = array(
            "search_text" => $request
        );
        $response = $this->curl->post($url,$header,$body);
        if($response){
            if($response["err"]){
                $this->system_request_log($this->id_system_request,"get_text_meaning","ERROR",$response["err"]);
            }
            else{
                $respond = json_decode($response["response"],true);
                $this->system_request_log($this->id_system_request,"get_text_meaning",$respond["status"],$respond["msg"]);
                if($respond){
                    if(!array_key_exists("error",$respond)){
                        header("content-type:application/json");
                        //print_r($respond["text_entity_list"]);
                        return $respond["text_entity_list"];
                    }
                }
            }
        }
        return false;
     }
     
    private function get_result_dataset($extraction){
        /*
        $url = "http://localhost:8888/project/skripsi_support/mysql_query_builder/ws/endpoint/get_dataset";
        $header = array(
            "client-token:804fd4df1014130b22087d4eb41b3298"
        );
        $body = array(
            "text_entity_list" => json_encode($extraction)
        );*/
        
        $url = "http://joshuanatan.info/maks_qb/ws/endpoint/get_dataset";
        $header = array(
            "client-token:804fd4df1014130b22087d4eb41b3298"
        );
        $body = array(
            "text_entity_list" => json_encode($extraction)
        );
        $response = $this->curl->post($url,$header,$body);
        //print_r($response);
        if($response){
            if($response["err"]){
                $this->system_request_log($this->id_system_request,"get_result_dataset","ERROR",$response["err"]);
            }
            else{
                $respond = json_decode($response["response"],true);
                $this->system_request_log($this->id_system_request,"get_result_dataset",$respond["status"],$respond["msg"]);
                if($respond){
                    if(!array_key_exists("error",$respond)){
                        $respond["dataset_list"] = $respond["dataset_result"];
                        for($a = 0; $a<count($respond["dataset_list"]); $a++){
                            if(array_key_exists("is_answer",$respond["dataset_list"][$a])){
                                $access_key = $respond["dataset_list"][0]["value"]["header"][0]["db_field"];
                                $this->answer = $respond["dataset_list"][0]["value"]["content"][0][$access_key];
                            }
                        }
                        return $respond["dataset_list"];
                    }
                }
            }
        }
        return false;
    }
    private function get_visualization($dataset){
        $url = "http://joshuanatan.info/maks_rb/ws/endpoint/get_result";
        $header = array(
            "client-token:6b107a908f4b1643ae4388afeb7cdea7"
        );
        $body = array(
            "dataset_list" => json_encode($dataset)
        );
        $response = $this->curl->post($url,$header,$body);
        //print_r($body);
        if($response){
            if($response["err"]){
                $this->system_request_log($this->id_system_request,"get_visualization","ERROR",$response["err"]);
            }
            else{
                $respond = json_decode($response["response"],true);
                $this->system_request_log($this->id_system_request,"get_visualization",$respond["status"],$respond["msg"]);
                if($respond){
                    if(!array_key_exists("error",$respond)){
                        return $respond["result_page"];
                    }
                }
            }
        }
        return false;
    }
    public function load_registered_phrase($id_system_request){
        $where = array(
            "id_system_request" => $id_system_request
        );
        $field = array(
            "system_request_result"
        );
        $result = selectRow("system_request_result",$where,$field,"","","id_submit_system_request_variable","DESC");
        $result = $result->result_array();
        header("Content-type:text/html");
        echo html_entity_decode(json_decode($result[0]["system_request_result"]));
    }
    public function phrase(){
        
        $where = array(
            "status_aktif_system_request" => 1
        );
        $field = array(
            "id_submit_system_request","phrase","tgl_system_request_add"
        );
        $result = selectRow("system_request",$where,$field,"10","","phrase","ASC");
        $data["phrase"] = $result->result_array();
        
        $this->load->view("landing/v_head");
        $this->load->view("landing/v_phrase",$data);
        $this->load->view("landing/v_close");
        $this->load->view("landing/v_phrase_js");
    }
    private function text_to_speech(){
        $url = "https://voicerss-text-to-speech.p.rapidapi.com/?b64=true&r=0&c=mp3&f=48khz_16bit_stereo&src=".$this->answer."&hl=en-us&key=2932703887434dc0b7abdef15b38abdd";
        $header = array(
            "x-rapidapi-host: voicerss-text-to-speech.p.rapidapi.com",
            "x-rapidapi-key: 894dcf2befmsh7d43a9ad513cf75p189753jsn913af9a6d18b"
        );
        $response = $this->curl->get($url,$header);
        if($response){
            if($response["err"]){

            }
            else{
                $data["audio"] = $response["response"];
            }
        }
        $this->load->view("voice-rss/voice-rss",$data);
        //$this->load->view("landing/v_result_js");
        //$this->load->view("plugin/webspeech/texttospeech-js");
        //$this->load->view("plugin/webspeech/webspeech-js",$answer);
    }
    private function close_button(){
        $button = "<button class = 'offset-lg-11 btn btn-dark btn-sm' onclick = 'window.close()'>&times;</button>";
        $button .= "<br/><br/>";
        echo $button;
    }
    private function error_page($fail_code){
        $data["fail_code"] = $fail_code;
        header("content-type:text/html");
        $this->page_generator->req();
        $this->page_generator->head_close();
        $this->page_generator->content_open();
        $this->load->view("error_page",$data);
        $this->page_generator->close();
    }
    private function request_text($request){
        echo "<div class = 'alert alert-success'>Request: ".$request."</div>";
    }
    private function welcome_speech(){
        $url = "https://voicerss-text-to-speech.p.rapidapi.com/?b64=true&r=0&c=mp3&f=48khz_16bit_stereo&src=welcome%20to%20maks%21%20how%20can%20I%20help%20you%3F&hl=en-us&key=2932703887434dc0b7abdef15b38abdd";
        $header = array(
            "x-rapidapi-host: voicerss-text-to-speech.p.rapidapi.com",
            "x-rapidapi-key: 894dcf2befmsh7d43a9ad513cf75p189753jsn913af9a6d18b"
        );
        $response = $this->curl->get($url,$header);
        if($response){
            if($response["err"]){

            }
            else{
                $data["audio"] = $response["response"];
            }
        }
        $this->load->view("voice-rss/voice-rss",$data);
        //$this->load->view("landing/v_result_js");
        //$this->load->view("plugin/webspeech/texttospeech-js");
        //$this->load->view("plugin/webspeech/webspeech-js",$answer);
    }
}
?>