<?php 

require "config.php";

header("Access-Control-Allow-Origin: *"); 

header('Content-type: application/json');

$sql="Select * from location";
$res = mysqli_query($conn,$sql);
$points=array();
while($data=mysqli_fetch_array($res)){
$points[]=array('LAT'=>$data[1],'LONG'=>$data[2]);

}

echo json_encode($points);

?>