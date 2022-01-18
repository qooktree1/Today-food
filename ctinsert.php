
    <?php
    include "./DBCONNECT.php";
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $country=$_POST['country'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];
    $subject=$_POST['subject'];
    $prevPage=$_SERVER["HTTP_REFERER"];
    $sql="INSERT INTO CONTACTUS(FIRSTNAME,LASTNAME,COUNTRY,EMAIL,PHONE,SUBJECT) values ('$firstname','$lastname','$country','$email','$phonenumber','$subject');";
    mysqli_select_db($connect,"contactus");
    mysqli_query($connect,$sql);
    header("location:".$prevPage);
    ?>
