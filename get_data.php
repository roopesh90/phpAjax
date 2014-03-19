<?php

if(isset($_POST['id']) && isset($_POST['company']))
{
	$number1= rand( 100 , 1000);
	$number2= rand( 20 , 200);
	
	echo "$number1,$number2";
}
else
	echo "False"
?>
