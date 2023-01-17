<?php include ("config.php");?>
<html>
    <head>
        <title>
            Seekers list
        </title>
        <!-- the applied seekers list when recruiter views the applied seekers-->
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <div class="pagename" style="display:flex;height: 10%; font-size:25px; justify-content: center; margin: 10px; padding: 10px; background-color: aliceblue;">
            Seekers List
    </div>
    <div style=" padding:10px; z-index:11; position: fixed; top: 10px; right: 60px">
            <a type="button" class="btn btn-primary" href="login.php" type=button style="padding:10px; border-radius: 10px">LOG OUT</a>
        </div>
    <div>
              <table class="table col-md-8" style="min-width:70%; width:80%; margin-left: auto; margin-right:auto">
            <thead>
               <tr>
                <th>Joblistid</th>
                <th>Seeker Name</th>
                <th>Company</th>
                <th>Job title</th>
                <th>skills</th>
                <th>Accept</th>
                <th>Reject</th>
                </tr>
            </thead>

            <tbody>
            <?php
            
                //$id = $_GET['id'];
                $query = "SELECT Joblistid, User_id, Company, Job_title, Skills, Decision, Rejection FROM applied_seekers";
                $result = mysqli_query($db, $query);
                if ($result == false) {
                echo '<script>alert("Hello")</script>';
                }else {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        
                    // print "form action='$path' method=\'post\'>";
                    $a = "seekerdecision.php?id=";
                    $a.= $row['User_id'];
                    $b = "&Joblistid=";
                    $b.=$row['Joblistid'];
                    $a .= $b;

                    $c = "Rejectseeker.php?id=";
                    $c.= $row['User_id'];
                    $d = "&Joblistid=";
                    $d.= $row['Joblistid'];
                    $c .= $d;
                
           
                
                ?>
               <tr>
               <td><?php echo $row['Joblistid']?></td>
               <td><?php echo $row['User_id']?></td>
                <td><?php echo $row['Company']?></td>
                <td><?php echo $row['Job_title']?></td>
                <td><?php echo $row['Skills']?></td>
                <td>
                <?php
                    print "<a href=$a type=button style=\"padding:10px; border-radius: 10px\" >Accept</a>"
                ?>
                </td>
                <td>
                <?php
                    print "<a href=$c type=button style=\"padding:10px; border-radius: 10px\" >Reject</a>"
                ?>
                </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
                
                </table>
                
             </div>

    </body>
</html>