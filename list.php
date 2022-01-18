  <?php
        include "./DBCONNECT.php";
        $query = 'select * from tdata order by count desc limit 20';
        $result = mysql_query($query,$connect);
        (int)$count=1;
        while($data = mysql_fetch_array($result)){
            ?>
                    <tr>
                        <td class="no"><?=$count?></td>
                        <td class="no"><?=$row["user_name"]?></td>
                        <td class="no"><?=$row["title"]?></td>
                        <td class="no"><?=$row["wdata"]?></td>
                    </tr>
            <?php
                $count = $count+1
                }
            ?>
