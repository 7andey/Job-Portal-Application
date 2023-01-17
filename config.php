<?php
// Database information             
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'job_application_portal');
 
//connect to MySQL database
$db = mysqli_connect(SERVER, USERNAME, PASSWORD, DB_NAME);
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    // echo "yess";
}
?>