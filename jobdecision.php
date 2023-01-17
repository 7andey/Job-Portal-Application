
<?php include ("config.php");?>

<html>
    <!-- html code for job decision page -->
<head>
    <style>
        
    </style>
<title>
        JOB DECISION
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<div>
        <div class="pagename" style="display:flex;height: 10%; font-size:25px; justify-content: center; margin: 10px; padding: 10px; background-color: aliceblue;">
            Seeker profile

        </div>
        <div style=" padding:10px; z-index:11; position: fixed; top: 10px; right: 60px">
            <a type="button" class="btn btn-primary" href="login.php" type=button style="padding:10px; border-radius: 10px">LOG OUT</a>
        </div>
        </div>
<table class="table col-md-8" style="min-width:70%; width:70%; margin-left: auto; margin-right:auto">
              <thead>
               <tr>
                <th>Joblistid</th>
                <th>Company</th>
                <th>Name</th>
                <th>Job title</th>
                <th>skills</th>
                <th>Decision</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset ($_GET['id'])){
                    $userid=$_GET['id'];

                $query = "SELECT Joblistid, jobdecision.User_id, Company, Job_title, Skills, Decision FROM jobdecision WHERE jobdecision.User_id='$userid'";
                $result = mysqli_query($db, $query);
                if ($result == false) {
                echo '<script>alert("Hello")</script>';
                } else{
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                
           
                
                ?>
                <tr>
                <td><?php echo $row['Joblistid']?></td>
                <td><?php echo $row['User_id']?></td>
                <td><?php echo $row['Company']?></td>
                <td><?php echo $row['Job_title']?></td>
                <td><?php echo $row['Skills']?></td>
                <td><?php echo $row['Decision']?></td>
                </tr>
                
                <?php
            }
            print "</tbody>";
                print "</table>";
            }
            }
            ?>
           
</body>
</html>
