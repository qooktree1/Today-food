<?php
    include "../../DBCONNECT.php";//db 불러오기
    $user_name=$_POST["user_name"]; //닉네임
    $title=$_POST["title"];//글 제목
    $user_pw = MD5($_POST['user_pw']);
    $story=$_POST["story"];//글 내용
    $wdata = Date('Y-m-d');



  //쿼리전송
$query="insert into wtable(user_name,title,story,user_pw,wdata)
                   values('$user_name','$title','$story','$user_pw','$wdata')";
$result = $connect->query($query);


header('Location:bulletinboard.html');
mysqli_close($connect);

?>
