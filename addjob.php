<!DOCTYPE html>
<?php
$id =$_GET['id'];
?>

<html>

<head>
    <title>Addjob</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

</html>
<!-- Add Job post html-->
<body>
    <div class="pagename" style="display:flex;height: 10%; font-size:25px; justify-content: center; margin: 10px; padding: 10px; background-color: aliceblue;">
        ADD JOB POST
    </div>
    <div id="main" class="col-md-6" style="z-index:1; background-color: aliceblue; margin-left:auto; display:flex; justify-content: space-evenly; margin-right: auto;width:50%; padding: 4rem; margin-top:20vh; border: 1px solid black; border-radius: 15px;">
        <form method="POST" action="addedjoblist.php?id=<?php echo $id?>">
            <div><label style="min-width: 7rem; padding: 7px; margin:4px" for="Joblistid">Joblistid</label><input type="text" name="Joblistid" class="input m-1" id="Joblistid"></div>
            <div><label style="min-width: 7rem; padding: 7px; margin:4px" for="Company">Company</label><input type="text" name="Company" class="input m-1" id="Company"></div>
            <div><label style="min-width: 7rem; padding: 7px; margin:4px" for="Job_title">Job title</label><input type="text" name="Job_title" class="input m-1" id="Job_title"></div>
            <div><label style="min-width: 7rem; padding: 7px; margin:4px" for="Skills">Skills</label><input type="text" name="Skills" class="input m-1" id="Skills"></div>
            
        

            <div style="display: flex; justify-content: center; margin-top: 20px"><input type="submit" class="btn btn-primary" value="add"></div>
        </form>
    </div>


</body>