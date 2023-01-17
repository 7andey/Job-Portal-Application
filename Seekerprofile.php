
<?php include ("config.php");?>

<?php
// the seeker profile data will be retrived here when called with the seeker credentials
if(isset ($_GET['id'])){
    $userid=$_GET['id'];
    
    
                    $qry = "SELECT job_seeker_profile.User_id, Email_id, Gender, DOB, Education, University, Skills FROM job_seeker_profile INNER JOIN EDU ON job_seeker_profile.User_id = EDU.User_id WHERE job_seeker_profile.User_id = '$userid'";
                    $result = mysqli_query($db, $qry);
                    if ($result == false) {
                        echo '<script>alert("Hello")</script>';
                    } else {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    }



}

                ?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Seeker profile</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <div>
        <div class="pagename" style="display:flex;height: 10%; font-size:25px; justify-content: center; margin: 10px; padding: 10px; background-color: aliceblue;">
            Seeker profile

        </div>
        <div style=" padding:10px; z-index:11; position: fixed; top: 10px; right: 60px">
            <a type="button" class="btn btn-primary" href="login.php?id=<?php echo $row['User_id']?>" type=button style="padding:10px; border-radius: 10px">LOG OUT</a>
        </div>
        </div>
        <div style="display: flex;width:90%">
        
                <div class="profile">
                    <div class="field" >Name: <?php echo $row['User_id']?></div>
                    <div class="field" >Email: <?php echo $row['Email_id']?></div>
                    <div class="field">Gender: <?php echo $row['Gender']?></div>
                    <div class="field" >Date: <?php echo $row['DOB']?></div>
                </div>

            <div class="profile">
                <div class="field" >Degree: <?php echo $row['Education']?></div>
                <div class="field" >University: <?php echo $row['University']?></div>
                <div class="field" >Skills: <?php echo $row['Skills']?></div>
            </div>
        </div>
        <div style="margin:10px; padding:10px">
            <a type="button" class="btn btn-primary" href="joblist.php?id=<?php echo $row['User_id']?>" type=button style="padding:10px; border-radius: 10px">Look for Jobs</a>
        </div>
        <div style="margin:10px; padding:10px">
            <a type="button" class="btn btn-primary" href="jobdecision.php?id=<?php echo $row['User_id']?>" type=button style="padding:10px; border-radius: 10px">Job Decision</a>
        </div>
        
    </body>
</html>
    