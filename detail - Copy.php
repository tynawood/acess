<?php

$con = mysqli_connect('localhost','root','','umb');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");



$chatid = 0;

	if(isset($_GET['id']) && !empty($_GET)){
		
		

		$sql="SELECT * FROM chat where id=".$_GET['id'];



$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
							$chatname = $row['chat_name'];
							/*$path = substr($row['image'],2);
							
							$tag = substr($row['tag'],2);
							$detail = substr($row['detail'],0,250);
							$location = $row['location'];
							$time =$row['time'];
							$date = date(" jS F, Y", strtotime($row['date']));*/
		}
		//$name= "natty";
		$data=array("chatperson"=>$chatname);
		//$data=array("name"=>"nat","age"=>22,"sex"=>"Male");
		echo json_encode($data,JSON_FORCE_OBJECT);	
		//echo "kjkhkjshfdslhlk";	
		}
		else
		{
			echo "Error Invalid Input";

		}


?>



