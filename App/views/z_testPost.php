<?php

print_r($_POST);

//$obj=jsonString2Obj($_POST['json']);

//echo $obj->desc;

function jsonString2Obj($str){
	return json_decode(stripcslashes($str));
}
?>