<?php

//functions.php
require_once("../configglobal.php");
	$database = "if15_jaagsii";
	
	//loome uue funktsiooni, et küsida andmebaasist andmeid
	function getCarData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt=$mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
		$stmt->bind_result($id, $user_id, $number_plate, $color);
		$stmt->execute();
		
		//tühi massiiv kus hoiame objekte
		$array=array();
		//tee tsüklit nii mitu korda kui saad andmebaasist ühe rea andmeid
		while($stmt->fetch()){
			
			//loon objekti
			$car=new StdClass();
			$car->id=$id;
			$car->number_plate=$number_plate;
			
			//lisame selle massiivi
			array_push($array, $car);
			echo"<pre>";
			var_dump($array);
			echo"</pre>";
			
		}
		
		$stmt->close();
		$mysqli->close();
		
	}

getCarData();
	
?>