<?php 
include_once('db_connection.php');
    if (isset($_POST['inputdata'])) {
        $jssonval = $_POST['inputdata']; 
        $message = '';
        
        $content = json_decode( $jssonval,true);
        print_r($content);

        $selectCity = $content['selectCity'];
        $from = $content['from'];
        $to = $content['to'];
        $movesize = $content['moveSize'];

        if(mysqli_query($conn,"INSERT INTO reg (select_city,move_from,move_to,move_size) 
        VALUES('".$selectCity."','".$from."',  '".$to."',  '".$movesize."')")){
            echo $message = 'Record Added  table';
        }else{
            echo $message = 'Error to add in table';
        }
    }
?>