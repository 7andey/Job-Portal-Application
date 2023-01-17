<?php include ("config.php");?>

<html>
    <head>
        <title>Jobs list</title>
        <!-- the job list entities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <div>
    <div class="pagename" style="display:flex;height: 10%; font-size:25px; justify-content: center; margin: 10px; padding: 10px; background-color: aliceblue;">
            Jobs list
    </div>
    <div style=" padding:10px; z-index:11; position: fixed; top: 10px; right: 60px">
            <a type="button" class="btn btn-primary" href="login.php" type=button style="padding:10px; border-radius: 10px">LOG OUT</a>
        </div></div>
        <table class="table col-md-8" style="width:70%; margin-left: auto; margin-right:auto">
            <thead>
            <tr>
               <th class="col-md-2">Joblistid</th>
                <th class="col-md-2">Company</th>
                <th class="col-md-2">Job title</th>
                <th class="col-md-2">skills</th>
                <th class="col-md-2"> apply</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $id = $_GET['id'];
                
                $qry = "SELECT Joblistid, Company, Job_title, Skills, Applied FROM joblist";
                $result = mysqli_query($db, $qry);
                if ($result == false) {
                    echo '<script>alert("Hello")</script>';
                } else {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        
                    // print "form action='$path' method=\'post\'>";
                    $a = "applyjob.php?id=";
                    $a.= $id;
                    $b = "&Joblistid=";
                    $b.=$row['Joblistid'];
                    $a .= $b;


                ?>
                
            <tr>
                <td><?php echo $row['Joblistid']?></td>
                <td><?php echo $row['Company']?></td>
                <td><?php echo $row['Job_title']?></td>
                <td><?php echo $row['Skills']?></td>
                <td> 
                <?php
                    print "<a type=\"button\" class=\"btn btn-primary\" href=$a type=button style=\"padding:7px; border-radius: 10px\" >Apply</a>"
                ?>
                    </td>
            </tr>
            <?php
                    }
                }               
                ?>
            </tbody>
        </table>
        
    </body>
</html>