<?php //login.php


//$db_hostname = 'localhost';
//$db_database = 'umb';
//$db_username = 'root';
//$db_password = '';

// Connect to server.
//$db_server = mysql_connect($db_hostname, $db_username, $db_password)
//    or die("Unable to connect to MySQL: " . mysql_error());
	
// Select the database.

//    or die("Unable to select database: " . mysql_error());



//$chatid = 0;
//$url = "http".(!empty($_SERVER['HTTPS'])?"s":"").
//"://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
//?>



    
  
		

		<!-- Meta Tags -->
		
				
                                        
                                  
                       
													

							

						<!-- BEGIN .main-page -->
					

												
												


    
														
														
                                        
                                        	
											
	




										

							
								
						
				
					
						







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





	 $sql = "SELECT *
FROM chat_message  INNER JOIN  chat on chat_message.chatid=chat.id WHERE chatid = ".$_GET['id'];
      
		$result = mysqli_query($con,$sql);

$dataArray = array();
while($row = mysqli_fetch_array($result)) {
 			$i=0;

 				
			//while( $row = mysql_fetch_assoc($query) ){
				
				$message = $row['message'];
				$chatname = $row['chat_person'];
				$msgtime =$row['message_time'];
			
$data=array("message"=>$message,"chatname"=>$chatname,"time"=>$msgtime);
		array_push($dataArray,$data);
		/*$data['what']=$what;
		$data['date']=$date;
		$data['detail']=$detail;
		$data['img']=$path;*/
	}
		
		
		echo json_encode($dataArray);
		//echo "kjkhkjshfdslhlk";	
?>



