<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<p> 데이터 저장중<p>
<?php
    include "../../DBCONNECT.php";
    // $ch[0] = $_POST["item1"];
    // $ch[1] = $_POST["item2"];
    // $ch[2] = $_POST["item3"];
    // $ch[3] = $_POST["item4"];
    // $ch[4] = $_POST["item5"];
    $ch[0] = $_GET["item0"];
    $ch[1] = $_GET["item1"];
    $ch[2] = $_GET["item2"];
    $ch[3] = $_GET["item3"];
    $ch[4] = $_GET["item4"];
    for($i = 0; $i<5;$i++){
        if(strlen($ch[$i]) == 0 || strlen($ch[$i]) == '0') {$ch[$i] = "에러방지";}
        $sql = "SELECT * FROM FoodStatistic WHERE Food=\"".$ch[$i]."\"";
        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $sql = "UPDATE FoodStatistic SET Count=Count+1 WHERE Food = \"".$ch[$i]."\";";
            $result = $connect->query($sql);
        }else{
            $sql = "SELECT * FROM ETCStatistics WHERE Food=\"".$ch[$i]."\"";
            $result = $connect->query($sql);
            if($result->num_rows > 0){
                $sql = "UPDATE ETCStatistics SET Count=Count+1 WHERE Food = \"".$ch[$i]."\";";
                $result = $connect->query($sql);
            }else{
                $sql = "INSERT INTO ETCStatistics VALUES (\"".($ch[$i])."\" , 1);";
                $result = $connect->query($sql);
            }
        }
    }
?>
<script>
    self.close();
    window.opener.location.href = url;
</script>