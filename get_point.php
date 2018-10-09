<?php

include("inc/functions.php");


$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$id3 = $_GET['id3'];
$id4 = $_GET['id4'];
$id5 = $_GET['id5'];
$id6 = $_GET['id6'];
$id7 = $_GET['id7'];
$id8 = $_GET['id8'];
//$id9 = $_GET['id9'];
$id10 = $_GET['id10'];
$id = 0;

if($id1){
    $id1 = 5;
}
if($id2){
    $id2 = 5;
}
if($id3){
    $id3 = 10;
}
if($id4){
    $id4 = 30;
}
if($id5){
    $id5 = 30;
}
if($id6){
    $id6 = 20;
}
if($id7){
    $id7 = 5;
}
if($id8){
    $id8 = 20;
}
//if($id9){
//    $id9 = 5;
//}
if($id10){
    $id10 = 10;
}
$id = $id1 + $id2 + $id3 + $id4 + $id5 + $id6 + $id7 + $id8 + $id9 + $id10;
?>

<!--<center>Your point is <b>--><?php //echo $id;?><!--</b>. Please fill in all the fields to gain more point...</center>-->
<div class="form-group">
    <center>
    	<label>Your Score is</label>
	</center>
    <center>
        <b style="color: #C3404E">
            <input type="text" class="form-control" name="point" value="<?php echo $id; ?>" style="border: none;border-color: transparent;font-size: 20px;text-align: center;color: #C3404E" readonly>
        </b>
	</center>
</div>
