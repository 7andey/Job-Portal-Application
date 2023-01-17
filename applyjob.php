<?php include("config.php");
//    php for apply job functionality

    $id = $_GET['id'];
    $jobid = $_GET['Joblistid'];
	
echo $id;
echo $jobid;

$qry = "UPDATE joblist
SET Applied = 'applied', User_id = '$id'
WHERE Joblistid = $jobid";
$rlt = mysqli_query($db, $qry);
if(!$rlt){
    die("query fail".mysqli_error($db));
}
else{
    //$row = mysqli_fetch_assoc($result0);
    // echo "Success update";
}

$query = "DELETE FROM joblist WHERE Joblistid=$jobid";
$result = mysqli_query($db, $query);

if(!$result){
    die("query failed".mysqli_error($db));
}
else{
        header('location:joblist.php?id=');
		// echo "Success";
}
?>