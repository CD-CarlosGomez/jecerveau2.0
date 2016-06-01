<?php
print_r($_POST);
echo "<br><hr><br>"; 
if($_FILES){
	print_r($_FILES);
}

//$obj=jsonString2Obj($_POST['json']);

//echo $obj->desc;

function jsonString2Obj($str){
	return json_decode(stripcslashes($str));
}
?>