<?php
include "../../DBCONNECT.php";
$code=$_GET['code'];
$sql = "SELECT * FROM wtable WHERE code='$code';";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
if($row["user_pw"] == $user_pw){
    $sql = "DELETE FROM wtable WHERE code='$code'";
    $connect->query($sql);
    echo("<script>window.alert(\"Deleted\");location.href=\"bulletinboard.html?code=$code\";</script>");

}else{
    echo("<script>window.alert(\"Error\");location.href=\"bulletinboard.html?code=$code\";</script>");
}

?>
