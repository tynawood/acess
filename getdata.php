<?php

$con = mysqli_connect('localhost','root','','hapnn');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

?>

<?php




 $sql ="SELECT * FROM newsfeed ORDER BY `newsfeed`.`id` DESC
LIMIT 0 ,50" ;

//$sql = "SELECT *
//FROM share_hapnn  INNER JOIN  share_pin on share_hapnn.id=share_pin.pin_id WHERE newsid = ".$_GET['id'];

$result = mysqli_query($con,$sql);



		//$data = array();
		$dataArray = array();
while($row = mysqli_fetch_array($result)) {
							$newsheader = $row['news_header'];
							$path = substr($row['image'],2);
							
							
							$detail = substr($row['detail'],0,250);
							$writer = $row['writer'];
							//$time =$row['time'];
							//$time = date("   h:i A", strtotime($row['time']));
							
							//$date = date(" jS F, Y", strtotime($row['date']));
							//$date = date(" l jS \of F Y h:i:s A", strtotime($row['date']));

							$date = date("  j/m/ Y   ", strtotime($row['submission_date']));
							//$date = date(" l jS  F Y   ", strtotime($row['date']));
							$id = $row ['id'];
							
							//$screenname = $row['screen_name'];
							

							
						
					
							/*
							$data = array(
    array(
       "what"=>$what,"date"=>$date,"detail"=>$detail,"img"=> $path
       
    )
);


echo json_encode($data,JSON_FORCE_OBJECT);
			
}
	*/	
	//$data=array(
	//"what"=>$what

	//);
	 
	//echo json_encode($data,JSON_FORCE_OBJECT);	



	//if(isset($_GET['GetInfo']) && !empty($_GET)){
		
	
		
		$data=array("id"=>$id,"newsheader"=>$newsheader,"date"=>$date,"detail"=>$detail,"img"=> $path,"writer"=> $writer);
		array_push($dataArray,$data);
		/*$data['what']=$what;
		$data['date']=$date;
		$data['detail']=$detail;
		$data['img']=$path;*/
	}
		
		
		echo json_encode($dataArray);
	
	
		//echo "kjkhkjshfdslhlk";	
		//}
		//else
		//{
			//echo "Error Invalid Input";

		//}


?>