<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://127.0.0.1:8888/project/maks/maks_km/ws/endpoint/get_dataset_list",
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
        $dbname = "maks_rb";

        // Create connection
        echo "Connecting to Database...<br/>";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if ($conn) {
            echo "Database Connected<br/>";
            echo "Starting Data Insertion... <br/><br/>";
            for($a = 0; $a<count($response["data"]); $a++){
                echo "Checking ".$response["data"][$a]["dataset_key"]." existance...<br/>";
                $sql = "select * from tbl_result_type_mapping where mapping_key = '".$response["data"][$a]["dataset_key"]."';";
                $result = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($result) > 0) {
                    echo $response["data"][$a]["dataset_key"]." Not Exists.. Inserting Data<br/>";
                    $sql = "insert into tbl_result_type_mapping (mapping_key, result_type, status_aktif_result_type_mapping, tgl_result_type_mapping_last_modified, id_user_result_type_mapping_last_modified)
                    values (
                    '".$response["data"][$a]["dataset_key"]."','','1',now(),'0')";
                    if(mysqli_query($conn, $sql)){
                        echo $response["data"][$a]["dataset_key"]." Is Successfully Inserted to Database<br/>";
                    }
                    else{
                        echo $response["data"][$a]["dataset_key"]." Can Not be Inserted to Database<br/>";
                    }
                } 
                else{
                    echo $response["data"][$a]["dataset_key"]." Exists..";
                }
                echo "Go to Next Iteration... <br/><br/>";
            }
            mysqli_close($conn);
        }
    }
}

?>
