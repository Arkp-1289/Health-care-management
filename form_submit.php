<?php
$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="hospital";

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

if (!$conn){
    echo "Not connected".mysqli_connect_error();
}

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$username=$_POST['username'];
$password=$_POST['password'];

$select=mysqli_query($conn,"SELECT * from users where email='$email' or username='$username'");
if (mysqli_num_rows($select)){
    echo '<script type="text/javascript">alert("Email or username already exists");</script>';
    echo '<script type="text/javascript">window.location="http://127.0.0.1/hospital%20website/register.php";</script>';
    exit;
}

$sql="INSERT INTO users (name,email,mobile,username,password) VALUES('$name','$email','$mobile','$username','$password')";

$result=mysqli_query($conn,$sql);

if (!$result){
    echo '<script type="text/javascript">alert("Email already exists");</script>';
    exit;
}

echo '<script type="text/javascript">alert("Registration successful");</script>';

echo '<script type="text/javascript">window.location="http://127.0.0.1/hospital%20website/login.php";</script>';

mysqli_close($conn);

