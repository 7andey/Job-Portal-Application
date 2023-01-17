<?php include("config.php");
   

    $id = $_GET['id'];
    $jobid = $_GET['Joblistid'];
	

// the rejected job posts from the recruiter will be deleted from applied seekers and updated in the job list
$qry = "UPDATE applied_seekers
-- SET Decision = 'Decision', User_id = '$id'
SET Rejection = 'Rejection', User_id = '$id'
WHERE Joblistid = $jobid";
$rlt = mysqli_query($db, $qry);
if(!$rlt){
die("query fail".mysqli_error($db));
}
else{
//$row = mysqli_fetch_assoc($result0);
// echo "Success update";
}


$query = "DELETE FROM applied_seekers WHERE Joblistid=$jobid";
$result = mysqli_query($db, $query);

if(!$result){
    die("query failed".mysqli_error($db));
}
else{
        header('location:seekerlist.php');
		echo "Success";
}
?>