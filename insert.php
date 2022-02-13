<?php 
//insert.php
$connect = mysqli_connect("localhost", "root", "", "testdb");

if(isset($_POST["cars"]))
{
 if(count($_POST["cars"])>1){
	$cars = implode(",",$_POST["cars"]);
 }else{
	 $cars = $_POST["cars"][0];
 }
 $query = "INSERT INTO cars(car_id) VALUES('".$cars."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
else{
	echo "Please Choose any cars";
}
?>