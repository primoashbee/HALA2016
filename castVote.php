<?php 
require "config.php";
header("Access-Control-Allow-Origin: *"); 
header('Content-type: application/json');
$FBID=$_POST['FBID']; //id
$VOTER=$_POST['VOTER'];//name ng voter
$VOTE=$_POST['VOTE'];//voted
$LOC=$_POST['FROM'];//province
$LAT = $_POST['LAT'];//lat
$LNG=$_POST['LONG'];//lang

// $FBID='123';
// $VOTER='ASHBEE';
// $VOTE='ASHBEE MORGADO';
// $LOC='ZAMBALES';
// $LAT='123213.33232';
// $LNG ='0123';

 $sql ="Select * from voting where FBID='".$FBID."'";
 $res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)){
	$sql="UPDATE voting set PRESIDENT ='".$VOTE."' where FBID='".$FBID."'";
	$res=mysqli_query($conn,$sql);
	$sql="UPDATE voter set PROVINCE ='".$LOC."' where FBID='".$FBID."'";
	$res=mysqli_query($conn,$sql);
	$msg="VOTE UPDATED! Thanks for updating your vote!";

}else{
	//insert sa voter
	$sql="Insert into voters(V_NAME,PROVINCE,FBID) values ('".$VOTER."','".$LOC."','".$FBID."')";
	$res=mysqli_query($conn,$sql);
//insert sa loc
	$sql="Insert into location(LAT,LNG,V_ID) values ('".$LAT."','".$LNG."','".$FBID."')";
	$res=mysqli_query($conn,$sql);
	//insert sa voting
	$sql="Insert into voting(FBID,PRESIDENT) values ('".$FBID."','".$VOTE."')";
	$res=mysqli_query($conn,$sql);
	$msg="VOTE ADDED! Thanks for voting!";
}

$json = array('RESULT'=>$msg);

echo json_encode($json);

?>