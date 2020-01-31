<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://127.0.0.1:8888/project/maks/maks_nlp/ws/endpoint/get_entity_list",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if (!$err) {
    $response = json_decode($response,true);
    if(!array_key_exists("error",$response)){
        echo "Integration Success, No Error Response<br/>";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "maks_km";

        // Create connection
        echo "Connecting to Database...<br/>";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if ($conn) {
            echo "Database Connected<br/>";
            echo "Starting Data Insertion... <br/><br/>";
            for($a = 0; $a<count($response["data"]); $a++){
                echo "Checking ".$response["data"][$a]["entity_name"]." existance...<br/>";
                $sql = "select * from tbl_entity where entity = '".$response["data"][$a]["entity_name"]."';";
                $result = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($result) > 0) {
                    echo $response["data"][$a]["entity_name"]." Not Exists.. Inserting Data<br/>";
                    $sql = "insert into tbl_entity(entity, entity_category, status_aktif_entity, tgl_entity_last_modified, id_user_entity_last_modified) values ('".$response["data"][$a]["entity_name"]."','ENTITY',1,now(),0)";
                    if(mysqli_query($conn, $sql)){
                        echo $response["data"][$a]["entity_name"]." Is Successfully Inserted to Database<br/>";
                    }
                    else{
                        echo $response["data"][$a]["entity_name"]." Can Not be Inserted to Database<br/>";
                    }
                } 
                else{
                    echo $response["data"][$a]["entity_name"]." Exists..";
                }
                echo "Go to Next Iteration... <br/><br/>";
            }
            mysqli_close($conn);
        }
    }
}

?>
