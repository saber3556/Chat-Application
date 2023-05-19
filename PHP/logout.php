<?php

session_start();
if(isset($_SESSION['unique_id'])){  //if user is logged in then come to this page otherwise go to login page
    include_once "config.php";
    $lougout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if(isset($lougout_id)){ //if logout id is set
        $status = "Offline now";

        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = '{$lougout_id}'");

        if($sql){

            session_unset();
            session_destroy();
            header("location: ../Login.php");
            
        }
    }else{
        header("location: ../usres.php");
    }
}else{
    header("location: ../Login.php");
}

?>