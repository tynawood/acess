<?php //login.php

$con = mysql_connect('localhost','root','','haniel');
if (!$con) {
  die('Could not connect: ' . mysql_error($con));
}

mysql_select_db($con,"ajax_demo");
/*$db_hostname = 'localhost';
$db_database = 'umb';
$db_username = 'root';
$db_password = '';

// Connect to server.
$db_server = mysql_connect($db_hostname, $db_username, $db_password)
    or die("Unable to connect to MySQL: " . mysql_error());
	
// Select the database.

mysql_select_db($db_database)
    or die("Unable to select database: " . mysql_error());



*/




/*function upload_eventimg(){
	$path="pdf/1.pdf";
	if(isset($_FILES['newspaper_complete']) && !empty($_FILES['newspaper_complete']['tmp_name'])){
		$path="../pdf/".time()."_".$_FILES['newspaper_complete']['name'];
		if(move_uploaded_file($_FILES['newspaper_complete']['tmp_name'],$path)){
			
		}
	}
	return $path;
}
*/
   
       

// Get values from form
    if (isset($_POST['submit']))
        

   
       /* $nimage = $_FILES['news_image'] ;
        //print_r($nimage);
        $nheader = $_FILES['news_image']['news_header'] ;
        $nimage = addslashes(file_get_contents($_FILES['news_image']['tmp_name'])) ; 
     */
        $what_hapnn1111       = $_POST['what_hapnn1111'];

$chat_name      = $_POST['chat_name'];
$email      = $_POST['email'];
$topic      = $_POST['topic'];

//$category      = $_POST['category'];


//$sharepin =$_POST['share_pin'];





		
/*$query =  "SELECT * FROM request_pin where request_pin= '".$_POST['request_pin']."'"; 
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)){
$request_pin = $row['request_pin'];
*/


$sql="INSERT INTO chat (chat_name,email,topic)
VALUES ('".mysql_real_escape_string($chat_name)."','$email','".mysql_real_escape_string($topic)."')";

$result = mysql_query($sql); 









if($result){ 
			$return_arr["status"]=1;		
		}else{
			$return_arr["status"]=0;	
		}  //end else
		echo json_encode($return_arr); // return value 

	


exit();

//$eheader        = $_POST['event_header'];
//$eimage        = $_POST['event_image'];
//$edate        = $_POST['event_date'];
//$esubmission       = $_POST['event_submission_date'];
//$nimage    = upload_img();
//$ncomplete   = upload_eventimg();

// Insert data into mysql
/*$sql="INSERT INTO share_hapnn (what_hapnn, location, date,time,detail,tag,image,share_pin)
VALUES ( '".mysql_real_escape_string($what_hapnn)."', '".mysql_real_escape_string($location)."', '$date','$time', '".mysql_real_escape_string($detail)."', '".mysql_real_escape_string($tag)."',$simage','$vanny')";

$result1 = mysql_query($sql); 
	
// if successfully insert data into database, displays message "Successful".
// if($result1){
// header('Location: index.html');
// }
// else {
// echo "ERROR";
// //}
// 	}

	//$return_arr["status"]=5;
	if($result1){ 
			$return_arr["status"]=1;		
		}else{
			$return_arr["status"]=0;	
		}  //end else
		echo json_encode($return_arr); // return value 

	}
		exit();
	*/
// close mysql
mysql_close();
?> 