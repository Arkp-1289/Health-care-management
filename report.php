<?php
  $db_hostname="127.0.0.1";
  $db_username="root";
  $db_password="";
  $db_name="hospital";

  $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

  if (!$conn){
    echo "<script type='text/javascript'>window.alert('connection not possible');</script>";
    exit;
  }

  $message=$_POST['message'];
  $username=$_POST['username'];

  $sql="INSERT INTO report (username,message) values ('$username','$message')";
  $result=mysqli_query($conn,$sql);

if ($result){
    echo '<script type="text/javascript">alert("We will get back to you soon");</script>';
    echo "<script type='text/javascript'>window.location='http://127.0.0.1/hospital%20website/login.php'</script>";
    exit;
}

  echo "not inserted";

  mysqli_close($conn);