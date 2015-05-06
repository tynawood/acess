<?php //login.php


$db_hostname = 'localhost';
$db_database = 'umb';
$db_username = 'root';
$db_password = '';

// Connect to server.
$db_server = mysql_connect($db_hostname, $db_username, $db_password)
    or die("Unable to connect to MySQL: " . mysql_error());
	
// Select the database.

mysql_select_db($db_database)
    or die("Unable to select database: " . mysql_error());



$chatid = 0;
$url = "http".(!empty($_SERVER['HTTPS'])?"s":"").
"://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- BEGIN html -->
<html lang="en-US" prefix="og: http://www.ofmghana.com/ns#">

	<!-- BEGIN head -->
	<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    

    
       <?php
	 //$sql = "select * from users where featured='yes'";
	 if(isset($_GET['id'])){
     $sql = "select * from chat where id=".$_GET['id'];
	 
	 $chatid = $_GET['id'];
	 
	 
		$query = mysql_query( $sql );
 			$i=0;
			while( $row = mysql_fetch_assoc($query) ){
						//	$path = substr($row['news_image'],3);
							//$path1 = substr($row['image2'],3);
							//$path2 = substr($row['image3'],3);

				//$fn="img/".$row['news_header'].".jpg";
			//$shiva="<img src='".$fn."'/>";
				//echo $shiva."<br/>";
			//$f=fopen($fn,"wb");
			//fwrite($f,$row['news_image']);
			//fclose($f);
				
				
				
				?>      
		<title> <?php echo $row['chat_name'];?> | ofmghana.com</title>

		<!-- Meta Tags -->
		
				
                                        
                                  
                       
													

								<h1><?php echo $row['chat_name'];?></h1>
								<div class="author">
									
								

						<!-- BEGIN .main-page -->
					

												
												


      </div>  
      </div>   
														
														
                                        
                                        	
											
										
	   <?php
			}


			?>  														<div class="clear-float"></div>
														</div>
														<div>
			
<!--<button onclick="myFunction()"  >Print this page</button>-->											<a href="javascript:window.print()" class="small-button"><span class="icon-text">&#59158;</span>&nbsp;&nbsp;Print this article</a>
															
														</div>
											  </div>
											</div>

									  </div>

								  </div>




										
										<div class="block-content">

											<div class="comment-block">
												
											
			
            
          									  <ul>
     <?php
	 $sql = "SELECT *
FROM chat_message  INNER JOIN  chat on chat_message.chatid=chat.id WHERE chatid = ".$_GET['id'];
      
		$query = mysql_query( $sql );
 			$i=0;
			while( $row = mysql_fetch_assoc($query) ){
				
				
				?>
                 <li>
																<div class="commment-content">
																	<div class="user-avatar">
                                                                    <img src="images/photos/avatar-2.jpg" width="47" height="42"/>
																		
																	</div>
																	<strong class="user-nick"><a href="#"><?php echo $row['chatid'];?></a></strong>
																	<!--<span class="time-stamp"><?php // echo $row['email'];?></span>-->
																	<div class="comment-text">
																		<p><?php echo $row['message'];?></p>
                                                                        <p> </p>
                                                                        <br/>
                                                                      <span class="meta"><?php echo $row['message_time']; ?>
																	</div>
																	
																</div>
															</li>
                                                            <?php
			}
			?>
															
													  </ul>
												  </li>
													
												</ol>

											</div>

										</div>

										<div class="block-title">
											<a href="#writecomment" class="right">View all comments</a>
											<h2>Write a comment</h2>
										</div>
										<div class="block-content">
											<div id="writecomment">
                                            
                                            
                                            <?php  
if(isset($_GET['PostComment']) && isset($_GET['id']))	{							
$sql ="INSERT INTO `chat_message`( `chatid`, `chat_name`, `message`) VALUES (";
$sql.="'".$_GET['id']."','".$_GET['chat_name']."','".$_GET['message']."')";		

mysql_query($sql);	


header("location:".$_SERVER['PHP_SELF']."?id=".$_GET['id']);	
				
}
							
											
											?>

									 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

<input type="hidden"  name="id" id="id" value="<?php echo $chatid; ?>" />
													<div class="coloralert" style="background: #a12717;"><a href="#close-alert" class="icon-text">&#10006;</a>
													</div>
													<!-- <div class="coloralert" style="background: #68a117;">
														<p>Success!</p>
														<a href="#close-alert" class="icon-text">&#10006;</a>
													</div> -->

													<p class="contact-form-user">
													  <label for="c_name">Nickname<span class="required">*</span></label>
														<input type="text" class="error" placeholder="Nickname" name="chat_name" id="c_name" />
													</p>
                                                    <br/>
                                                    <br> <br/>
													
                                                     <br/>
                                                    <br> <br/>
													<p class="contact-form-message">
													  <label for="c_message">Comment<span class="required">*</span></label>
														<textarea name="message" placeholder="Your message.." id="c_message"></textarea>
													</p>
												<div class="detail">	<p><input type="submit" name="PostComment" class="styled-button" value="Post a Comment" style="background:#aa3d76;margin-top:120px;" /></p></div>
												</form>
												
											</div>
										</div>

									</div>

								<!-- END .content-block -->
								</div>

							<!-- END .single-block -->
							</div>

						<!-- END .main-page -->
						</div>
                         
						
						<!-- BEGIN .main-sidebar -->
						<div class="main-sidebar right">
							
							<!-- BEGIN .widget -->
							<div class="widget">
							 
								
							
								
								<?php  } ?>
							<!-- END .widget -->
							</div>
							
							<!-- BEGIN .widget -->
							
							
                                         
										<!--<li>
											<div class="article-photo">
												<a href="post.html" class="hover-effect"><img src="images/photos/image-2.jpg" alt="" /></a>
											</div>
											<div class="article-content">
												<h4><a href="post.html">Nec option veritus ullamcorper cu ea eam cibo quaestio te eros</a><a href="post.html#comments" class="h-comment">74</a></h4>
												<span class="meta">
													<a href="blog.html"><span class="icon-text">&#128340;</span>11:20, 7.Oct 2013</a>
												</span>
											</div>
										</li>
										<li>
											<div class="article-photo">
												<a href="post.html" class="hover-effect"><img src="images/photos/image-3.jpg" alt="" /></a>
											</div>
											<div class="article-content">
												<h4><a href="post.html">Ea mea fugit appareat quaestio delectus pericula id sea</a><a href="post.html#comments" class="h-comment">39</a></h4>
												<span class="meta">
													<a href="blog.html"><span class="icon-text">&#128340;</span>11:20, 7.Oct 2013</a>
												</span>
											</div>
										</li>
										<li>
											<div class="article-photo">
												<a href="post.html" class="hover-effect"><img src="images/photos/image-4.jpg" alt="" /></a>
											</div>
											<div class="article-content">
												<h4><a href="post.html">Ex cibo ullum nostrum per quo cu utamur fabulas</a><a href="post.html#comments" class="h-comment">99</a></h4>
												<span class="meta">
													<a href="blog.html"><span class="icon-text">&#128340;</span>11:20, 7.Oct 2013</a>
												</span>
											</div>
										</li>
										<li>
											<div class="article-photo">
												<a href="post.html" class="hover-effect"><img src="images/photos/image-5.jpg" alt="" /></a>
											</div>
											<div class="article-content">
												<h4><a href="post.html">Debitis minimum vituperata mei no adipiscing intellegam</a><a href="post.html#comments" class="h-comment">201</a></h4>
												<span class="meta">
													<a href="blog.html"><span class="icon-text">&#128340;</span>11:20, 7.Oct 2013</a>
												</span>
											</div>
									
							
		<!-- Scripts -->
		<script type="text/javascript" src="jscript/jquery-latest.min.js"></script>
		<script type="text/javascript" src="jscript/theme-scripts.js"></script>
		<script type="text/javascript" src="jscript/lightbox.js"></script>
		<!--<script type="text/javascript" src="jscript/demo-settings.js"></script>

	<!-- END body -->
    	 
	</body>
<!-- END html -->
</html>