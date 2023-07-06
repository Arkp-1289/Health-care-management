<?php
    session_start();
    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="hospital";
 
    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

    if (!$conn){
        echo '<script type="text/javascript">alert("Connection Not established");</script>';
        exit;
    }
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * from users where username='$username' and password='$password'";

    $result=mysqli_query($conn,$sql);

    if (!$result){
        echo '<script type="text/javascript">alert("Not fetched");</script>';
    }

    $row=mysqli_fetch_assoc($result);

    if (!$row){
        echo '<script type="text/javascript">alert("email or password is wrong");</script>';
        echo '<script type="text/javascript">window.location="http://127.0.0.1/hospital%20website/login.php"</script>';
        exit;
    } else {
        $_SESSION['user_id']=$row['mobile'];
        $_SESSION['username']=$row['username'];
        $userid=$row['username'];
    }
    $name=$row['name'];
    echo "
    <body style='background-color:;'>
        <div style='height:100px;width:100%;background-color:92B3A6'>
            <h2 style='text-align:center;color:343736;padding-top:40px;font-size:30px;'>HOSPITAL CARE SERVICE</h2>
        </div>
            <h3 style='float:right'>Hello $name </h3>
            <marquee width='100%' direction='right' height='50px'>
                WE ARE THERE FOR YOU...WE TAKE CARE FOR U
            </marquee>
        <div class='col-12 col-md-6 p-x-lg'>
                <h2 style='margin-left:30px;font-size:30px;'>Looking for in-home help & support for you or a loved one?</h2>

                <p style='font-size:25px'>You've come to the right place. You can call us or complete an </br> online enquiry form and one of our care team members from </br>Melbourne Outer East & Glen Waverley will get in contact with you almost immediately. </br>Home Instead can provide in-home care and support </br>when & where you need it, anything from a few hours a week to 24 hour care.</p>

                <hr/>

                <h4 style='font-size:25px'>We are available 24 hours. 7 days a week. Day or night.</h4>

                <ul>
                    <li style='font-size:20px'>Specialise in a wide range of services</li>
                    <li style='font-size:20px'>Flexible and custom Care Plans to suit your needs</li>
                    <li style='font-size:20px'>No waiting lists. No assessments.</li>
                </ul>
        <form method='post' action='report.php'>
        <label for='message'><b>Your Problem  :</b></label>
        <br/>
        <input type='hidden' name='username' id='username'  value='$userid' />>
        <textarea id='message' name='message'  placeholder='Enter Your problem' rows='6' cols='100'required></textarea>
        <br/><br/>
        <button type='submit' id='contact-btn'>Send</button>
        </form>
            
        </div>
        
    </body>";


            
   
   mysqli_close($conn);