<?php include("config.php");
   

    $id = $_GET['id'];
    $jobid = $_GET['Joblistid'];

// The accept decision by the recruiter will insert data into job decision and update applied seekers

$qry = "UPDATE applied_seekers
SET Decision = 'Decision', User_id = '$id'
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
		"Success";
}
?>