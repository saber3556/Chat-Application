<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$searchterm = mysqli_real_escape_string($conn, $_POST['searchterm']);
$output = '';
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchterm}%' OR lname LIKE '%{$searchterm}%')");
if(mysqli_num_rows($sql) > 0){
    include_once "data.php";
}else{
    $output .= "No user found related to your search term!";
}
echo $output; 
?>