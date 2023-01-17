<?php
include("config.php");

   
// php code for verifying login credentials
 

    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    $sql = "SELECT * FROM login_user WHERE User_id = '$userid' and Password = '$password' and User_type = '$usertype'";
    $result = mysqli_query($db, $sql);
    if ($result == false) {
        echo '<script>alert("Incorrect credentials")</script>';
    } else {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);


        if ($count == 1) {
            // echo"count = 1";
            if ($row["User_type"] == "job_seeker") {
                header("location: http://localhost/Job_Portal_Application/Seekerprofile.php?id=$userid");
            } else {
                header("location: http://localhost/Job_Portal_Application/recruiterprofile.php?id=$userid");
            }
        } else {
            $error = "invalid login name or password";
        }
    }


?>