<!DOCTYPE html>


<html>

<head>
    <title>LOGIN</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

</html>
<!-- code for html of the login page -->
<body style="background-image: url(background.jpg)">
    <div class="pagename" style="display:flex;height: 10%; font-size:25px; justify-content: center; margin: 10px; padding: 10px; background-color: aliceblue;">
        JOB PORTAL LOGIN
    </div>
    <div id="main" class="col-md-6" style="z-index:1; background-color: aliceblue; opacity:0.8; margin-left:auto; display:flex; justify-content: space-evenly; margin-right: auto;width:50%; padding: 4rem; margin-top:20vh; border: 1px solid black; border-radius: 15px;">
        <form method="POST" action="verifylogin.php" >
            <div><label style="min-width: 6rem;padding:3px;margin:5px"  for="userid">User id</label><input type="text" name="userid" class="input m-1" id="userid"></div>
            <div><label style="min-width: 6rem;padding:3px;margin:5px" for="password">Password</label><input type="password" name="password" class="input m-1" id="password"></div>
            <div><label style="min-width: 6rem;padding:3px;margin:5px" for="usertype" >User type</label><select name="usertype" id="usertype" class="m-1"></div>
                <option value="job_seeker">Job Seeker</option>
                <option value="Recruiter">Recruiter</option>
            </select>

            <div style="display: flex; justify-content: center; margin-top: 20px"><input type="submit" value="Login"></div>
        </form>
    </div>


</body>