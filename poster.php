<?php

$con = mysqli_connect('localhost','root','','umb');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

?>

<?php


$chatid = 0;


if(isset($_GET['id']) && !empty($_GET)){


 $sql = "SELECT *
FROM chat_message  INNER JOIN  chat on chat_message.chatid=chat.id WHERE chatid = ".$_GET['id'];
      


$result = mysqli_query($con,$sql);



		//$data = array();
		$dataArray = array();
while($row = mysqli_fetch_array($result)) {

							$message = $row['message'];
				$chatname = $row['chat_person'];
				$chatone =$row['chat_name'];
				$msgtime =$row['message_time'];
							
							

							
						
					
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
		
	
		
		
	$data=array("chatone"=>$chatone,"message"=>$message,"chatname"=>$chatname,"time"=>$msgtime);
	array_push($dataArray,$data);
		/*$data['what']=$what;
		$data['date']=$date;
		$data['detail']=$detail;
		$data['img']=$path;*/
	}
		
		}
		echo json_encode($dataArray);
	
	
		//echo "kjkhkjshfdslhlk";	
		//}
		//else
		//{
			//echo "Error Invalid Input";

		//}


?>