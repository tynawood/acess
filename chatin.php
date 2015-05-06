<?php //login.php


$con = mysqli_connect('localhost','root','','haniel');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");





 if (isset($_POST['submit']))
        
       
       /* $nimage = $_FILES['news_image'] ;
        //print_r($nimage);
        $nheader = $_FILES['news_image']['news_header'] ;
        $nimage = addslashes(file_get_contents($_FILES['news_image']['tmp_name'])) ; 
     */
//$email    =$_POST['email'];
       
$chat_name    =$_POST['chat_name'];
$email    =$_POST['email'];	
$topic    = $_POST['topic'];

//$category      = $_POST['category'];





	

//$eheader        = $_POST['event_header'];
//$eimage        = $_POST['event_image'];
//$edate        = $_POST['event_date'];
//$esubmission       = $_POST['event_submission_date'];
//$nimage    = upload_img();
//$ncomplete   = upload_eventimg();

// Insert data into mysql
mysqli_autocommit($con, FALSE);
$sql="INSERT INTO chat (chat_name,email,topic)
VALUES ( '".mysqli_real_escape_string($chat_name)."','$email','".mysqli_real_escape_string($topic)."')";


if (mysqli_query($con, $sql ) === TRUE) {
  $groupid = mysqli_insert_id($con);
   $sql1 = "INSERT INTO groupchat (group_id,group_pin,group_name) VALUES ('".$groupid."','$grouppin','$groupname')";
   mysqli_query($con, $sql1 );
}
if (!mysqli_commit($con)) { //commit transaction
  $return_arr["status"]=1;		
		}else{
			$return_arr["status"]=0;	
		}  //end else
		echo json_encode($return_arr);








/*if($result){ 
			$return_arr["status"]=1;		
		}else{
			$return_arr["status"]=0;	
		}  //end else
		echo json_encode($return_arr); // return value 

	
*/

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