<?php 
require "config.php";
header("Access-Control-Allow-Origin: *"); 
header('Content-type: application/json');
$sql="Select * from voting";
$res = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($res);

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$sql="Select * from qrytally";
$res = mysqli_query($conn,$sql);
while($data=mysqli_fetch_array($res)){
	
$string = $data[0];
$pieces = explode(' ', $string);
$last_word = array_pop($pieces);

	
	
	
	
$result[]=array('value'=>($data[1]/$rows)*100,'color'=> '#'.random_color(),'label'=>$last_word,'VOTES'=>$data[1],'TOTAL'=>$rows);
	
}
echo json_encode($result);

?>