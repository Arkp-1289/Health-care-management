<?php
    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="hospital";

    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

    if (!$conn){
        echo " NOt connected!";
        exit;
    }

    $username=$_POST['username'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $select=mysqli_query($conn,"SELECT * from users where email='$email' and username='$username'");

    if (!mysqli_num_rows($select)){
        echo '<script type="text/javascript">alert("You have to register First");</script>';
        echo "<script type='text/javascript'>window.location='http://127.0.0.1/hospital%20website/register.php'</script>";
        exit;
    }

    $sql="INSERT INTO report (username,message) values('$username','$message')";
    $result=mysqli_query($conn,$sql);

    echo "<script type='text/javascript'>alert('we get back you soon.....please take care dear');</script>";

    echo "<script type='text/javascript'>window.location='http://127.0.0.1/hospital%20website/register.php'</script>";

    mysqli_close($conn);
