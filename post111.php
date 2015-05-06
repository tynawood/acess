<?php



$con = mysqli_connect('localhost','root','','umb');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

?>
<?php

	if(isset($_GET['id']) && !empty($_GET)){
		
		

		$sql="SELECT * FROM chat where id=".$_GET['id'];



$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
							
							//$path = substr($row['upload_file'],2);
					
							$chat_name = $row['chat_name'];
							
		}
		//$name= "natty";
		$data=array("chatname"=> $chat_name);
		//$data=array("name"=>"nat","age"=>22,"sex"=>"Male");
		echo json_encode($data,JSON_FORCE_OBJECT);	
		//echo "kjkhkjshfdslhlk";	
		}
		else
		{
			echo "Error Invalid Input";

		}


				?>      
		
			

							<!-- BEGIN .single-block -->
						

													
														<!--image and caption 2-->
                                                     

														



							
                                        
                                        	
											
										




										
										
											
			
            
          									 
     <?php
	 /*$sql = "SELECT *
FROM chat_message  INNER JOIN  chat on chat_message.chat_id=chat.id WHERE chat_id = ".$_GET['id'];
    
		$query = mysql_query( $sql );
 			$i=0;
			$dataArray = array();
				
	while( $row = mysql_fetch_assoc($query)) {
							//$chat_name = $row['chat_name'];
							$message = $row['message'];
							$message_time = $row['message_time'];
							
							//$time =$row['time'];
							//$time = date("   h:i A", strtotime($row['time']));
							
							//$date = date(" jS F, Y", strtotime($row['date']));
							//$date = date(" l jS \of F Y h:i:s A", strtotime($row['date']));

							//$date = date("  j/m/ Y   ", strtotime($row['submission_date']));
							//$date = date(" l jS  F Y   ", strtotime($row['date']));
							$id = $row ['chat_id'];
							
							
		$data=array("id"=>$id,"message"=>$message,"messagetime"=>$message_time);
		array_push($dataArray,$data);
		/*$data['what']=$what;
		$data['date']=$date;
		$data['detail']=$detail;
		$data['img']=$path;*/
	//}
		
		
	//	echo json_encode($dataArray);
	
                 
														
			//}
			?>
															
													 
										
                                            
                                            
                                          

									