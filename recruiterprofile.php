<?php include ("config.php");?>

<?php
// code for getting the recruiter details from the db 
if(isset ($_GET['id'])){
    $userid=$_GET['id'];
    
    
                    $qry = "SELECT recruiter_profile.User_id, Email, DOB FROM recruiter_profile WHERE recruiter_profile.User_id= '$userid'";
                    $result = mysqli_query($db, $qry);
                    if ($result == false) {
                        echo '<script>alert("Hello")</script>';
                    } else {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    }

                }


?>


       

<head>
        <title>
            Recruiter Profile
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <div class="pagename" style="display:flex;height: 10%; font-size:25px; justify-content: center; margin: 10px; padding: 10px; background-color: aliceblue;">
            Recruiter profile
    </div>
    <div style=" padding:10px; z-index:11; position: fixed; top: 10px; right: 60px">
            <a type="button" class="btn btn-primary" href="login.php" type=button style="padding:10px; border-radius: 10px">LOG OUT</a>
        </div>
    <div style="display: flex; width:90%">
            <div class="col-md-4 m-2" style="display: block;">
            <div class="m-2" style="background-color:aliceblue; border: 1px solid black; border-radius: 10px; padding:2rem">
                    <div class="field m-1 p-2" >Name: <?php echo $row['User_id']?></div>
                    <div class="field m-1 p-2" >Email: <?php echo $row['Email']?></div>
                    <div class="field m-1 p-2" >Date: <?php echo $row['DOB']?></div>
            </div>
            
            <div> <a type="button" class="btn btn-primary" href="seekerlist.php" class="p-1" style="margin:20px">Applied seekers</a>
            </div>
            </div>

            <div class="col-md-8">
            <div> <a type="button" class="btn btn-primary" style="margin:10px; float:right" href="addjob.php?id=<?php echo $row['User_id']?> "class="m-2 p-1" >Add Job</a></div>

                <div class="col-md-8" style="display: flex;margin-right:auto;margin-left:auto;width:100%">
              <table class="table col-md-8" style="margin: 20px; margin-left: auto; margin-right:auto">
              <thead>
               <tr>
                <th>Joblistid</th>
                <th>Company</th>
                <th>Job title</th>
                <th>skills</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT Joblistid, Company, Job_title, Skills FROM joblist";
                $result = mysqli_query($db, $query);
                if ($result == false) {
                echo '<script>alert("Hello")</script>';
                } else{
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
                
           
                
                ?>
                <tr>
                <td><?php echo $row['Joblistid']?></td>
                <td><?php echo $row['Company']?></td>
                <td><?php echo $row['Job_title']?></td>
                <td><?php echo $row['Skills']?></td>
                <td> 
                <?php
                }
            } ?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </body>
</html>