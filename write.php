<?php
    include "./DBCONNECT.php";//db 불러오기
    $user_name = $_POST["name"]; //닉네임
    $title = $_POST["title"];//글 제목
    $story = $_POST["content"];//글 내용
    $user_pw = password_hash($_POST["pw"], PASSWORD_DEFAULT); //비번
    $wdata = date("Ymd",time()); //시간


    if(!$user_pw)Error('비밀번호를 입력하세요!!');


    //쿼리전송
$query = "INSERT INTO wtable(user_name,title,story,user_pw,wdata) VALUES(\"$user_name\",\"$title\",\"$story\",\"$user_pw\",\"$wdata\")";

//mysql_query("set names utf8",$connect); //한글문서..
//mysql_query($query,$connect);

$connect->query($query);
//mysql_close; //전송 끝내기
?>
