<?php
include "../../DBCONNECT.php";
$code = $_POST["code"];
$user_name=$_POST["user_name"];
$user_pw = MD5($_POST['user_pw']);
$title=$_POST["title"];
$story=$_POST["story"];
$sql = "SELECT * FROM wtable WHERE code='$code';";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
if($row["user_pw"] == $user_pw){
    $sql = "UPDATE wtable SET user_name='$user_name', title='$title', story='$story' WHERE code='$code';";
    $connect->query($sql);
    echo("<script>window.alert(\"Changed\");location.href=\"bulletinboard.html?code=$code\";</script>");
}else{
    echo("<script>window.alert(\"Error\");location.href=\"bulletinboard.html?code=$code\";</script>");
}



//$row = $result->fetch_assoc();


?>
