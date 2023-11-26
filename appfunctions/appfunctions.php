<?php 

/*
================================================================
START SESSION
================================================================
*/

if(!isset($_SESSION))
{
	session_start();
}


//===============================================================
//Load Classes
//===============================================================

spl_autoload_register(function($class) {
    include 'classes/' . $class . '.php';
});


//===============================================================
//		PHPMailer starts here
//================================================================

// include('netspring_mailer/PHPMailerAutoload.php');
include('cns_mailer/class.phpmailer.php');
include('cns_mailer/class.pop3.php');
include('cns_mailer/class.smtp.php');

/*
=====================================================================
SET DEFAULT TIMEZONE OFFSET
=====================================================================
*/

// $timezone_offset = +6;
// $add_timezone_diff = time() + ($timezone_offset * 3600);

date_default_timezone_set("Africa/Lagos");

/*
=====================================================================
INSTANTIATE CONNECTION VARIABLE
=====================================================================
*/

$kc = new DB; 
$connect = $kc->getConn();
$crud = new Crud($connect);

/*
=====================================================================
GENERAL SETTINGS
=====================================================================
*/
$gs = FetchTableContent("17"); 
$site_name = $gs[0]["SiteName"];
$motto = $gs[0]["HomepageTitle"];
$off_email = $gs[0]["OfficialEmail"];
$off_web = $gs[0]["OfficialWebsite"];
$fav = $gs[0]["Favicon"];
$logo = $gs[0]["Logo"];
$home_title = $gs[0]["HomepageTitle"];
$url = $gs[0]["HomepageURL"];
// $phone_home = $gs[0]["Phone"];
// $addr_home = $gs[0]["Addr"];

/*
=====================================================================
INSERTIONS
=====================================================================
*/

/*
Insertion List

1. Signup new user
2. Login User
3. Resend activation to user
4. Resend Password
.....
*/ 


if(isset($_POST["INSERT"]) && $_POST["INSERT"] !="" )
{
		$crud = new Crud($connect);
		$user_cl = new User($connect);
		$Timenow = date("Y-m-d H:i:s");

		switch ($_POST["INSERT"]) {

			//signup new user
			case 1:

				$fname = $_POST["Fname"];
				$uname = $_POST["Uname"];
				$email  = $_POST["Email"];
				$pword1 = $_POST["Pword1"];
				$pword2 = $_POST["Pword2"];
				$salt = $user_cl->saltKeys(1);
				$alpha = $pword1.$salt;
				$pword = md5(sha1($alpha));
				$ipaddress = $_SERVER["REMOTE_ADDR"];
				$checkreg1 = $crud->select("users", "*", "Uname = '$uname' OR Email = '$email' ");

				if($checkreg1 == TRUE)
				{
					$response = "<div class='alert alert-danger alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! The Username or Email you entered already exists. Please use another.
									</p>
								</div>";
				}
				else
				{//general else
					if( $pword1 != $pword2 ){

							$response = "<div class='alert alert-danger alert-dismissable'>
											<button class='close' data-dismiss='alert'>&times;</button>
											<p align='center' style='color: #ff0000 !important;' >
												Sorry! Passwords don't match. Please try again.
											</p>
										</div>";
					}
					else{
						// Validate reCAPTCHA box 
						if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
						{ 
							// Google reCAPTCHA API secret key 
							$secretKey = $user_cl->googleKeys(1); 

							// Verify the reCAPTCHA response 
							$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
							 
							// Decode json data 
							$responseData = json_decode($verifyResponse); 
							 
							// If reCAPTCHA response is valid 
							if($responseData->success){ 

								//Put values into an Array
								$cal = $crud->insertWithReturnValue("users", 
								array('Fname'=> $fname,
									'Uname' => $uname, 
									'Email'=>$email,
									'Pword'=>$pword,
									'AllowUser'=>$user_cl->saltKeys(2),
									'IPAddr'=> $ipaddress
								) );

								if(!$cal)
								{
									$response = "<div class='alert alert-danger alert-dismissable'>
													<button class='close' data-dismiss='alert'>&times;</button>
													<p align='center' style='color: #ff0000 !important;'>
														It looks like something went wrong while submitting your form.<br>
														click<a href='javascript:window.location.reload();' class='btn btn-sm btn-warning'> Here </a> to re-try.
													</p>
												</div>";
								}
								else
								{
									//Add Details to members table
									$crud->insert("members", 
									array( 'UID'=>$cal,
											'Fname' => $fname,
											'Uname' => $uname,
											'Email' => $email,
											'IPAddr'=> $ipaddress,
											'Pword'=>$pword
									));
									
									//Add Details to profile table
									$crud->insert("profile", 
									array( 'UID'=>$cal,
											'Email' => $email
									));

									$response = "<div class='alert alert-success alert-dismissable'>
													<button class='close' data-dismiss='alert'>&times;</button>
													<p align='center' style='color: #1a4b04 !important;' >
														Congratulations! Registration was successful. Click <a href='signin'>here</a> to sign in
													</p>
												</div>";
								}
							}else{ 
								$response = "<div class='alert alert-danger alert-dismissable'>
												<button class='close' data-dismiss='alert'>&times;</button>
												<p align='center' style='color: #ff0000 !important;'>
													Robot verification failed, please try again.
												</p>
											</div>";
							} 
						}else{ 
							$response = "<div class='alert alert-danger alert-dismissable'>
											<button class='close' data-dismiss='alert'>&times;</button>
											<p align='center' style='color: #ff0000 !important;'>
												Please confirm you are human by checking \"I'm not a robox\" box.
											</p>
										</div>";
						} 
					}//else before recaptcha		
				}

			break;


			//login user
			case 2:

				$crud = new Crud($connect);
				$uname_email = $_POST["UnameOrEmail"];
				$pword = $_POST["Password"];
				$salt = $user_cl->saltKeys(1);
				$alpha = $pword.$salt;
				$pword = md5(sha1($alpha));
				
				$checkuser = $crud->select("users", "*", "(Email = '$uname_email' || Uname = '$uname_email') && Pword='$pword'");
				if(!$checkuser)
				{
					$response = "<div class='alert alert-danger alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										Invalid username or email and password combination, please click the FORGOT PASSWORD button below if you have forgotten your password.
									</p>
								</div>";
				}
				else
				{
					$_SESSION["duid"] = $checkuser[0]["ID"];
					$_SESSION["email"] = $checkuser[0]["Email"];
					$_SESSION["fname"] = $checkuser[0]["Fname"];
					$_SESSION["sname"] = $checkuser[0]["Sname"];
					$_SESSION["accesslevel"] = $checkuser[0]["AccessLevel"];
					$_SESSION["activestatus"] = $checkuser[0]["ActiveStatus"];
					$_SESSION["photo"] = $checkuser[0]["Photo"];					

					if($checkuser[0]["ActiveStatus"]=="3")
					{
						$response = "<div class='alert alert-danger alert-dismissable'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p align='center' style='color: #ff0000 !important;' >
											Sorry. You cannot log in because your account has been suspended. Please contact the administrator by sending an email to '".$off_email."'
										</p>
									</div>";
					}
					else
					{
						if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1")
						{
							header("Location: admin/pages/dashboard?dil=home");
						}
						elseif(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "3")
						{
							header("Location: members/pages/dashboard?dil=home");
						}
						else
						{
							header("Location: confirm-account");
						}
					}
				}
				
				break;



			//forgot password
			case 3:
				$crud = new User($connect);

				if(!$crud->ForgotPassword($_POST["Email"]))
				{
					$response = '<div class="alert alert-dismissable alert-danger">
									<h3><span style="color:#a94442;">Sorry...</span> </h3>
									It seems your email is not listed in our database or something went wrong during the process of recovering your account. Please try another email address. If this persists, please <a href="contactus.php"> contact</a> an admin. 
								</div>';
				}
				else
				{
					 $recover = $crud->ForgotPassword($_POST["Email"]);
					 $to = $user_cl->ValidateData( $_POST["Email"] );
                     $subject = "Recover My DILYASTREND Account";
					 $url = urlencode("www.dilyastrend.com/forgot-password?userconfirm=".$recover."&email=".$to);
					 $randomz = sha1(md5("forgotpasswordforDILYASTREND"));
					 
					 $message = "
							 <div align='center' style='margin-bottom: 7px;'>
								<img src='www.dilyastrend.com/assets/images/dilyastrend-logo1.jpg' height='200' alt='DILYASTREND' />
							 </div>

                     		Hello there, <br/>
					        You are having problems signing into your dilyastrend.com account. 
					        In order to recover your account, please click on the link 
					        below where you will be redirected to our website and have your account active again. <br><br>
							<strong>Recovery Link:</strong><br>
							
						   <a href='www.dilyastrend.com/change-password?userconfirm=".$recover."&email=".$_POST["Email"]." '>
						   			www.dilyastrend.com/change-password?userconfirm=".$recover."&email=".$_POST["Email"].$randomz."
					       </a><br><br>

					        If you did not signup on our website or initiate this action, please ignore this email and the 
							details will be removed from our server within 48 hours.<br><br>
							
							Thank you!  
							<br><br>
							<b>DILYASTREND - Connecting You</b><br>
							www.dilyastrend.com<br/><br/>

							<hr/>

							<small>
							<p>
								The information contained in this message is intended solely for the individual to whom his email is found above. This message and its contents may contain confidential or privileged information from DILYASTREND. If you are not the intended recipient, you are hereby notified that any disclosure or distribution, is strictly prohibited. If you receive this email in error, please notify DILYASTREND immediately and delete it. DILYASTREND does not accept any liability or responsibility if action is taken in reliance on the contents of this information. Note that all personal emails are not authorized by DILYASTREND.
							</p>
							<a href='www.dilyastrend.com/terms-and-condition'>Terms and conditions</a> &nbsp;&nbsp;
							<a href='www.dilyastrend.com/privacy'>Privacy</a>
							</small>
							";

					SendMail($to, $subject, $message);

					$response = '
						<div align="center" class="alert alert-dismissable alert-success">
								<button class="close" data-dismiss="alert">&times;</button>
							<h3><span style="color:#629031;">Done! </span> </h3>
							Account recovery link has been sent to your email '.$_POST["Email"].'.<br/> Please check your mail and click on the <u>Recovery Link</u> link to recover your account. If mail not in your inbox, please check your spam mail.
							
						</div>';
					
				}
				
				break;
				
		
		//POST BLOG
		case 7:

		//BLOG Posting
		$cc = new Crud($connect);
				
		$photo_size = $_FILES["Photo"]["size"];
		$photo_name = $_FILES["Photo"]["name"];
		$ipaddress = $_SERVER["REMOTE_ADDR"];
		$fname = $cc->AnyContent("Fname", "users", "ID", $_SESSION["duid"] );
		$category = $_POST["Category"];
		$title = $_POST["Title"];
		$title = str_replace(array('"', "'", '(', ')', "\n", "\r", "\t", "[", "]"), ' ', $title);
		$ogtitle = md5(uniqid(time(),true));
		$mes = $_POST["Message"];
		$message = substr($mes, 0, 15000);
		$uid = $_POST["UID"];
		$accesslevel = $cc->AnyContent("AccessLevel", "users", "ID", $_SESSION["duid"] );

		$checkblog = $crud->select("blog", "*", "Title='".$title."' ");

		if($checkblog == TRUE)
		{
				$response = "<div class='alert alert-warning alert-dismissable'>
								<button class='close' data-dismiss='alert'>&times;</button>
								<p align='center' style='color: #ff0000 !important;' >
									Sorry! A blog post having this title already exists. Please change the title or search for the already posted blog and comment.
								</p>
							</div>";
		}
		else
		{
			if( (empty($title) == TRUE) || (empty($message) == TRUE) || (empty($category) == true) )
			{
				$response = "<div class='alert alert-warning alert-dismissable'>
								<button class='close' data-dismiss='alert'>&times;</button>
								<p align='center' style='color: #ff0000 !important;' >
									Boxes with asterisk cannot be empty.
								</p>
							</div>";
			}
			else
			{	//maximum upload is 5mb = 5*1024*1024
				if( ($photo_size > (5*1024*1024) ) )
				{	
					$response = "<div align='center' class='alert alert-dismissable alert-warning'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										The File you are trying to upload is too large. maximum size allowed is 5mb!
									</p>
								</div>";
				}
				else
				{	//If photo var is NOT empty
					if(!empty($photo_name))
					{
						$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
						
						if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
						{
							//If wrong format of picture or video is selected
							$response = "<div align='center' class='alert alert-warning alert-dismissable'>
											<button class='close' data-dismiss='alert'>&times;</button>
											<p align='center' style='color: #ff0000 !important;' >
												Sorry! File format not supported. Please choose a Photo (PNG, JPEG and GIF format)!</p>
											</p>
										</div>";
							
						}
						else
						{	
							$temp = explode(".",  $photo_name);
							$photo = md5(uniqid(time(),true)) . '.' . end($temp);
							move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/blog/".$photo);
							$_SESSION["Photo"] = $photo;

							//Add Details to blog table
							$crud->insert("blog", 
							array( 'UID'=>$uid,
									'Fname' => $fname,
									'Category'=>$category,
									'Photo'=>$photo,
									'Title'=>$title,
									'OgTitle'=>$ogtitle,
									'Message'=>$message,
									'AccessLevel'=> $accesslevel,
									'IPAddr'=> $ipaddress
							) );

							$response = "<div align='center' class='alert alert-dismissable alert-success'>
											<button class='close' data-dismiss='alert'>&times;</button>
											<span> <b>Done!</b> Blog post successful.</span>
										</div>";

							// $response = "<div class='alert alert-success'>
							// 				<button type='button' aria-hidden='true' class='close' data-dismiss='alert'>
							// 					<i class='nc-icon nc-simple-remove'></i>
							// 				</button>
							// 				<span><b> Done! </b> Blog post successful.</span>
							// 			</div>";
						
						}
							
					}
					else
					{	//if photo var is empty
						$photo = "";
						//Add Details to blog table
						$crud->insert("blog", 
						array( 'UID'=>$uid,
								'Fname' => $fname,
								'Category'=>$category,
								'Photo'=>$photo,
								'Title'=>$title,
								'OgTitle'=>$ogtitle,
								'Message'=>$message,
								'AccessLevel'=> $accesslevel,
								'IPAddr'=> $ipaddress
						) );

						$response = "<div align='center' class='alert alert-dismissable alert-success'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<span> <b>Done!</b> Blog post successful.</span>
									</div>";

					}
					
				}

			}
		}	
		
		break;




		//INSERT FOR GALLERY
		case 8:

		$cc = new Crud($connect);
		
		$ipaddress = $_SERVER["REMOTE_ADDR"];
		$acc_lev = $_SESSION["accesslevel"];
		$album = $_POST["Album"];
		$filename = $_FILES["files"]["name"];
		
		///======================================================================================================	
		if (!empty($album)) {
			$j = 0;     // Variable for indexing uploaded image.
			$target_path = "../../files/gallery/img/";     // Declaring Path for uploaded images.
			$validextensions = array('jpg','png','jpeg', 'JPG', 'PNG', 'JPEG');      // Extensions which are allowed.

			for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
				// Loop to get individual element from the array

				$fileName = basename($_FILES['files']['name'][$i]); 
				$targetFilePath = $target_path . $fileName;

				//Check whether file type is valid
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

				//$fileName = md5(uniqid(time(),true)) . "." . $ext[$i];
				//$target_path = $target_path . $fileName; // Set the target path with a new name of image.

				$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
				if (($_FILES["files"]["size"][$i] < 10 * 1024 * 1024)     // Approx. 10mb files can be uploaded.
				&& in_array($fileType, $validextensions)) {
					if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFilePath)) {
						// If file moved to uploads folder. 
					
						// Image db insert sql
						$insertValuesSQL = "";
						$insertValuesSQL .= $fileName;
					
						// Insert image file name into database
						$insert = $crud->insert("gallery", 
										array( 'Photo'=>$insertValuesSQL,
												'Album'=>$album,
												'CreatedBy'=>$_SESSION["duid"],
												'IPAddr'=>$ipaddress,
												'AccessLevel'=>$acc_lev
										) );

						$statusMsg = "<div class='alert alert-success alert-dismissable'>
										<p align='center' >
											Photo uploaded successfully!.
										</p>
									</div>";

					} else {     //  If File Was Not Moved.
						
						$statusMsg = "<div class='alert alert-warning alert-dismissable'>
										<p align='center' style='color: #ff0000 !important;' >
											Sorry! There was an error uploading your photo(s).
										</p>
									</div>";

					}
				} else {     //   If File Size And File Type Was Incorrect.
					
						$statusMsg = "<div class='alert alert-warning alert-dismissable'>
										<p align='center' style='color: #ff0000 !important;' >
											Invalid format or Photo size too big. <br/>
											Format allowed are JPG, JPEG and PNG less than 10mb.
										</p>
									</div>";

				}
			}
		}else{//   If Album is not chosen.
					
			$statusMsg = "<div class='alert alert-warning alert-dismissable'>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! Please select an album.
							</p>
						</div>";
			
		}
		break;



		//CONTACT US
		case 9:

		$fullname = $_POST["Fullname"];
		// $lname = $_POST["Lname"];
		$email  = $_POST["Email"];
		$msg = $_POST["Message"];
		$phone = $_POST["Phone"];
		$ticket = md5($fullname);
		$ipaddress = $_SERVER["REMOTE_ADDR"];

		if( $fullname == "" || $email == "" || $msg == "")
		{
			$response = "<div class='alert alert-success alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! Spaces for Firstname, Email and Message must be filled.
							</p>
						</div>";
		}
		else
		{
			// Validate reCAPTCHA box 
			if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
				
				// Google reCAPTCHA API secret key 
				$secretKey = $user_cl->googleKeys(1); 
					
				// Verify the reCAPTCHA response 
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
					
				// Decode json data 
				$responseData = json_decode($verifyResponse); 
					
				// If reCAPTCHA response is valid 
				if($responseData->success){ 

					//Add Details to guest table
					$crud->insert("guest", 
					array( 
							'Fname' => $fullname,
							'Email' => $email,
							'IPAddr'=> $ipaddress,
							'Message'=> $msg,
							'Phone'=> $phone,
							'Ticket'=> $ticket
					) );

					$response = "<div class='alert alert-success alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #1a4b04 !important;' >
										Done! Message sent. An Admin will contact you within 48 hours. Thank you for your time.
									</p>
									
									<script>
										alert('Message sent. An Admin will contact you within 48 hours. Thank you for your time.');
									</script>
								</div>";

				}else{ 
					$response = "<div class='alert alert-danger alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;'>
										Robot verification failed, please try again.
									</p>
									
									<script>
										alert('Robot verification failed, please try again.');
									</script>
								</div>";
				} 
			}else{ 
				$response = "<div class='alert alert-danger alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;'>
										Please check the \"I'm not a robot\" box.
									</p>
									
									<script>
										alert('Please check the \"I'm not a robot\" box.');
									</script>
								</div>";
			} 
		}
		
		break;		



		//INSERT FOR BLOG MESSAGE PICTURE 
		case 10:

			$cc = new Crud($connect);
			
			$ipaddress = $_SERVER["REMOTE_ADDR"];
			$acc_lev = $_SESSION["accesslevel"];
			$album = $_POST["Album"];
			$filename = $_FILES["files"]["name"];

			//$checkpic = $cc->AnyContent("Photo", "message_picture", "Photo", $filename);
			// $checkpic = $crud->select("message_picture", "*", "Photo = '".$filename."' ");

			// if($checkpic == TRUE)
			// {
			// 		$response = "<div class='alert alert-warning alert-dismissable'>
			// 						<button class='close' data-dismiss='alert'>&times;</button>
			// 						<p align='center' style='color: #ff0000 !important;' >
			// 							Sorry! A picture with this name already exists. Please change the picture name or check whether you have uploaded that particular picture before.
			// 						</p>
			// 					</div>";
			// }
			// else
			// {
				if (!empty($album)) {
					$j = 0;     // Variable for indexing uploaded image.
					$target_path = "../../files/images/blog/";     // Declaring Path for uploaded images.
					$validextensions = array('jpg','png','jpeg', 'JPG', 'PNG', 'JPEG');      // Extensions which are allowed.
		
					for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
						// Loop to get individual element from the array
		
						$fileName = basename($_FILES['files']['name'][$i]); 
						$targetFilePath = $target_path . $fileName;
		
						//Check whether file type is valid
						$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
						//$fileName = md5(uniqid(time(),true)) . "." . $ext[$i];
						//$target_path = $target_path . $fileName; // Set the target path with a new name of image.
		
						$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
						if (($_FILES["files"]["size"][$i] < 5 * 1024 * 1024)     // Approx. 5mb files can be uploaded.
						&& in_array($fileType, $validextensions)) {
							if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFilePath)) {
								// If file has been moved to upload folder. 
							
								// Image db insert sql
								$insertValuesSQL = "";
								$insertValuesSQL .= $fileName;
							
								// Insert image file name into database
								$insert = $crud->insert("message_picture", 
												array( 'Photo'=>$insertValuesSQL,
														'Album'=>$album,
														'CreatedBy'=>$_SESSION["duid"],
														'IPAddr'=>$ipaddress,
														'AccessLevel'=>$acc_lev
												) );
		
								$statusMsg = "<div class='alert alert-success alert-dismissable'>
												<p align='center' >
													Photo uploaded successfully!.
												</p>
											</div>";
		
							} else {     //  If File Was Not Moved.
								
								$statusMsg = "<div class='alert alert-warning alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;' >
													Sorry! There was an error uploading your photo(s).
												</p>
											</div>";
		
							}
						} else {     //   If File Size And File Type Was Incorrect.
							
								$statusMsg = "<div class='alert alert-warning alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;' >
													Invalid format or Photo size too big. <br/>
													Format allowed are JPG, JPEG and PNG less than 5mb.
												</p>
											</div>";
		
						}
					}
				}else{//   If Album is not chosen.
							
					$statusMsg = "<div class='alert alert-warning alert-dismissable'>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! Please select a story album.
									</p>
								</div>";
				}
			//}
				
		break;
	
	


		//Blog-comment
		case 11:

		$cby = $_POST["CreatedBy"];
		$bid = $_POST["BlogID"];
		$uid  = $_POST["UID"];
		$msg = $_POST["Message"];
		$acclev = $_POST["AccessLevel"];
		$ipaddress = $_SERVER["REMOTE_ADDR"];

		if($msg == "")
		{
			$response = "<div class='alert alert-success alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! Space for comment can't be empty.
							</p>
						</div>";
		}
		else
		{
			//Add Details to blog table
			$crud->insert("blog_com", 
			array( 
					'CreatedBy' => $cby,
					'BlogID' => $bid,
					'UID' => $uid,
					'AccessLevel'=> $acclev,
					'IPAddr'=> $ipaddress,
					'Message'=> $msg
			) );

					
		}

		break;

		

		//INSERT FOR PRODUCTS 
		case 12:

			$cc = new Crud($connect);
			
			$ipaddress = $_SERVER["REMOTE_ADDR"];
			$acc_lev = $_SESSION["accesslevel"];
			$pro_title = $_POST["ProductTitle"];
			$des = $_POST["Description"];
			$price = $_POST["Price"];
			$rrp = $_POST["RRP"];
			$uid = $_POST["UID"];
			//$batch = md5(uniqid(time(),true));
			//$batch = rand(000, 999);
			$batch = time(); 
			$filename = $_FILES["files"]["name"];

			//==========================================================================================================
				if (!empty($pro_title)) {
					$j = 0;     // Variable for indexing uploaded image.
					$target_path = "../../files/products/images/";     // Declaring Path for uploaded images.
					$validextensions = array('jpg','png','jpeg', 'JPG', 'PNG', 'JPEG');      // Extensions which are allowed.
		
					for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
						// Loop to get individual element from the array
		
						$fileName = basename($_FILES['files']['name'][$i]); 
						$targetFilePath = $target_path . $fileName;
		
						//Check whether file type is valid
						$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
						//$fileName = md5(uniqid(time(),true)) . "." . $ext[$i];
						//$target_path = $target_path . $fileName; // Set the target path with a new name of image.
		
						$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
						if (($_FILES["files"]["size"][$i] < (5 * 1024 * 1024))     // Approx. 5mb files can be uploaded.
						&& in_array($fileType, $validextensions)) {
							if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFilePath)) {
								// If file has been moved to upload folder. 
							
								// Image db insert sql
								$insertValuesSQL = "";
								$insertValuesSQL .= $fileName;
							
								// Insert image file name into database
								$insert = $crud->insert("product", 
												array( 'Product'=>$insertValuesSQL,
														'ProductTitle'=>$pro_title,
														'Description'=>$des,
														'Price'=>$price,
														'RRP'=>$rrp,
														'Batch'=>$batch,
														'CreatedBy'=>$uid,
														'IPAddr'=>$ipaddress,
														'AddedOn'=>$Timenow,
														'AccessLevel'=>$acc_lev
												) );
		
								$statusMsg = "<div class='alert alert-success alert-dismissable'>
												<p align='center' >
													Product uploaded successfully!.
												</p>
											</div>";
		
							} else {     //  If File Was Not Moved.
								
								$statusMsg = "<div class='alert alert-warning alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;' >
													Sorry! There was an error uploading your product.
												</p>
											</div>";
							}
						} else {     //   If File Size too bif or File Type not supported.
							
								$statusMsg = "<div class='alert alert-warning alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;' >
													Invalid format or Photo size too big. <br/>
													Format allowed are JPG, JPEG and PNG less than 5mb.
												</p>
											</div>";
						}
					}
				}else{//   If Album is not chosen.
					$statusMsg = "<div class='alert alert-warning alert-dismissable'>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! Please select a product title.
									</p>
								</div>";
				}
				
		break;
	
	


	//INSERT EVENT
	case 15:

		$cc = new Crud($connect);

		$photo_size = $_FILES["Photo"]["size"];
		$photo_name = $_FILES["Photo"]["name"];
		$ogevent = md5(uniqid(time(),true));
		$note = $_POST["Note"];
		$by = $cc->AnyContent("Fname", "users", "ID", $_SESSION["duid"])
				." ".$crud->AnyContent("Sname", "users", "ID", $_SESSION["duid"]);
		$uid = $_SESSION["duid"];
		$theme = $_POST["Theme"];
		$venue  = $_POST["Venue"];
		$performer = $_POST["Performer"];
		$sponsor = $_POST["Sponsor"];
		$datez = $_POST["Datez"];
		$timez = $_POST["Timez"];
		$acclev = $_SESSION["accesslevel"];
		$ipaddress = $_SERVER["REMOTE_ADDR"];

		if(empty($theme) == TRUE || empty($performer) == TRUE || empty($venue) == TRUE)
		{
			$response = "<div class='alert alert-warning alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! Boxes with required can't be empty.
							</p>
						</div>";
		}
		else
		{	
			//If photo var is NOT empty
			if(!empty($photo_name))
			{	
				//maximum upload is 5mb = 5*1024*1024
				if( ($photo_size > (5*1024*1024) ) )
				{	
					$response = "<div align='center' class='alert alert-dismissable alert-warning'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										The File you are trying to upload is too large. maximum size allowed is 5mb!
									</p>
								</div>";
				}
				else
				{	
					$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
					
					if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
					{
						//If wrong format of picture or video is selected
						$response = "<div align='center' class='alert alert-warning alert-dismissable'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p align='center' style='color: #ff0000 !important;' >
											Sorry! File format not supported. Please choose a Photo (PNG, JPEG and JPG format)!</p>
										</p>
									</div>";
					}
					else
					{	
						$temp = explode(".",  $photo_name);
						$photo = md5(uniqid(time(),true)) . '.' . end($temp);
						move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/event/".$photo);
						$_SESSION["Photo"] = $photo;
							
						//Add Details to Event table
						$check = $crud->insert("event", 
								array( 
										'PostedBy' => $by,
										'Theme' => $theme,
										'Venue' => $venue,
										'Performer' => $performer,
										'Sponsor' => $sponsor,
										'UID' => $uid,
										'Photo'=>$photo,
										'Note'=>$note,
										'OgEvent'=>$ogevent,
										'Datez' => $datez,
										'Timez' => $timez,
										'AccessLevel'=> $acclev,
										'IPAddr'=> $ipaddress
								));

						if(!$check){
								$response = "<div align='center' class='alert alert-warning alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;' >
													Sorry! Event not posted, try again later</p>
												</p>
											</div>";
						}else{
								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<span> <b>Done!</b> Event post successful.</span>
											</div>";
						}

									
					}
					
				}
			}else{
				//if photo var is empty
				$photo = "";
												
				//Add Details to Event table
				$check = $crud->insert("event", 
						array( 
								'PostedBy' => $by,
								'Theme' => $theme,
								'Venue' => $venue,
								'Performer' => $performer,
								'Sponsor' => $sponsor,
								'Photo' => $photo,
								'UID' => $uid,
								'Note'=>$note,
								'OgEvent'=>$ogevent,
								'Datez' => $datez,
								'Timez' => $timez,
								'AccessLevel'=> $acclev,
								'IPAddr'=> $ipaddress
						));

				if(!$check){
					$response = "<div align='center' class='alert alert-warning alert-dismissable'>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! Event not posted, try again later</p>
									</p>
								</div>";
				}else{
						$response = "<div align='center' class='alert alert-dismissable alert-success'>
										<span> <b>Done!</b> Event post successful.</span>
									</div>";
				}

			}
		}
	
	break;




	//Add Album
	case 16:

		$uid  = $_SESSION["duid"];
		$album = $_POST["Album"];

		if($album == "")
		{
			$response = "<div class='alert alert-warning alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! Space is empty.
							</p>
						</div>";
		}
		else
		{			
			//Add Details to feed table
			$crud->insert("album", 
			array( 
					'UID' => $uid,
					'Album'=> $album
			) );

			$response = "<div class='alert alert-success alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' !important;' >
								Done! Album added.
							</p>
						</div>";
		}

	break;



	//Add Story for Picture Message
	case 17:

		$uid  = $_SESSION["duid"];
		$album = $_POST["Album"];

		if($album == "")
		{
			$response = "<div class='alert alert-warning alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! Story album space cannot be empty.
							</p>
						</div>";
		}
		else
		{			
			//Add Details to feed table
			$crud->insert("story_album", 
			array( 
					'UID' => $uid,
					'Album'=> $album
			) );

			$response = "<div class='alert alert-success alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' !important;' >
								Done! Story album added.
							</p>
						</div>";
		}

	break;



		//PLACE ADVERT
		case 19:

			//Input Details
			$cc = new Crud($connect);
					
			$photo_size = $_FILES["Photo"]["size"];
			$photo_name = $_FILES["Photo"]["name"];
			$name = $_POST["CompName"];
			$email = $_POST["CompEmail"];
			$phone = $_POST["CompPhone"];
			$web = $_POST["CompWeb"];
			$addr = $_POST["CompAddr"];
			$type = $_POST["Type"];
			$date_time = $_POST["DateTime"];
			$des = $_POST["Description"];
			$by = $_POST["UploadedBy"];
			$accesslevel = $cc->AnyContent("AccessLevel", "users", "ID", $_SESSION["duid"] );
	
			if($accesslevel <> 1)
			{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! You are not allowed to perform this action.
									</p>
								</div>";
			}
			else
			{
				if( (empty($name) == TRUE) || (empty($email) == TRUE) || (empty($date_time) == true) )
				{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<p align='center' style='color: #ff0000 !important;' >
										Boxes with asterisk cannot be empty.
									</p>
								</div>";
				}
				else
				{	//maximum upload is 5mb = 5*1024*1024
					if( ($photo_size > (5*1024*1024) ) )
					{	
						$response = "<div align='center' class='alert alert-dismissable alert-warning'>
										<p align='center' style='color: #ff0000 !important;' >
											The File you are trying to upload is too large. maximum size allowed is 5mb!
										</p>
									</div>";
					}
					else
					{	//If photo var is NOT empty
						if(!empty($photo_name))
						{
							$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
							
							if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
							{
								//If wrong format of picture or video is selected
								$response = "<div align='center' class='alert alert-warning alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;' >
													Sorry! File format not supported. Please choose a Photo (PNG, JPEG or JPG format)!</p>
												</p>
											</div>";
								
							}
							else
							{	//var_dump($ext);
								
								$temp = explode(".",  $photo_name);
								$photo = md5(uniqid(time(),true)) . '.' . end($temp);
								move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/advert/".$photo);
								//$_SESSION["Photo"] = $photo;
	
								//Add Details to blog table
								$crud->insert("advert", 
								array( 'UploadedBy'=>$by,
										'Photo'=>$photo,
										'ExpiryDate'=>$date_time,
										'Type'=>$type,
										'CompanyName'=>$name,
										'CompanyWebsite'=>$web,
										'CompanyAddress'=>$addr,
										'CompanyPhone'=>$phone,
										'CompanyEmail'=>$email,
										'AddedOn'=>$Timenow,
										'Description'=>$des
								) );

								if($crud){
										$response = "<div align='center' class='alert alert-dismissable alert-success'>
													<button class='close' data-dismiss='alert'>&times;</button>
													<span> <b>Done!</b> Advert placement successful.</span>
												</div>";
								}else{
									$response = "<div class='alert alert-warning alert-dismissable'>
													<p align='center' style='color: #ff0000 !important;' >
														Sorry! Something went wrong. Try again later.
													</p>
												</div>";
								}
	
							}
								
						}
						
					}
	
				}
			}	
			
			break;
	



		//UPLOAD SLIDE
		case 20:

			$cc = new Crud($connect);
					
			$photo_size = $_FILES["Photo"]["size"];
			$photo_name = $_FILES["Photo"]["name"];
			$fname = $cc->AnyContent("Fname", "users", "ID", $_SESSION["duid"] );
			$title = $_POST["Title"];
			$title = str_replace(array('"', "'", '(', ')', "\n", "\r", "\t", "[", "]"), ' ', $title);
			$uid = $_POST["UID"];
			$accesslevel = $cc->AnyContent("AccessLevel", "users", "ID", $_SESSION["duid"] );
	
			$checkblog = $crud->select("slide", "*", "Title = '".$title."' ");
	
			if($checkblog == TRUE)
			{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! A slide with this title already exists. Please change the title or search for the already posted slide and delete to avoid duplicates.
									</p>
								</div>";
			}
			else
			{
				if( (empty($title) == TRUE) || (empty($photo_name) == TRUE))
				{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<p align='center' style='color: #ff0000 !important;' >
										Boxes with asterisk cannot be left empty.
									</p>
								</div>";
				}
				else
				{	//maximum upload is 5mb = 5*1024*1024
					if( ($photo_size > (5*1024*1024) ) )
					{	
						$response = "<div align='center' class='alert alert-dismissable alert-warning'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p align='center' style='color: #ff0000 !important;' >
											The File you are trying to upload is too large for a slide. maximum size allowed is 5mb!
										</p>
									</div>";
					}
					else
					{	
						$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
						
						if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
						{
							//If wrong format of picture or video is selected
							$response = "<div align='center' class='alert alert-warning alert-dismissable'>
											<button class='close' data-dismiss='alert'>&times;</button>
											<p align='center' style='color: #ff0000 !important;' >
												Sorry! File format not supported. Please choose a Photo (PNG, JPEG and JPG format)!</p>
											</p>
										</div>";
							
						}
						else
						{	
							$temp = explode(".",  $photo_name);
							$photo = md5(uniqid(time(),true)) . '.' . end($temp);
							move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/slider/".$photo);
							$_SESSION["Photo"] = $photo;

							//Add Details to blog table
							$in = $crud->insert("slide", 
							array( 'UID'=>$uid,
									'Fname' => $fname,
									'Photo'=>$photo,
									'Title'=>$title,
									'AccessLevel'=> $accesslevel
							) );

							if(!isset($in)){
								$response = "<div align='center' class='alert alert-warning alert-dismissable'>
											<p align='center' style='color: #ff0000 !important;' >
												Ooops! Slide not uploaded. Please try again later.</p>
											</p>
										</div>";
							}else{
								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<span> <b>Done!</b> Slide successfuly uploaded.</span>
											</div>";
							}

						
						}
								
						
						
					}
	
				}
			}	
			
			break;
	


			//POST JOB
			case 21:

				//JOB Posting
				$photo_size = $_FILES["Photo"]["size"];
				$photo_name = $_FILES["Photo"]["name"];
				$type = $_POST["Type"];
				$exp = $_POST["Experience"];
				$pay = $_POST["Pay"];
				$dur = $_POST["Duration"];
				$title = $_POST["Title"];
				$title = str_replace(array('"', "'", '(', ')', "\n", "\r", "\t", "[", "]"), ' ', $title);
				$mes = $_POST["Description"];
				$des = substr($mes, 0, 1000);
				$uid = $_POST["UID"];

				$checkjob = $crud->select("job", "*", "Title = '".$title."' && UID = '".$uid."' ");

				if($checkjob == TRUE)
				{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! You have posted a job with this title before. Please update the existing one or change the title.
									</p>
								</div>";
				}
				else
				{
					if( (empty($title) == TRUE) || (empty($des) == TRUE) || (empty($type) == true) )
					{
						$response = "<div class='alert alert-warning alert-dismissable'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p align='center' style='color: #ff0000 !important;' >
											Boxes with asterisk cannot be empty.
										</p>
									</div>";
					}
					else
					{	//maximum upload is 5mb = 5*1024*1024
						if( ($photo_size > (3*1024*1024) ) )
						{	
							$response = "<div align='center' class='alert alert-dismissable alert-warning'>
											<button class='close' data-dismiss='alert'>&times;</button>
											<p align='center' style='color: #ff0000 !important;' >
												The File you are trying to upload is too large. maximum size allowed is 3mb!
											</p>
										</div>";
						}
						else
						{	//If photo var is NOT empty
							if(!empty($photo_name))
							{
								$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
								
								if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
								{
									//If wrong format of picture or video is selected
									$response = "<div align='center' class='alert alert-warning alert-dismissable'>
													<button class='close' data-dismiss='alert'>&times;</button>
													<p align='center' style='color: #ff0000 !important;' >
														Sorry! File format not supported. Please choose a Photo (PNG, JPEG AND JPG)!</p>
													</p>
												</div>";
									
								}
								else
								{	
									$temp = explode(".",  $photo_name);
									$photo = md5(uniqid(time(),true)) . '.' . end($temp);
									move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/job/".$photo);

									//Add Details to job table
									$sub = $crud->insert("job", 
									array( 'UID'=>$uid,
											'Type' => $type,
											'Experience'=>$exp,
											'Sample'=>$photo,
											'Title'=>$title,
											'Pay'=>$pay,
											'Duration'=>$dur,
											'AddedOn'=>$Timenow,
											'Description'=>$des
									) );

									if(!$sub){
										$response = "<div align='center' class='alert alert-warning alert-dismissable'>
														<button class='close' data-dismiss='alert'>&times;</button>
														<p align='center' style='color: #ff0000 !important;' >
															Sorry! Job post not succesful. Please try again later
														</p>
													</div>";
									}else{
										$response = "<div align='center' class='alert alert-dismissable alert-success'>
														<button class='close' data-dismiss='alert'>&times;</button>
														<span> <b>Done!</b> Job successfully posted</span>
													</div>";
									}
								}
									
							}
							else
							{	//if photo var is empty
								$photo = "";
								//Add Details to job table
								$sub = $crud->insert("job", 
								array( 'UID'=>$uid,
										'Type' => $type,
										'Experience'=>$exp,
										'Sample'=>$photo,
										'Title'=>$title,
										'Pay'=>$pay,
										'Duration'=>$dur,
										'AddedOn'=>$Timenow,
										'Description'=>$des
								) );

								if(!$sub){
									$response = "<div align='center' class='alert alert-warning alert-dismissable'>
													<button class='close' data-dismiss='alert'>&times;</button>
													<p align='center' style='color: #ff0000 !important;' >
														Sorry! Job post not succesful. Please try again later
													</p>
												</div>";
								}else{
									$response = "<div align='center' class='alert alert-dismissable alert-success'>
													<button class='close' data-dismiss='alert'>&times;</button>
													<span> <b>Done!</b> Job successfully posted</span>
												</div>";
								}

							}
							
						}

					}
				}	
				
			break;




		//UPLOAD WORKER SLIDE FOR HOMEPAGE
		case 22:

			$cc = new Crud($connect);
					
			$photo_size = $_FILES["Photo"]["size"];
			$photo_name = $_FILES["Photo"]["name"];
			$fname = $cc->AnyContent("Fname", "users", "ID", $_SESSION["duid"] );
			$title = $_POST["Title"];
			$title = str_replace(array('"', "'", '(', ')', "\n", "\r", "\t", "[", "]"), ' ', $title);
			$uid = $_POST["UID"];
			$accesslevel = $cc->AnyContent("AccessLevel", "users", "ID", $_SESSION["duid"] );
	
			$checkblog = $crud->select("worker_slide", "*", "Title = '".$title."' ");
	
			if($checkblog == TRUE)
			{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! A worker slide with this title already exists. Please change the title or search for the already posted slide and delete to avoid duplicates.
									</p>
								</div>";
			}
			else
			{
				if( (empty($title) == TRUE) || (empty($photo_name) == TRUE))
				{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<p align='center' style='color: #ff0000 !important;' >
										Boxes with asterisk cannot be left empty.
									</p>
								</div>";
				}
				else
				{	//maximum upload is 5mb = 5*1024*1024
					if( ($photo_size > (5*1024*1024) ) )
					{	
						$response = "<div align='center' class='alert alert-dismissable alert-warning'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p align='center' style='color: #ff0000 !important;' >
											The File you are trying to upload is too large for a slide. maximum size allowed is 5mb!
										</p>
									</div>";
					}
					else
					{	
						$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
						
						if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
						{
							//If wrong format of picture or video is selected
							$response = "<div align='center' class='alert alert-warning alert-dismissable'>
											<button class='close' data-dismiss='alert'>&times;</button>
											<p align='center' style='color: #ff0000 !important;' >
												Sorry! File format not supported. Please choose a Photo (PNG, JPEG and JPG format)!</p>
											</p>
										</div>";
							
						}
						else
						{	
							$temp = explode(".",  $photo_name);
							$photo = md5(uniqid(time(),true)) . '.' . end($temp);
							move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/slider/".$photo);
							$_SESSION["Photo"] = $photo;

							//Add Details to blog table
							$in = $crud->insert("worker_slide", 
							array( 'UID'=>$uid,
									'Fname' => $fname,
									'Photo'=>$photo,
									'Title'=>$title,
									'AccessLevel'=> $accesslevel
							) );

							if(!isset($in)){
								$response = "<div align='center' class='alert alert-warning alert-dismissable'>
											<p align='center' style='color: #ff0000 !important;' >
												Ooops! Worker slide not uploaded. Please try again later.</p>
											</p>
										</div>";
							}else{
								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<span> <b>Done!</b> Worker slide successfuly uploaded.</span>
											</div>";
							}

						
						}
								
						
						
					}
	
				}
			}	
			break;


			//Add Product Title to 
			case 23:

				$uid  = $_SESSION["duid"];
				$product = $_POST["Product"];
				
			$checkprotitle = $crud->select("product_title", "*", "Product = '".$product."' AND UID = '".$uid."' ");
	
			if($checkprotitle == TRUE)
			{
					$response = "<div class='alert alert-default alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! A product with this title already exist by you. Please change the title or select the title among the lists of Product Title available.
									</p>
								</div>";
			}
			else
			{
				if($product == "")
				{
					$response = "<div class='alert alert-warning alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;' >
										Sorry! Product title space cannot be empty.
									</p>
								</div>";
				}
				else
				{			
					//Add Details to feed table
					$crud->insert("product_title", 
					array( 
							'UID' => $uid,
							'Product'=> $product
					) );

					// $response = "<div class='alert alert-success alert-dismissable'>
					// 				<button class='close' data-dismiss='alert'>&times;</button>
					// 				<p align='center' !important;' >
					// 					Done! Product title added.
					// 				</p>
					// 			</div>";
				}
			}

			break;




			default:
				# code...
				break;
		}
}







/*
=====================================================================
EDIT
=====================================================================
*/

/*
Edit list
1. Update Profile/Account details
2. Change Password
3. Update Feeds
*/ 

if(isset($_POST["EDIT"]) && $_POST["EDIT"] !="" )
{
	$crud = new Crud($connect);
	$user_cl = new User($connect);
	$Timenow = date("Y-m-d H:i:s");

	switch ($_POST["EDIT"]) {

	//Update Profile Details
		case 1:

		$photo_size = $_FILES["Photo"]["size"];
		$photo_name = $_FILES["Photo"]["name"];
		$ipaddress = $_SERVER["REMOTE_ADDR"];
		$fname = $_POST["Fname"];
		$sname = $_POST["Sname"];
		$uname = $_POST["Uname"];
		$email  = $_POST["Email"];
		$gender  = $_POST["Gender"];
		$phone  = $_POST["Phone"];
		$addr  = $_POST["Addr"];
		$editval = $_POST["EDITVAL"];
		$bio  = $_POST["Bio"];
		$role  = $_POST["Role"];

		if(isset($_POST["Country"]) )//&& $_POST["State"] != "" && $_POST["LocalGov"] != ""
		{
			$country  = $_POST["Country"];
		}
		else
		{
			$country = $crud->AnyContent("Country", "users", "ID", $editval);
		}

		$checkreg1 = $crud->select("users", "*", "Uname='".$uname."' && ID <> '".$_SESSION["duid"]."' ");

		if($checkreg1==TRUE)
		{
				$response_pro = "<div align='center' class='alert alert-warning alert-dismissable'>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! The Username you entered is being used by another. Please use another.
							</p>
						</div>";
		}
		else
		{
				if($photo_size > (3*1024*1024) )
				{	
					$response_pro = "<div align='center' class='alert alert-dismissable alert-warning'>
									The File you are trying to upload is too large. maximum size allowed is 3mb!
								</div>";
				}
				else
				{
					//var_dump($uname);
					if(!empty($photo_name))
					{
						//var_dump($uname);
						$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
						//$ext = explode(".", $thefilez)[1];
						//var_dump($ext);
						if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
						{
							//If wrong format of picture or video is selected
							$response_pro = "<div align='center' class='alert alert-warning alert-dismissable'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p>Sorry! File format not supported. Please choose a Photo (PNG, JPG or JPEG format)!</p>
									</div>";
						}
						else
						{
							if(!empty($photo_name))
							{
								$temp = explode(".",  $photo_name);
								$photo = md5(uniqid(time(),true)) . '.' . end($temp);
								move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/profilepics/".$photo);
								$_SESSION["Photo"] = $photo;
							}
							else
							{
								$photo = $_POST["PhotoHolder"];
							}
						}
							
					}
					else
					{
						$photo = $_POST["PhotoHolder"];
					}

					// (isset($bio)) ? $bio = $bio : $bio = "Null";
					// (isset($role)) ? $role = $role : $role = "Null";

					$checkupd = $crud->update("users", "ID", $editval, 
						array("Fname"=>$fname,
								"Sname"=>$sname,
								"Uname"=>$uname,
								"Phone"=>$phone,
								"Bio"=>$bio,
								"Role"=>$role,
								"Photo"=>$photo,
								"Gender"=>$gender,
								"Email"=>$email,
								"Country"=>$country,
								"Addr"=>$addr,
								"IPAddr"=>$ipaddress
						));

					//var_dump($checkreg1);
					if($checkupd==false)
					{
						$response_pro = "<div align='center' class='alert alert-dismissable alert-danger'>
									Sorry! Your details could not be modified now. Please try again later.
								</div>";
					}	
					else{
							if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1"){
								$crud->update("admin", "UID", $editval, 
										array("Fname"=>$fname,
												"Sname"=>$sname,
												"Uname"=>$uname,
												"Bio"=>$bio,
												"Photo"=>$photo,
												"Role"=>$role,
												"Phone"=>$phone,
												"Email"=>$email,
												"Gender"=>$gender
										));

										$_SESSION["fname"] = $fname;
										$_SESSION["sname"] = $sname;

								$response_pro = "<div align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Your profile is saved successfully.
											</div>";
							}
							elseif(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "2"){
								$crud->update("sub_admin", "UID", $editval, 
										array("Fname"=>$fname,
												"Sname"=>$sname,
												"Uname"=>$uname,
												"Bio"=>$bio,
												"Role"=>$role,
												"Phone"=>$phone,
												"Email"=>$email,
												"Photo"=>$photo,
												"Addr"=>$addr,
												"Gender"=>$gender
										));

										$_SESSION["fname"] = $fname;
										$_SESSION["sname"] = $sname;

								$response_pro = "<div align='center' align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Your profile has been updated successfully.
											</div>";							
							}
							elseif(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "3"){
								$crud->update("members", "UID", $editval, 
										array("Fname"=>$fname,
												"Sname"=>$sname,
												"Uname"=>$uname,
												"Phone"=>$phone,
												"Email"=>$email,
												"Photo"=>$photo,
												"Addr"=>$addr,
												"Gender"=>$gender
										));

										$_SESSION["fname"] = $fname;
										$_SESSION["sname"] = $sname;

									$response_pro = "<div align='center' class='alert alert-dismissable alert-success'>
													<button class='close' data-dismiss='alert'>&times;</button>
													Done! Your profile update was successful.
												</div>";							
								}
												
							}	
							
				}

		}	
		

		break;



	//CHANGE PASSWORD
	case 2:

	$ipaddress = $_SERVER["REMOTE_ADDR"];
	$editval = $_POST["EDITVAL"];
	$pword_db = $crud->AnyContent("Pword", "users", "ID", $editval); 
	$pword1 = $_POST["Pword1"];
	$pword2 = $_POST["Pword2"];
	$pwordcol = $_POST["PwordOld"];
	
	$salt = $user_cl->saltKeys(1);
	$alphaz = $pwordcol.$saltz;
	$pwordold = md5(sha1($alphaz));

	$salt = $user_cl->saltKeys(1);
	$alpha = $pword1.$salt;
	$pword = md5(sha1($alpha));

	if( $pword1 != $pword2 ){

		$response = "<div class='alert alert-warning alert-dismissable'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p align='center' style='color: #ff0000 !important;' >
							Sorry! New passwords don't match. Please check and try again.
						</p>
					</div>";
	}
	else
	{
		if($pwordold != $pword_db) {

			$response = "<div class='alert alert-warning alert-dismissable'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p align='center' style='color: #ff0000 !important;' >
							Sorry! Old password is wrong. Please input again.
						</p>
					</div>";
		}
		else{
			
			$checkupd = $crud->update("users", "ID", $editval, 
			array(
					"Pword"=>$pword,
					"IPAddr"=>$ipaddress
			));

			//var_dump($checkrupd);
			if($checkupd==false)
			{
				$response = "<div align='center' class='alert alert-dismissable alert-warning'>
								<button class='close' data-dismiss='alert'>&times;</button>
								Sorry! Your details could not be modified now. Please try again later.
							</div>";
			}	
			else{
					if(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "1"){
						$crud->update("admin", "UID", $editval, 
								array(
										"Pword"=>$pword,
										"IPAddr"=>$ipaddress
								));

								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Your password has been changed.
											</div>";
					}
					elseif(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "2"){
						$crud->update("sub_admin", "UID", $editval, 
								array(
										"Pword"=>$pword,
										"IPAddr"=>$ipaddress
								));

								$response = "<div align='center' align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Your password has been changed.
											</div>";							
					}
					elseif(isset($_SESSION["accesslevel"]) && $_SESSION["accesslevel"] == "3"){
						$crud->update("members", "UID", $editval, 
								array(
										"Pword"=>$pword,
										"IPAddr"=>$ipaddress
								));

									$response = "<div align='center' class='alert alert-dismissable alert-success'>
													<button class='close' data-dismiss='alert'>&times;</button>
													Done! Your password has been changed.
												</div>";							
						}
										
				}	

		}
			
						
	}

	break;


	
	//Update Blog
	case 4:

	$photo_size = $_FILES["Photo"]["size"];
	$photo_name = $_FILES["Photo"]["name"];
	$ipaddress = $_SERVER["REMOTE_ADDR"];
	$fname = $_SESSION["fname"];
	$title = $_POST["Title"];
	$ogtitle = md5(uniqid(time(),true));
	$message  = $_POST["Message"];
	$category  = $_POST["Category"];
	$editval = $_POST["EDITVAL"];
	$accesslevel = $_POST["AccessLevel"];

	$checkfeed = $crud->select("blog", "*", "Title='".$title."' && ID <> '".$editval."' ");

	if($checkfeed==TRUE)
	{
			$response = "<div align='center' class='alert alert-danger alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
								Sorry! The Title you entered already exists. Please use another or simply comment on the existed content.
						</div>";
	}
	else
	{
		if( ($title == "") || ($message == "") || ($category == "") ){

			$response = "<div align='center' class='alert alert-danger alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
								Sorry! Boxes with asterisks cannot be empty.
						</div>";
		}
		else
		{
			//var_dump($pword1.$pword2);
			//if picture is greater than 3mb i.e 1kb = 1024 bytes therefore 1024kb * 1024kb * 5 = ____ kilo-bytes
			if($photo_size > (5*1024*1024) )
			{	
				$response = "<div align='center' class='alert alert-dismissable alert-danger'>
								<button class='close' data-dismiss='alert'>&times;</button>
								The File you are trying to upload is too large. maximum size allowed is 5mb!
							</div>";
			}
			else
			{
				//var_dump($uname);
				if(!empty($photo_name))
				{
					$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
					//$ext = explode(".", $photo_size)[1];
					//var_dump($ext);
					if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
					{
						//If wrong format of picture or video is selected
						$response = "<div align='center' class='alert alert-danger alert-dismissable'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p align='center' style='color: #ff0000 !important;' >
											Sorry! File format not supported. Please choose a Photo (PNG, JPG and JPEG format)!
										</p>
									</div>";
					}
					else
					{
						$temp = explode(".",  $photo_name);
						$photo = md5(uniqid(time(),true)) . '.' . end($temp);
						move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/blog/".$photo);
						$_SESSION["Photo"] = $photo;
					
						//$photo = $_POST["PhotoHolder"];
						$checkupd = $crud->update("blog", "ID", $editval, 
						array("Fname"=>$fname,
								"Title"=>$title,
								"OgTitle"=>$ogtitle,
								"Message"=>$message,
								"Category"=>$category,
								"Photo"=>$photo,
								"AccessLevel"=>$accesslevel,
								"IPAddr"=>$ipaddress
						));

						//var_dump($checkupd);
						if($checkupd==false)
						{
							$response = "<div align='center' class='alert alert-dismissable alert-danger'>
											<button class='close' data-dismiss='alert'>&times;</button>
											Sorry! Action could not be completed now. Please try again later.
										</div>";
						}	
						else{
								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Blog updated successfully.
											</div>";									
						}
					}
				
				}//if(User chooses a photo ends here)
				else
				{
					$photo = $_POST["PhotoHolder"];

					$checkupd = $crud->update("blog", "ID", $editval, 
					array("Fname"=>$fname,
							"Title"=>$title,
							"OgTitle"=>$ogtitle,
							"Message"=>$message,
							"Category"=>$category,
							"Photo"=>$photo,
							"AccessLevel"=>$accesslevel,
							"IPAddr"=>$ipaddress
					));

					//var_dump($checkupd);
					if($checkupd==false)
					{
						$response = "<div align='center' class='alert alert-dismissable alert-danger'>
										<button class='close' data-dismiss='alert'>&times;</button>
										Sorry! Action could not be completed now. Please try again later.
									</div>";
					}	
					else{
							$response = "<div align='center' class='alert alert-dismissable alert-success'>
											<button class='close' data-dismiss='alert'>&times;</button>
											Done! Blog updated successfully.
										</div>";									
					}
					
				}
					
						
			}

		}
	}	
	
	break;



	
	//Update ADMIN DETAILS
	case 6:

	$photo_size = $_FILES["Photo"]["size"];
	$photo_name = $_FILES["Photo"]["name"];
	$ipaddress = $_SERVER["REMOTE_ADDR"];
	$fname = $_POST["Fname"];
	$sname = $_POST["Sname"];
	$bio = $_POST["Bio"];
	$role = $_POST["Role"];
	$editval = $_POST["EDITVAL"];
	$accesslevel = $_SESSION["accesslevel"];

	$check = ( isset($accesslevel) && $accesslevel == "1" );

	if($check == FALSE)
	{
			$response = "<div class='alert alert-danger alert-dismissable'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p align='center' style='color: #ff0000 !important;' >
							Sorry! You don't have permission to perform this action.
						</p>
					</div>";
	}
	else
	{
		if( ($fname == "") || ($bio == "") ){

			$response = "<div class='alert alert-danger alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! Boxes with asterisks cannot be empty.
							</p>
						</div>";
		}
		else
		{
			if($photo_size > (3*1024*1024) )
			{	
				$response = "<div align='center' class='alert alert-dismissable alert-danger'>
								<button class='close' data-dismiss='alert'>&times;</button>
								The File you are trying to upload is too large. maximum size allowed is 3mb!
							</div>";
			}
			else
			{
				//var_dump($uname);
				if(!empty($photo_name))
				{
					$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
					//$ext = explode(".", $photo_size)[1];
					//var_dump($ext);
					if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
					{
						//If wrong format of picture or video is selected
						$response = "<div align='center' class='alert alert-danger alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p>Sorry! File format not supported. Please choose a Photo (PNG of JPEG format)!</p>
								</div>";
					}
					else
					{
						if(!empty($photo_name))
						{
							$temp = explode(".",  $photo_name);
							$photo = md5(uniqid(time(),true)) . '.' . end($temp);
							move_uploaded_file($_FILES["Photo"]["tmp_name"], "files/img/".$photo);
							$_SESSION["Photo"] = $photo;
						}
						else
						{
							$photo = $_POST["PhotoHolder"];
						}
					}//Photo format
						
				}
				else//Nothing chosen by user
				{
					$photo = $_POST["PhotoHolder"];
				}

				$checkupd = $crud->update("admin", "UID", $editval, 
					array("Fname"=>$fname,
							"Sname"=>$sname,
							"Bio"=>$bio,
							"Photo"=>$photo,
							"Role"=>$role,
							"AccessLevel"=>$accesslevel,
							"IPAddr"=>$ipaddress

					));

				 //var_dump($checkupd); 
				if($checkupd == FALSE)
				{
					$response = "<div align='center' class='alert alert-dismissable alert-danger'>
								<button class='close' data-dismiss='alert'>&times;</button>
								Sorry! Action could not be completed now. Please try again later.
							</div>";
				}	
				else{
					$response = "<div align='center' class='alert alert-dismissable alert-success'>
									<button class='close' data-dismiss='alert'>&times;</button>
									Done! Admin details updated successfully.
								</div>";
																	
				}	
						
			}

		}
	}	

	break;

	


	
	//UPDATE PROFILE
	case 7:

		$crud = new Crud($connect);
	
		$resume_size = $_FILES["Resume"]["size"];
		$resume_name = $_FILES["Resume"]["name"];
		$editval = $_POST["EDITVAL"];
		(isset($_POST["Agree"])) ? $agree = $_POST["Agree"] : $agree = "";
		$uid = $_SESSION["duid"];
		$acc_lev = $_SESSION["accesslevel"];
	
		//$email = $_POST["Email"];
		//$phone = $_POST["Phone"];
		$edu = $_POST["Education"];
		$skills = $_POST["Skills"];
		$cert = $_POST["Certification"];
		$exp = $_POST["Experience"];
		//$addr1 = $_POST["Address1"];
		$addr2 = $_POST["Address2"];
		$hob = $_POST["Hobby"];
		$lang = $_POST["Language"];
		$ref = $_POST["Referee"];
		
		if(!empty($_POST["Niche"])) {
			$niche = implode(',',$_POST['Niche']);
		}
		if( empty($agree) ){
			$response = "<div align='center' class='alert alert-danger alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
								Sorry! Check the agree information box to confirm you have provided true information
						</div>";
		}
		else
		{
			if($resume_size > (3*1024*1024) )
			{	
				$response = "<div align='center' class='alert alert-dismissable alert-danger'>
								<button class='close' data-dismiss='alert'>&times;</button>
								The File you are trying to upload is too large. maximum size allowed is 3mb!
							</div>";
			}
			else
			{
				if(!empty($resume_name))
				{
					$ext = pathinfo($resume_name, PATHINFO_EXTENSION);
					$ext = strtolower($ext);
					//$ext = explode(".", $photo_size)[1];
					//var_dump($ext);
					if($ext != 'pdf' && $ext != 'png' && $ext != 'doc' && $ext != 'jpg' && $ext != 'docx' && $ext != 'jpeg')
					{
						//If wrong format of picture or video is selected
						$response = "<div align='center' class='alert alert-danger alert-dismissable'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<p align='center' style='color: #ff0000 !important;' >
											Sorry! File format not supported. Please choose a Photo (PNG, JPG and JPEG format)
											or Document (PDF, DOC and DOCX)!
										</p>
									</div>";
					}
					else
					{
						$temp = explode(".",  $resume_name);
						$resume = md5(uniqid(time(),true)) . '.' . end($temp);
						move_uploaded_file($_FILES["Resume"]["tmp_name"], "../../files/resume/".$resume);
						$_SESSION["resume"] = $resume;

						(!isset($niche)) ? $niche = 2 : "";
					
						$update_profile = $crud->update("profile", "ID", $editval, 
						array(
								"Resume"=>$resume,
								"UID"=>$uid,
								"AccessLevel"=>$acc_lev,
								//"Email"=>$email,
								//"Phone"=>$phone,
								"Education"=>$edu,
								"Skills"=>$skills,
								"Certification"=>$cert,
								"Experience"=>$exp,
								//"Address1"=>$addr1,
								"Address2"=>$addr2,
								"Hobby"=>$hob,
								"Language"=>$lang,
								"Niche"=>$niche,
								"Referee"=>$ref
						));
	
						// var_dump($checkupd);
						if($update_profile == false)
						{
							$response = "<div align='center' class='alert alert-dismissable alert-warning'>
											<button class='close' data-dismiss='alert'>&times;</button>
											Sorry! profile could not be updated now. Please try again later.
										</div>";
						}
						else
						{
							$response = "<div align='center' class='alert alert-dismissable alert-success'>
											<button class='close' data-dismiss='alert'>&times;</button>
											Done! profile successfully updated.
										</div>";
						}
					}
				
				}//if(User chooses file for resume)
				else
				{
					$resume = $_POST["ResumeHolder"];
					(!isset($niche)) ? $niche = 2 : "";
					$update_profile = $crud->update("profile", "ID", $editval, 
						array(
								"Resume"=>$resume,
								"UID"=>$uid,
								"AccessLevel"=>$acc_lev,
								//"Email"=>$email,
								//"Phone"=>$phone,
								"Education"=>$edu,
								"Skills"=>$skills,
								"Certification"=>$cert,
								"Experience"=>$exp,
								//"Address1"=>$addr1,
								"Address2"=>$addr2,
								"Hobby"=>$hob,
								"Language"=>$lang,
								"Niche"=>$niche,
								"Referee"=>$ref
								//if(!isset($niche)){, "Niche"=>$niche }
						));
	
					 	//var_dump($exp);
					if($update_profile == false)
					{
						$response = "<div align='center' class='alert alert-dismissable alert-warning'>
										<button class='close' data-dismiss='alert'>&times;</button>
										Sorry! profile could not be updated now. Please try again laterzz.
									</div>";
					}
					else
					{
	
						$response = "<div align='center' class='alert alert-dismissable alert-success'>
										<button class='close' data-dismiss='alert'>&times;</button>
										Done! Profile successfully updated.
									</div>";
					}
					
				}
					
						
			}
	
		}
	
		break;
	
	



	//CHANGE PASSWORD
	case 8:

	$ipaddress = $_SERVER["REMOTE_ADDR"];
	$editval = $_POST["EDITVAL"]; 
	$acc_code = $_POST["ActivationCode"];
	$email = $_POST["Email"];
	$pword1 = $_POST["Pword1"];
	$pword2 = $_POST["Pword2"];
	$acc_code_db = $crud->AnyContent("ActivationCode", "users", "Email", $email); 
	$acc_lev_db = $crud->AnyContent("AccessLevel", "users", "Email", $email); 

	
	if( $acc_code != $acc_code_db ){

		$response = "<div class='alert alert-warning alert-dismissable'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p align='center' style='color: #ff0000 !important;' >
							Ooops! Something went wrong!. Please try again later and if problem persists please <a href='contact-us'>contact an Admin</a> 
						</p>
					</div>";
	}
	else
	{

		if( $pword1 != $pword2 ){

			$response = "<div class='alert alert-warning alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! New passwords don't match. Please check and try again.
							</p>
						</div>";
		}
		else
		{
			$salt = $user_cl->saltKeys(1);
			$alpha = $pword1.$salt;
			$pword = md5(sha1($alpha));

			$checkupd = $crud->update("users", "ID", $editval, 
			array(
					"Pword"=>$pword,
					"IPAddr"=>$ipaddress
			));

			//var_dump($checkrupd);
			if($checkupd==false)
			{
				$response = "<div align='center' class='alert alert-dismissable alert-warning'>
								<button class='close' data-dismiss='alert'>&times;</button>
								Sorry! Your details could not be modified now. Please try again later.
							</div>";
			}	
			else{
					if(isset($acc_lev_db) && $acc_lev_db == "1"){
						$crud->update("admin", "UID", $editval, 
								array(
										"Pword"=>$pword,
										"IPAddr"=>$ipaddress
								));

								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Your password has been changed. <br/>
												Please use the new password to <a href='signin'>sign in</a>.
											</div>";

								header("Location: ../signin.php");
					}
					elseif(isset($acc_lev_db) && $acc_lev_db == "2"){
						$crud->update("sub_admin", "UID", $editval, 
								array(
										"Pword"=>$pword,
										"IPAddr"=>$ipaddress
								));

								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Your password has been changed. <br/>
												Please use the new password to <a href='signin'>sign in</a>.
											</div>";	
								header("Location: ../signin.php");
					}
					elseif(isset($acc_lev_db) && $acc_lev_db == "3"){
						$crud->update("members", "UID", $editval, 
								array(
										"Pword"=>$pword,
										"IPAddr"=>$ipaddress
								));

								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<button class='close' data-dismiss='alert'>&times;</button>
												Done! Your password has been changed. <br/>
												Please use the new password to <a href='signin'>sign in</a>.
											</div>";
								header("Location: ../signin.php");							
					}
										
				}	

		}
				
							
	}

	break;



	//Update Advert
	case 11:
		$cc = new Crud($connect);
				
		$photo_size = $_FILES["Photo"]["size"];
		$photo_name = $_FILES["Photo"]["name"];
		$name = $_POST["CompName"];
		$email = $_POST["CompEmail"];
		$phone = $_POST["CompPhone"];
		$web = $_POST["CompWeb"];
		$addr = $_POST["CompAddr"];
		$type = $_POST["Type"];
		$exp_date = $_POST["DateTime"];
		$date_hold = $_POST["DateHolder"];
		$des = $_POST["Description"];
		$accesslevel = $cc->AnyContent("AccessLevel", "users", "ID", $_SESSION["duid"] );
		$editval = $_POST["EDITVAL"];
	
		if($accesslevel <> 1)
		{
				$response = "<div align='center' class='alert alert-danger alert-dismissable'>
								<p align='center' style='color: #ff0000 !important;' >
									Sorry! You are not allowed to perform this action.
								</p>
							</div>";
		}
		else
		{
			if( ($name == "") || ($phone == "") || ($email == "") ){
	
				$response = "<div align='center' class='alert alert-danger alert-dismissable'>
								<button class='close' data-dismiss='alert'>&times;</button>
									Sorry! Boxes with asterisks cannot be empty.
							</div>";
			}
			else
			{
				if($photo_size > (5*1024*1024) )
				{	
					$response = "<div align='center' class='alert alert-dismissable alert-danger'>
									The File you are trying to upload is too large. maximum size allowed is 5mb!
								</div>";
				}
				else
				{
					//var_dump($uname);
					if(!empty($photo_name))
					{
						$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
						
						if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
						{
							//If wrong format of picture or video is selected
							$response = "<div align='center' class='alert alert-danger alert-dismissable'>
											<p align='center' style='color: #ff0000 !important;' >
												Sorry! File format not supported. Please choose a Photo (PNG, JPG and JPEG format)!
											</p>
										</div>";
						}
						else
						{
							$temp = explode(".",  $photo_name);
							$photo = md5(uniqid(time(),true)) . '.' . end($temp);
							move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/advert/".$photo);
							$_SESSION["Photo"] = $photo;
						
							$checkupd = $crud->update("advert", "ID", $editval, 
							array("CompanyName"=>$name,
									"CompanyEmail"=>$email,
									"CompanyPhone"=>$phone,
									"CompanyWebsite"=>$web,
									"CompanyAddress"=>$addr,
									"Photo"=>$photo,
									"Type"=>$type,
									"Description"=>$des,

									"ExpiryDate"=> (!empty($exp_date)) ? $exp_date : $date_hold

							));
	
							if($checkupd==false)
							{
								$response = "<div align='center' class='alert alert-dismissable alert-danger'>
												Sorry! Action could not be completed now. Please try again later.
											</div>";
							}	
							else{
									$response = "<div align='center' class='alert alert-dismissable alert-success'>
													<b>Done!</b> Advert updated successfully.
												</div>";									
							}
						}
					
					}//if(User chooses a photo ends here)
					else
					{
						$photo = $_POST["PhotoHolder"];
	
						$checkupd = $crud->update("advert", "ID", $editval, 
							array("CompanyName"=>$name,
									"CompanyEmail"=>$email,
									"CompanyPhone"=>$phone,
									"CompanyWebsite"=>$web,
									"CompanyAddress"=>$addr,
									"Photo"=>$photo,
									"Type"=>$type,
									"Description"=>$des,

									"ExpiryDate"=> (!empty($exp_date)) ? $exp_date : $date_hold

							));
	
							if($checkupd==false)
							{
								$response = "<div align='center' class='alert alert-dismissable alert-danger'>
												Sorry! Action could not be completed now. Please try again later.
											</div>";
							}	
							else{
									$response = "<div align='center' class='alert alert-dismissable alert-success'>
													<b>Done!</b> Advert updated successfully.
												</div>";									
							}
						
					}
						
							
				}
	
			}
		}	
		
		break;
	
	



	//PRODUCT TITLE
	case 12:

		$photo_size = $_FILES["Photo"]["size"];
		$photo_name = $_FILES["Photo"]["name"];
		$title = $_POST["Title"];
		$fname = $_POST["Fname"];
		$uid = $_POST["UID"];
		$editval = $_POST["EDITVAL"];
	
			if( empty($title)){

				$response = "<div align='center' class='alert alert-danger alert-dismissable'>
								<button class='close' data-dismiss='alert'>&times;</button>
									Sorry! Title cannot be left empty.
							</div>";
			}
			else
			{
				//if picture is greater than 3mb i.e 1kb = 1024 bytes therefore 1024kb * 1024kb * 5 = ____ kilo-bytes
				if($photo_size > (5*1024*1024) )
				{	
					$response = "<div align='center' class='alert alert-dismissable alert-danger'>
									<button class='close' data-dismiss='alert'>&times;</button>
									The File you are trying to upload is too large. maximum size allowed is 5mb!
								</div>";
				}
				else
				{
					if(!empty($photo_name))
					{
						$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
						
						if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
						{
							//If wrong format of picture or video is selected
							$response = "<div align='center' class='alert alert-danger alert-dismissable'>
											<p align='center' style='color: #ff0000 !important;' >
												Sorry! File format not supported. Please choose a Photo (PNG, JPG and JPEG format)!
											</p>
										</div>";
						}
						else
						{
							$temp = explode(".",  $photo_name);
							$photo = md5(uniqid(time(),true)) . '.' . end($temp);
							move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/slider/".$photo);
							$_SESSION["Photo"] = $photo;

							//Add Details to slide table
							$in = $crud->update("slide", "ID", $editval,  
							array( 'UID'=>$uid,
									'Fname' => $fname,
									'Photo'=>$photo,
									'Title'=>$title
							) );

							if(!isset($in)){
								$response = "<div align='center' class='alert alert-warning alert-dismissable'>
											<p align='center' style='color: #ff0000 !important;' >
												Ooops! Slide not updated. Please try again later.</p>
											</p>
										</div>";
							}else{
								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<span> <b>Done!</b> Slide successfuly updated.</span>
											</div>";
							}
						}
					
					}//if(User chooses a photo ends here)
					else
					{
						$photo = $_POST["PhotoHolder"];

						//Add Details to slide table
						$in = $crud->update("slide", "ID", $editval, 
						array( 'UID'=>$uid,
								'Fname' => $fname,
								'Photo'=>$photo,
								'Title'=>$title
						) );

						if(!isset($in)){
							$response = "<div align='center' class='alert alert-warning alert-dismissable'>
										<p align='center' style='color: #ff0000 !important;' >
											Ooops! Slide not updated. Please try again later.</p>
										</p>
									</div>";
						}else{
							$response = "<div align='center' class='alert alert-dismissable alert-success'>
											<span> <b>Done!</b> Slide successfuly updated.</span>
										</div>";
						}
						
					}
						
							
				}

			}
	
		
		break;




		
	//Update  WORKER Slide for Homepage
	case 13:

		$photo_size = $_FILES["Photo"]["size"];
		$photo_name = $_FILES["Photo"]["name"];
		$title = $_POST["Title"];
		$fname = $_POST["Fname"];
		$uid = $_POST["UID"];
		$editval = $_POST["EDITVAL"];
	
			if( empty($title)){

				$response = "<div align='center' class='alert alert-danger alert-dismissable'>
								<button class='close' data-dismiss='alert'>&times;</button>
									Sorry! Title cannot be left empty.
							</div>";
			}
			else
			{
				//if picture is greater than 3mb i.e 1kb = 1024 bytes therefore 1024kb * 1024kb * 5 = ____ kilo-bytes
				if($photo_size > (5*1024*1024) )
				{	
					$response = "<div align='center' class='alert alert-dismissable alert-danger'>
									<button class='close' data-dismiss='alert'>&times;</button>
									The File you are trying to upload is too large. maximum size allowed is 5mb!
								</div>";
				}
				else
				{
					if(!empty($photo_name))
					{
						$ext = pathinfo($photo_name, PATHINFO_EXTENSION);
						
						if($ext != 'PNG' && $ext != 'png' && $ext != 'JPG' && $ext != 'jpg' && $ext != 'JPEG' && $ext != 'jpeg')
						{
							//If wrong format of picture or video is selected
							$response = "<div align='center' class='alert alert-danger alert-dismissable'>
											<p align='center' style='color: #ff0000 !important;' >
												Sorry! File format not supported. Please choose a Photo (PNG, JPG and JPEG format)!
											</p>
										</div>";
						}
						else
						{
							$temp = explode(".",  $photo_name);
							$photo = md5(uniqid(time(),true)) . '.' . end($temp);
							move_uploaded_file($_FILES["Photo"]["tmp_name"], "../../files/images/slider/".$photo);
							$_SESSION["Photo"] = $photo;

							//Add Details to slide table
							$in = $crud->update("worker_slide", "ID", $editval,  
							array( 'UID'=>$uid,
									'Fname' => $fname,
									'Photo'=>$photo,
									'Title'=>$title
							) );

							if(!isset($in)){
								$response = "<div align='center' class='alert alert-warning alert-dismissable'>
											<p align='center' style='color: #ff0000 !important;' >
												Ooops! Worker slide not updated. Please try again later.</p>
											</p>
										</div>";
							}else{
								$response = "<div align='center' class='alert alert-dismissable alert-success'>
												<span> <b>Done!</b> Worker slide successfuly updated.</span>
											</div>";
							}
						}
					
					}//if(User chooses a photo ends here)
					else
					{
						$photo = $_POST["PhotoHolder"];

						//Add Details to slide table
						$in = $crud->update("worker_slide", "ID", $editval, 
						array( 'UID'=>$uid,
								'Fname' => $fname,
								'Photo'=>$photo,
								'Title'=>$title
						) );

						if(!isset($in)){
							$response = "<div align='center' class='alert alert-warning alert-dismissable'>
										<p align='center' style='color: #ff0000 !important;' >
											Ooops! Worker slide not updated. Please try again later.</p>
										</p>
									</div>";
						}else{
							$response = "<div align='center' class='alert alert-dismissable alert-success'>
											<span> <b>Done!</b> Worker slide successfuly updated.</span>
										</div>";
						}
						
					}
						
							
				}

			}
	
		
		break;




		
	//EDIT PRODUCT AND SERVICES
	case 14:

		$ipaddress = $_SERVER["REMOTE_ADDR"];
		$editval = $_POST["EDITVAL"]; 
		$pro_title= $_POST["ProductTitle"];
		$des = $_POST["Description"];
		$price = $_POST["Price"];
		$rrp = $_POST["RRP"];
	
		if( empty($des == TRUE) && empty($amt == TRUE) ) {

			$response = "<div class='alert alert-warning alert-dismissable'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p align='center' style='color: #ff0000 !important;' >
							Sorry! You left an empty space somewhere or an error occured.
						</p>
					</div>";
		}
		else{
			$checkupd = $crud->update("product", "Batch", $editval, 
			array(
					"ProductTitle"=>$pro_title,
					"Description"=>$des,
					"IPAddr"=>$ipaddress,
					"Price"=>$price,
					"RRP"=>$rrp
			));

			if($checkupd==false) {
				$response = "<div align='center' class='alert alert-dismissable alert-warning'>
								<button class='close' data-dismiss='alert'>&times;</button>
								Sorry! Your details could not be modified now. Please try again later.
							</div>";
			}	
			else{
				$response = "<div align='center' class='alert alert-dismissable alert-success'>
								<button class='close' data-dismiss='alert'>&times;</button>
								Done! Product details updated.
							</div>";	
				}	
		}
				
	
		break;
	
	











	default:
	break;


	}//SWITCH STATEMENT

}//IF EDIT CONDITION



/*
===========================================================================================================
									APPLY AND CANCEL JOB APPLICATION
============================================================================================================
*/

if(isset($_GET["apply-job"]) && $_GET["apply-job"] != "" )
{
	$crud = new Crud($connect);
	$Timenow = date("Y-m-d G:i:s");

	$app_job = $_GET["apply-job"];
	$jid = $_GET["xid"];
	$pid = $_GET["yid"];
	$fid = $_GET["zid"];
	$datez = $Timenow;
	$att_id = rand(00000, 99999); //md5(uniqid(time(),true));
	
	//$check = $crud->select("job_attach", "*", " JID = '".$job_id."' AND PID = '".$pid."' AND FID = '".$fid."' ");

	if($app_job == 2)
	{
			//$sql = "update yourTable set yourField = replace(replace(yourField, 'Prince', ''), '@@' , '@') where yourCondition";
		try 
		{	
			//Add Details to job_attach table
			$crud->insert("job_attach", 
			array( 
					'JID' => $jid,
					'PID' => $pid,
					'FID' => $fid,
					'AttachID' => $att_id,
					'AddedOn'=> $datez
			) );

			if($_SESSION["accesslevel"] == 1) {
				header("Location: ../admin/pages/dashboard?dil=job"); 
			}
			elseif($_SESSION["accesslevel"] == 3) {
				header("Location: ../members/pages/dashboard?dil=job"); }
			else{ }//Do Nothing
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();
		}
	}
	elseif($app_job == 1)
	{
			$sqlz = "DELETE FROM job_attach WHERE JID = '".$jid."' AND PID = '".$pid."' AND FID = '".$fid."' ";
			$q = $connect->prepare($sqlz);
			$q->execute();

			if($_SESSION["accesslevel"] == 1) {
				header("Location: ../admin/pages/dashboard?dil=job"); 
			}
			elseif($_SESSION["accesslevel"] == 3) {
				header("Location: ../members/pages/dashboard?dil=job"); }
			else{ }//Do Nothing
	}
	else{
		echo "";
	}
	
}



/*
===========================================================================================================
									ACCEPT JOB FROM FINDERS
============================================================================================================
*/

if(isset($_GET["accept-job"]) && $_GET["accept-job"] != "" )
{
	$crud = new Crud($connect);

	$jid = $_GET["xid"];
	$pid = $_GET["yid"];
	$aj = $_GET["accept-job"];

	//$check = $crud->select("advert", "*", " ID = '".$adv_id."' ");

	if($aj == 3)
	{
		$checkupd = $crud->update("product", "Batch", $editval, 
		array(
				"ProductTitle"=>$pro_title,
				"Description"=>$des,
				"IPAddr"=>$ipaddress,
				"Price"=>$price,
				"RRP"=>$rrp
		));
		$result = "UPDATE job_attach SET Apply = 2 WHERE PID = '".$pid."' AND JID = '".$jid."' ";
		$q = $connect->prepare($result); 
		$q->execute();
		
		header("Location: ../admin/pages/dashboard?dil=post-job");
	}
	elseif($aj == 2)
	{
		$result = "UPDATE job_attach SET Apply = 3 WHERE PID = '".$pid."' AND JID = '".$jid."' ";
		$q = $connect->prepare($result); 
		$q->execute();
		
		header("Location: ../admin/pages/dashboard?dil=post-job");
	}
	elseif($aj == 1)
	{
		$result = "UPDATE job_attach SET Apply = 2 WHERE PID = '".$pid."' AND JID = '".$jid."' ";
		$q = $connect->prepare($result); 
		$q->execute();
		
		header("Location: ../admin/pages/dashboard?dil=post-job");
	}
	else{
		echo "";
	}
	
	
}



/*
===========================================================================================================
									ACTIVATE AND DEACTIVATE ADVERTS
============================================================================================================
*/

if(isset($_GET["activate"]) && $_GET["activate"] != "" )
{
	$crud = new Crud($connect);

	$adv_id = $_GET["xid"];
	$act_val = $_GET["activate"];

	$check = $crud->select("advert", "*", " ID = '".$adv_id."' ");

	if($_GET["activate"] == 1)
	{
		if($check)
		{ 
			$result = "UPDATE advert SET Active = 2 WHERE ID = '".$adv_id."' ";
			$q = $connect->prepare($result); 
			$q->execute();
			
			header("Location: ../admin/pages/dashboard?dil=advert");
		}
		else{
			header("Location: ../confirm-account");
		}
	}
	elseif($_GET["activate"] == 2)
	{
		if($check)
		{
			$result = "UPDATE advert SET Active = 1 WHERE ID = '".$adv_id."' ";
			$q = $connect->prepare($result); 
			$q->execute();
			
			header("Location: ../admin/pages/dashboard?dil=advert");
		}
		else{
			header("Location: ../confirm-account");
		}
	}//elseif
	
}




/*
===========================================================================================================
						ADD/UPDATE SHOPPING CART WITH SESSION - HOMEPAGE
============================================================================================================
*/

if(isset($_POST["CART"]) && $_POST["CART"] != "" )
{
	$crud = new Crud($connect);
	$user_cl = new User($connect);
	$Timenow = date("Y-m-d H:i:s");

	//KEYS
	// 1 = Adds To Cart
	// 2 = Updates Cart's Quanity
	// 3 = Places Order

	//ADD's TO CART on the Home page and Product & Services page
	if($_POST["CART"] == 1 ){

		$batch = (int)$_POST["Batch"];
		$qty = (int)$_POST["Qty"];
		//$rrp = $_POST["RRP"];

		if(!empty($qty) && !empty($batch) && is_numeric($qty) && is_numeric($batch)){

			$check = $crud->select("product", "*", "Batch = '".$batch."' ");
			
			if ($check == TRUE) {
				// Product exists in database, now we can create/update the session variable for the cart
				if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
					if (array_key_exists($batch, $_SESSION['cart'])) {
						// Product exists in cart so just update the quanity
						$_SESSION['cart'][$batch] += $qty;
					} else {
						// Product is not in cart so add it
						$_SESSION['cart'][$batch] = $qty;
					}
				} else {
					// There are no products in cart, this will add the first product to cart
					$_SESSION['cart'] = array($batch => $qty);
				}
			}
			// Prevent form resubmission...
			header('location: product-services?dil=cart');
			//exit;
		}
	} 
	// UPDATE's Cart 
	elseif($_POST["CART"] == 2){ 

		if (isset($_SESSION['cart'])) {
			// Loop through the post data so we can update the quantities for every product in cart
			foreach ($_POST as $k => $v) {
				if (strpos($k, 'Qty') !== false && is_numeric($v)) {
					$batch = str_replace('Qty-', '', $k);
					$quantity = (int)$v;
					// Always do checks and validation
					if (is_numeric($batch) && isset($_SESSION['cart'][$batch]) && $quantity > 0) {
						// Update new quantity
						$_SESSION['cart'][$batch] = $quantity;
					}
				}
			}
			// Prevent form resubmission...
			header('location: product-services?dil=cart');
			exit;
		}
	}
	// Places Cart's Order 
	elseif($_POST["CART"] == 3){ 

		//User Details for registration - Check Email and Captcha
		$fname = $_POST["FName"];  
		$email = $_POST["Email"];  
		$pword1 = $_POST["Pword"];
		$salt = $user_cl->saltKeys(1);
		$alpha = $pword1.$salt;
		$pword = md5(sha1($alpha));
		$ipaddress = $_SERVER["REMOTE_ADDR"];
		$check_email = $crud->select("users", "*", "Email = '$email' ");

		if($check_email == TRUE)
		{
			 $response = "<div class='alert alert-danger alert-dismissable'>
							<button class='close' data-dismiss='alert'>&times;</button>
							<p align='center' style='color: #ff0000 !important;' >
								Sorry! The Email you entered already exists. Please use another.
							</p>
						</div>";
		}
		else
		{
			// Validate reCAPTCHA box 
			if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
			{ 
				// Google reCAPTCHA API secret key 
				$secretKey = $user_cl->googleKeys(1); 

				// Verify the reCAPTCHA response 
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
					
				// Decode json data 
				$responseData = json_decode($verifyResponse); 
					
				// If reCAPTCHA response is valid 
				if($responseData->success){ 

					// Check the session variable for products in cart
					$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
					$products = array();
					$subtotal = 0.00;
					$total = 0.00;
					// If there are products in cart
					if ($products_in_cart) {
						// There are products in the cart so we need to select those products from the database
						// Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
						$array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
						$stmt = $connect->prepare('SELECT * FROM product WHERE Batch IN (' . $array_to_question_marks . ') GROUP BY Batch');
						// We only need the array keys, not the values, the keys are the id's of the products
						$stmt->execute(array_keys($products_in_cart));
						// Fetch the products from the database and return the result as an Array
						$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

						//form values and auto generated
						$orderno = rand(000000, 999999);
						$tranxid  = uniqid(time(),true);
						$pay_name = $_POST["FName"]. " " .$_POST["SName"]; 
						//$email = $_POST["Email"]; 
						//$pword = $_POST["Pword"];
						$phone= $_POST["Phone"]; 
						$addr = $_POST["Addr"]; 
						$purplace = 1; // 1 = Homepage; 2 = Dashboard
						$uid = 0;
						
						foreach ($products as $product) {
							$total += (float)$product['Price'] * (int)$products_in_cart[$product['Batch']];
						}

						// Calculate the subtotal
						foreach ($products as $product) {
							$sub_total = (float)$product['Price'] * (int)$products_in_cart[$product['Batch']]; 

							//collect values from cart 1st
							$item_batch = $product['Batch'];
							$price = $product['Price'];
							$qty = $products_in_cart[$product['Batch']];

							//insert values from cart into DB
							$pay_res = $crud->insert("payment", 
							array( 'Batch'=>$item_batch,
									'Price'=>$price,
									'Qty'=>$qty,
									'SubTotal'=>$sub_total,
									'Total'=>$total,
									'OrderNo'=>$orderno,
									'TransactionID'=>$tranxid,
									'PayeeName'=>$pay_name,
									'Email'=>$email,
									'Purplace'=>$purplace,
									'UID'=>$uid,
									'IPAddress'=>$ipaddress,
									'AddedOn'=>$Timenow
							)	);
						}

						//Response from payment details insertion
						if(!$pay_res)
						{
							if($purplace == 2) {
								$response = "<div class='alert alert-danger alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;'>
													It looks like something went wrong.<br>
													Please try again later
												</p>
											</div>";
							}else{
								$response = "<div class='alert alert-danger alert-dismissable'>
												<p align='center' style='color: #ff0000 !important;'>
													It looks like something went wrong.<br>
													Please try again later
												</p>
											</div>";
							}
						}
						else
						{ 
							//If adding of values to payments is successful
							//insert values into an users table
							$cal = $crud->insertWithReturnValue("users", 
							array('Fname'=> $fname,
								'Uname' => $fname,
								'Email'=>$email,
								'Pword'=>$pword,
								'AllowUser'=>$user_cl->saltKeys(2),
								'IPAddr'=> $ipaddress
							) );

							if(!$cal)
							{
								$response = "<div class='alert alert-danger alert-dismissable'>
												<button class='close' data-dismiss='alert'>&times;</button>
												<p align='center' style='color: #ff0000 !important;'>
													It looks like something went wrong while submitting your form. Please try again later
												</p>
											</div>";
							}
							else
							{
								//Add Details to members table
								$crud->insert("members", 
								array( 'UID'=>$cal,
										'Fname' => $fname,
										'Uname' => $fname,
										'Email' => $email,
										'IPAddr'=> $ipaddress,
										'Pword'=>$pword
								));
								
								//Add Details to profile table
								$crud->insert("profile", 
								array( 'UID'=>$cal,
										'Email' => $email
								));

								//After successful registration using users details - Proceed to checkout
								if($purplace == 1) {
									//if trxn is from Homepage
									header("location: product-services?dil=checkout&trxnid=$tranxid&ordno=$orderno");
								}
								elseif($purplace == 2){
									//If trxn is from Dashboard == NOT USED
									header('location: ../../dashboard/product-services?dil=checkout');
								}else{"";}//do nothing
								//header("Location: https://paystack.com");//payment gateway redirect
							}
						}
					}
				}else{ 
					$response = "<div class='alert alert-danger alert-dismissable'>
									<button class='close' data-dismiss='alert'>&times;</button>
									<p align='center' style='color: #ff0000 !important;'>
										Robot verification failed, please try again.
									</p>
								</div>";
				} 
			}else{ 
				$response = "<div class='alert alert-danger alert-dismissable'>
								<button class='close' data-dismiss='alert'>&times;</button>
								<p align='center' style='color: #ff0000 !important;'>
									Please confirm you are human by checking \"I'm not a robox\" box.
								</p>
							</div>";
			} 
		}
	}
}



/*
===========================================================================================================
									REMOVE FROM SHOPPING CART
============================================================================================================
*/

if(isset($_GET["cart"]) && $_GET["cart"] !="" )
{
	$crud = new Crud($connect);

	//Keys
	// cart is 1 = Remove
	// Cart is 2 = Empty

	$cart = $_GET["cart"];
	$batch = $_GET["rem"]; //batch no

	//=================================================
	// Remove product from cart, check for the URL param "remove", this is the product id, 
	//make sure it's a number and check if it's in the cart
	//=================================================

	if( $cart == 1 && !empty($batch) )
	{
		if (is_numeric($batch) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$batch])) {
			// Remove the product from the shopping cart
			unset($_SESSION['cart'][$batch]);
		}
		
		header('location: ../product-services?dil=cart');
	}
	elseif($cart == 2)
	{
		/* DESTROY SESSION or EMPTYS CART */
			
		//session_start() == "NULL" ? session_destroy() : "";
		
		if(isset($_SESSION['cart']))
		{
			session_destroy();
		}
		header('location: product-services');
	}	
}



/*
===========================================================================================================
						IF PAYMENT OF ITEM IS SUCCESSFUL
============================================================================================================
*/

if(isset($_GET["reference"]) && !empty($_GET["reference"]) && isset($_GET["ordno"]) && !empty($_GET["ordno"]))
{
	$crud = new Crud($connect);
	$user_cl = new User($connect);
	$Timenow = date("Y-m-d H:i:s");

	//collect variables
	$refid = $_GET["reference"];
	$trxnid = isset($_GET["trxnid"]) ? $_GET["trxnid"] : 0;
	$ordno = isset($_GET["ordno"]) ? $_GET["ordno"] : 0;
	$paystackKey_sec = $user_cl->payStack(2);

	//K E Y S
	//purplace 1 = Homepage
	//Purplace 2 = Dashboard
	$purplace = (isset($_GET["purplace"]) && ($_GET["purplace"] == 2)) ? 2 : 1;
	
	//accesslevel
	if(isset($_GET["acclev"]) && $_GET["acclev"] == 1){
		$acclev = 1; //Admin
	}elseif(isset($_GET["acclev"]) && $_GET["acclev"] == 2){
		$acclev = 2; //SubAdmin
	}elseif(isset($_GET["acclev"]) && $_GET["acclev"] == 3){
		$acclev = 3; //Member
	}else { 
		$acclev = 0; //visitor
	}


	//======================================
	//Verify transaction
	//=======================================
    $curl = curl_init();
  
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($refid),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$paystackKey_sec,
        "Cache-Control: no-cache",
      ),
    ));
	
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $result = json_decode($response);
    }

    if($result->data->status == "success"){

        $status = $result->data->status;

		if(isset($refid) && isset($ordno) ){

			$check_auth = $crud->select("payment", "*", "OrderNo = '".$ordno."' ");

			if($check_auth == TRUE){

				$trxnid = $check_auth[0]["TransactionID"];
				$uid = $check_auth[0]["UID"];
				$item_batch = $check_auth[0]["Batch"];
				$pay_name = $check_auth[0]["PayeeName"];
				$email = $check_auth[0]["Email"];
				$price = $check_auth[0]["Price"];
				$qty = $check_auth[0]["Qty"];
				$sub_total = $check_auth[0]["SubTotal"];
				$total = $check_auth[0]["Total"];
			
				//insert values from cart into DB
				$place_ord = $crud->insert("placed_order", 
				array('OrderNo'=>$ordno,
						'UID'=>$uid, 
						'Batch'=>$item_batch,
						'PayeeName'=>$pay_name,
						'Email'=>$email,
						'Price'=>$price,
						'Qty'=>$qty,
						'SubTotal'=>$sub_total,
						'Total'=>$total,
						'TransactionID'=>$trxnid,
						'RefID'=>$refid,
						'AddedOn'=>$Timenow
				)	);

				//update payment table
				$upd_pymt = $crud->update("payment", "TransactionID", $trxnid, 
				array(
						"TellerID"=>"Paid",
						"RefID"=>$refid,
						"PaymentStatus"=>4
				));
					
				//send Email to client's email address
				$to = $email;
				$subject = "Your Order on DilyasTrend";
				//$url = urlencode("www.dilyastrend.com/forgot-password?userconfirm=".$recover."&email=".$_POST["Email"]);
				//$randomz = sha1(md5("forgotpasswordforDILYASTREND"));
				
				$message = "
						<div align='center'>
						<img src='www.dilyastrend.com/assets/images/dilyastrend-main4.jpeg' height='200' alt='DILYASTREND' />
						</div><br/><br/><br/>

						Dear $pay_name, <br/>
					You placed an order on DilyasTrend. 
					A payment was successfully completed with your DilyasTrend account, and here is the summary of the transaction: <br><br>
					
					<div style='display: inline'>
						<spa style='text-align: left'>Order No:</span>
						<spa style='text-align: right'><b>$ordno</b></span><br/>
					
						<spa style='text-align: left'>Transaction ID:</span>
						<spa style='text-align: right'><b>$trxnid</b></span><br/>
					
						<spa style='text-align: left'>Reference No:</span>
						<spa style='text-align: right'><b>$refid</b></span><br/>
					
						<spa style='text-align: left'>Amount of the transaction:</span>
						<spa style='text-align: right'><b>$total</b></span>
					</div>
					<br><br>

					<p>If you have any questions about this payment, please fill our <a href='dilyastrend.com'>Contact-Us</a> form at the bottom section of our homepage.</p>
					<p>To make things easier, please include the reference number: $refid and order number: $ordno. In case of a refund, it is processed to your Dilyastrend Account or Bank Account.</p>
					<br>

					<p>Thank you for using Dilyastrend, the safest and most convenient method to get things done in Nigeria.</p><br><br>

					<p>Dilyastrend Team</p> <br><br>
					
					<b>DILYASTREND - Connecting You</b><br>
					www.dilyastrend.com<br/><br/>

					<hr/>

					<small>
						<p>
							The information contained in this message is intended solely for the individual to whom thier email is found above. This message and its contents may contain confidential or privileged information from DILYASTREND. If you are not the intended recipient, you are hereby notified that any disclosure or distribution, is strictly prohibited. If you receive this email in error, please notify DILYASTREND immediately and delete it. DILYASTREND does not accept any liability or responsibility if action is taken in reliance on the contents of this information. Note that all personal emails are not authorized by DILYASTREND.
						</p>
						<a href='www.dilyastrend.com/terms-and-condition'>Terms and conditions</a> &nbsp;&nbsp;
						<a href='www.dilyastrend.com/privacy'>Privacy</a>
					</small>
					";

					//send email
					SendMail($to, $subject, $message);

					//Empties cart
					if($place_ord && $upd_pymt) {
						if($purplace == 2) {

							// $del_cart_item = "DELETE FROM cart WHERE UID IN ('".$uid."') AND Batch IN ('".$batch."') ";
							// $q = $connect->prepare($del_cart_item);
							// $q->execute();

							$sqlz = "DELETE FROM cart WHERE UID = '".$uid."' ";
							$q = $connect->prepare($sqlz);
							$q->execute();

							//redirect to payment confirmation page
							if(isset($acclev) && $acclev = 1){
								header("Location: ../admin/pages/dashboard?dil=verify_transaction&reference=$refid&ordno=$ordno");
							}elseif(isset($acclev) && $acclev = 3){
								header("Location: ../members/pages/dashboard?dil=verify_transaction&reference=$refid&ordno=$ordno");
							}else{}

						}else{
							if(isset($_SESSION['cart'])){
								isset($_SESSION['cart']) ? session_destroy() : "";
								//unset($_SESSION['cart'][$batch]);
								//session_destroy();

								//redirect to payment confirmation page
								header("Location: ../product-services?dil=verify_transaction&reference=$refid&ordno=$ordno");
							}
						}
					}else{
						//redirect to payment confirmation page
						$response = "Payment was completed but an error occured while placing your order. Payment table was not updated, Sending payment confirmation to emails was not unsuccessful";

						if(isset($acclev) && $acclev = 1){
							header("Location: ../admin/pages/dashboard?dil=verify_transaction&reference=$refid&ordno=$ordno&resp=$response");
						}elseif(isset($acclev) && $acclev = 3){
							header("Location: ../members/pages/dashboard?dil=verify_transaction&reference=$refid&ordno=$ordno&resp=$response");
						}else{}
					}
			}
		} 
		else{ // Sends user away! Payment not completed ?>
			<!-- <script>
				alert('Transaction Failed! Order not placed.');
			</script> -->

			<?php 
				if(isset($purplace) && $purplace == 2) {
					if(isset($acclev) && $acclev = 1){
						header("Location: ../admin/pages/dashboard?dil=cart");
					}elseif(isset($acclev) && $acclev = 3){
						header("Location: ../members/pages/dashboard?dil=cart");
					}
				}else{
					header('location: ../product-services?dil=cart'); 
				}
		}

	}
	else{
		header("Location: ../confirm-account?response=$result");
	}

}


/*===========================================================================================================
								CART SYSTEM FOR HOMEPAGE ENDS
============================================================================================================*/





/*
===========================================================================================================
								CART SYSTEM FOR DASHBOARD BEGINS
============================================================================================================
*/

if(isset($_POST["DASHCART"]) && $_POST["DASHCART"] != "" )
{
	$crud = new Crud($connect);
	$user_cl = new User($connect);
	$Timenow = date("Y-m-d H:i:s");

	//KEYS
	// 1 = Adds To Cart
	// 2 = Updates Cart's Quanity
	// 3 = Places Order


	//ADD's TO CART on the Dashboard for Product & Services page
	if($_POST["DASHCART"] == 1 ){
		
		$batch = (int)$_POST["Batch"];
		$qty = (int)$_POST["Qty"];
		$uid = (int)$_POST["UID"];
		$price = (float)$_POST["Price"];
		$total = $price * $qty;

		if(!empty($qty) && !empty($batch)&& !empty($uid) && is_numeric($qty) && is_numeric($batch) && is_numeric($uid)){
			//check product exists in database
			$check = $crud->select("product", "*", "Batch = '".$batch."' ");

			if ($check == TRUE) {
				// Product exists in database, create/update the variables for the cart
				$check_cart = $crud->select("cart", "*", "Batch = $batch AND UID = $uid ");

				if ($check_cart == TRUE) {
					//update cart if item already in cart
					// add new value to existing one
					$qty_old = (int)$check_cart[0]["Qty"];
					$price_n = (float)$check_cart[0]["Price"];
					$qty += $qty_old;
					$total_new = $qty * $price_n;

					$result = "UPDATE cart SET Qty = $qty, Total = $total_new WHERE Batch = $batch AND UID = $uid ";
					$q = $connect->prepare($result); 
					$q->execute();

				} else {
					// There are no products in cart, this will add the first product to cart
					$in = $crud->insert("cart", 
					array( 'UID'=>$uid,
							'Batch' => $batch,
							'Qty'=>$qty,
							'Price'=>$price,
							'Total'=>$total,
							'AddedOn'=>$Timenow
					) );
				}
			}
			// Prevent form resubmission...
			header("location: dashboard?dil=cart");
			exit;
		}
	} 
	// UPDATE's Cart 
	elseif($_POST["DASHCART"] == 2){ 
		
		$batch = (int)$_POST["Batch"];
		$qty = (int)$_POST["Qty"];
		$uid = (int)$_POST["UID"];
		// $price = (float)$_POST["Price"];
		// $total = $price * $qty;
		
		if(!empty($qty) && !empty($batch)&& !empty($uid) && is_numeric($qty) && is_numeric($batch) && is_numeric($uid)){
			//check product exists in database
			$check = $crud->select("product", "*", "Batch = '".$batch."' ");
			
			if ($check == TRUE) {
				// Product exists in database, create/update the variables for the cart
				$check_cart = $crud->select("cart", "*", "Batch = $batch AND UID = $uid ");
				
				if ($check_cart == TRUE) {
					//update qty of of item in cart
					//$resp = var_dump($check_cart);
					// $items = array();
					// foreach($_POST as $k=>$v) {
					// 	$items[] = $username;
					// }

					foreach ($_POST as $k => $v) {
						$batch = (int)$k;
						$qty = (int)$v;

						$result = "UPDATE cart SET Qty = $qty WHERE Batch = $batch AND UID = $uid ";
						$q = $connect->prepare($result); 
						$q->execute();
						var_dump($batch);	
					}					
					//update($table, $column, $id, $vmk=array())
					// $upd = $crud->update("cart", "UID", $editval, 
					// array("Fname"=>$fname,
					// 		"IPAddr"=>$ipaddress ));
				} 
			}
			// Prevent form resubmission...
			//header("location: dashboard?dil=cart");
		}
	}
	// Places Cart's Order 
	elseif($_POST["DASHCART"] == 3){ 

		$batch = $_POST["Batch"];
		$qty = (int)$_POST["Qty"];
		$uid = $_POST["UID"];
		$price = (Float)$_POST["Price"];
		$subtotal = $_POST["SubTotal"]; // This swaps with total
		$total = $price * $qty; // This swaps with subtotal
		$email = $_POST["Email"];

		if(!empty($qty) && !empty($batch)&& !empty($uid) && is_numeric($qty) && is_numeric($batch) && is_numeric($uid)){
			//check product exists in database
			$check = $crud->select("product", "*", "Batch = '".$batch."' ");
			
			if ($check == TRUE) {
				// Product exists in database, create/update the variables for the cart
				$check_cart = $crud->select("cart", "*", "Batch = $batch AND UID = $uid ");
				
				if ($check_cart == TRUE) {

					//form values and auto generated
					$orderno = rand(000000, 999999);
					$tranxid  = uniqid(time(),true);
					$pay_name = $_POST["Fname"]. " " .$_POST["Sname"]; 
					$phone= $_POST["Phone"]; 
					$addr = $_POST["Addr"]; 
					$purplace = 2; // 1 = Homepage; 2 = Dashboard
					
					//IMPORTANT !!!
					//================================================
					//HERE: SUBTOTAL IS TOTAL, WHILE TOTAL IS SUBTOTAL
					//================================================
					$sub_total = $total;
					$total = $subtotal;
					
					//insert values from cart into payment
					$pay_res = $crud->insert("payment", 
					array( 'Batch'=>$batch,
							'Price'=>$price,
							'Qty'=>$qty,
							'SubTotal'=>$sub_total,
							'Total'=>$total,
							'OrderNo'=>$orderno,
							'TransactionID'=>$tranxid,
							'PayeeName'=>$pay_name,
							'Email'=>$email,
							'Purplace'=>$purplace,
							'UID'=>$uid,
							'IPAddress'=>$ipaddress,
							'AddedOn'=>$Timenow
					)	);

					//Response from payment details insertion
					if(!$pay_res)
					{
						$response = "<div class='alert alert-danger alert-dismissable'>
										<p align='center' style='color: #ff0000 !important;'>
											It looks like something went wrong.<br>
											Please try again later
										</p>
									</div>";
					}
					else
					{ 
						header("location: dashboard?dil=checkout&trxnid=$tranxid&orderno=$orderno");
					}

				}
			}
		

		}
		

	}
	
}



/*
===========================================================================================================
									REMOVE FROM SHOPPING CART
============================================================================================================
*/

if(isset($_GET["dashcart"]) && $_GET["dashcart"] !="" )
{
	$crud = new Crud($connect);

	//Keys
	// cart is 1 = Remove
	// Cart is 2 = Empty

	$cart = $_GET["dashcart"];
	$batch = $_GET["batch"];
	$uid = $_GET["uid"];
	$acc_lev = $_GET["acclev"];

	//=================================================
	// Remove product from cart, check for the URL param "remove", this is the product id, 
	//make sure it's a number and check if it's in the cart
	//=================================================

	if( $cart == 1 && !empty($batch) && !empty($uid))
	{
		if (is_numeric($batch) && isset($uid) && isset($acc_lev)) {
			
			// Remove the product from the shopping cart
			if(isset($acc_lev) && $acc_lev == 1) {
				$del_cart_item = "DELETE FROM cart WHERE UID ='".$uid."' AND Batch = '".$batch."' ";
				$q = $connect->prepare($del_cart_item);
				$q->execute();

				// $sqlz = "DELETE FROM cart WHERE Batch = '".$batch."' AND UID = '".$uid."' ";
				// $q = $connect->prepare($sqlz);
				// $q->execute();

				header('location: ../admin/pages/dashboard?dil=cart');

			}elseif(isset($acc_lev) && $acc_lev == 3){
				$del_cart_item = "DELETE FROM cart WHERE UID ='".$uid."' AND Batch = '".$batch."' ";
				$q = $connect->prepare($del_cart_item);
				$q->execute();

				header('location: ../members/pages/dashboard?dil=cart');
			}
		
		}
		
	}
	elseif($cart == 2)
	{
		/* DESTROY SESSION or EMPTYS CART */
			
		//session_start() == "NULL" ? session_destroy() : "";
		
		if(isset($_SESSION['cart']))
		{
			session_destroy();
		}
		header('location: ../confirm-account');
	}	
}



/*
===========================================================================================================
								CART SYSTEM FOR DASHBAORD ENDS
============================================================================================================
*/







/*
===========================================================================================================
									UPDATE TRACKING FOR ADMINS
============================================================================================================
*/

if(isset($_POST["TRACKING"]) && $_POST["TRACKING"] != "" )
{
	$crud = new Crud($connect);
	$Timenow = date("Y-m-d H:i:s");

	$id = 0;
	$batch = 0;
	$ord_no = 0;
	$values = $_POST["Tracking"];
	list($id,$batch,$ord_no) = explode('|', $values);
	// $id = $sep[0];
	// $batch = $sep[1];

	$sel = $crud->select("placed_order", "*", " Batch = $batch ");

	if($sel)
	{	//update track status
		$result = "UPDATE placed_order SET Tracking = $id WHERE Batch = $batch AND OrderNo = $ord_no ";
		$q = $connect->prepare($result); 
		$q->execute();

		//update action time
		$upd_del_date = $crud->update("placed_order", "OrderNo", $ord_no, 
		array(
				"History"=>$Timenow
		));

		// if($id == 5){
		// 	$delv_date = $Timenow;
		// 	$delv_time = "UPDATE placed_order SET DeliveredOn = $delv_date WHERE Batch = $batch AND OrderNo = $ord_no ";
		// 	$q = $connect->prepare($delv_time); 
		// 	$q->execute();
		// 	var_dump($del_time);
		// }

		if(!$q && !$upd_del_date){
			$response = "<div align='center' class='alert alert-dismissable alert-warning'>
							<button class='close' data-dismiss='alert'>&times;</button>
							Sorry Admin! something went wrong during update.
						</div>";
		}
	}
	else
	{
		$response = "<div align='center' class='alert alert-dismissable alert-warning'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Ooops.. Admin, something is missing.
					</div>";
	}
	
}








/*
===========================================================================================================
									DELETE PRODUCT BY ADMIN
============================================================================================================
*/

if(isset($_GET["remproduct"]) && $_GET["remproduct"] !="" )
{
	$crud = new Crud($connect);

	$rem = $_GET["remproduct"];
	$batch = $_GET["batch"];
	// $uid = $_GET["uid"];
	$acc_lev = $_GET["acclev"];

	if( $rem == 1){ // checks type of command from user
		// checks data type
		if (is_numeric($batch) && is_numeric($acc_lev)) { 

			// checks whether user is an Admin
			if(isset($acc_lev) && $acc_lev == 1) {

				$del_cart_item = "DELETE FROM product WHERE Batch = '".$batch."' ";
				$q = $connect->prepare($del_cart_item);
				$q->execute();

				header('location: ../admin/pages/dashboard?dil=product');

			}else{
				header('location: ../confirm-account');
			}
		
		}else{
			header('location: ../confirm-account');
		}
	}
	elseif($rem == 2){
		/* DESTROY SESSION or EMPTYS CART */
			
		//session_start() == "NULL" ? session_destroy() : "";
		
		// if(isset($_SESSION['cart']))
		// {
		// 	session_destroy();
		// }
		// header('location: ../confirm-account');
	}	
}







/*
===========================================================================
RANDOMS
============================================================================
*/

function FetchTableContent($i)
{
	/*
	Fetchtable content List

	1. fetch audit trail messages for dashboard
	2. fetch audit trail messages for audit trail page
	3. total count of all users
	4. total count of all registered users
	5. total count of all admin users
	6. fetch all users
	17. Fetch General Settings
	*/ 

	global $connect;
	$crud = new Crud($connect);

	switch ($i) {

		//select all users
		case 1:
			$data = $crud->select("users","*","", "ID DESC");
			return $data;
			break;

		//select all row from saint
		case 2:
			$data = $crud->select("event","*", "", "ID DESC");
			return $data;
			break;

		//select all row from saint
		case 3:
			$data = $crud->select("admin","*", "", "ID DESC");
			return $data;
			break;

		//select all row from saint
		case 4:
			$data = $crud->select("guest","*", "", "ID DESC");
			return $data;
			break;

		//fetch audit trail messages for dashboard
		case 8:
			$data = $crud->select("gallery p",
					"p.*, k.Album, k.ID ",
					"",
					" p.ID DESC ", 
					" LEFT JOIN album k on p.Album = k.ID ");
			return $data;
			break;

		//select all row from advert
		case 9:
			$data = $crud->select("advert","*", "", "ID DESC");
			return $data;
			break;

		//select total unique users from general_log table
		case 10:
			$data = $crud->select("general_log","COUNT(ID) as Total", "", "ID DESC");
			return $data[0]["Total"];
			break;
		
		//select total clicks from general_log table
		case 11:
			$data = $crud->select("general_log","SUM(Visit) as Total", "", "ID DESC");
			return $data[0]["Total"];
			break;

		//select total unique user clicks from general_log table(For Individual Dashboards)
		case 12:
			$data = $crud->select("general_log","COUNT(Visit) as Total", "", "ID DESC");
			return $data[0]["Total"];

		//select all row from Audit Log
		case 13:
			$data = $crud->select("audit_log","*", "", "COUNT(ID) DESC", "UserID");
			return $data;
			break;

		//select total unique users from general_log table
		case 14:
			$data = $crud->select("users","COUNT(ID) as Total", "", "ID DESC");
			return $data[0]["Total"];
			break;
		
		//fetch general settings - used
		case 17:
			$data = $crud->select("general_settings", "*");
			return $data;
		break;
		
		//select all row from advert
		case 18:
			$data = $crud->select("product","*", "", "ID DESC");
			return $data;
			break;

		//count all transaction
		case 19:
			$data = $crud->select("payment","COUNT(ID) as Total", "", "ID DESC");
			return $data[0]["Total"];
			break;

		//count total successful transactions
		case 20:
			$data = $crud->select("payment","COUNT(ID) as Total", "PaymentStatus = 4 AND TellerID = 'Paid' ");
			return $data[0]["Total"];
			break;

		//count total pending transactions
		case 21:
			$data = $crud->select("payment","COUNT(ID) as Total", "PaymentStatus = 2 || PaymentStatus = 5 ");
			return $data[0]["Total"];
			break;

		//count total failed transactions
		case 22:
			$data = $crud->select("payment","COUNT(ID) as Total", "PaymentStatus = 1 ");
			return $data[0]["Total"];
			break;
		
		//select all row from payment
		case 23:
			$data = $crud->select("payment","*", "", "ID DESC");
			return $data;
			break;

		//sum up total amount
		case 24:
			$data = $crud->select("payment","SUM(Total) as Total", "", "ID DESC");
			return $data[0]["Total"];
			break;

		//sum all successful transactions
		case 25:
			$data = $crud->select("payment","SUM(Total) as Total", "PaymentStatus = 4 AND TellerID = 'Paid' ");
			return $data[0]["Total"];
			break;

		//sum all pending transactions
		case 26:
			$data = $crud->select("payment","SUM(Total) as Total", "PaymentStatus = 2 || PaymentStatus = 5 ");
			return $data[0]["Total"];
			break;

		//sum all failed transactions
		case 27:
			$data = $crud->select("payment","SUM(Total) as Total", "PaymentStatus = 1 ");
			return $data[0]["Total"];
			break;
		
		//select all row from payment
		case 28:
			$data = $crud->select("placed_order","*", "", "ID DESC");
			return $data;
			break;





		
		default:
			# code...
			break;
	}
}





function FetchIndividualContent($i, $sid)
{
	/*
	Fetchindividual content List

	1. fetch users
	2. fetch specific user's details for everybody - Used
	3. fetch posted Feeds for Editting - Used

	*/ 
	global $connect;
	$crud = new Crud($connect);

	switch ($i) {

		//fetch specific user's details for everybody - Used
		case 2:

			$data = $crud->select("users","*"," ID = '$sid' ");
			return $data;
			break;

		//fetch specific event for editing - Used
		case 3:

			$data = $crud->select("event","*"," ID = '$sid' ");
			return $data;
			break;

		//fetch specific from blog - Used
		case 4:

			$data = $crud->select("blog","*"," ID = '$sid' ");
			return $data;
			break;

		//fetch specific user's details for everybody - Used
		case 6:

			$data = $crud->select("admin","*"," UID = '$sid' ");
			return $data;
			break;

			//count all specific comment in blog - used
		case 7:
			$data = $crud->select("blog_com",
								"COUNT(ComID) as Total ",
								"BlogID = '$sid' ",
								"");
			return $data[0]["Total"];
			break;

		//fetch specific guests message - Used
		case 8:

			$data = $crud->select("guest","*"," ID = '$sid' ");
			return $data;
			break;					

		//fetch specific music for editing - Used
		case 16:

			$data = $crud->select("advert","*"," ID = '$sid' ");
			return $data;
			break;

		//fetch specific guests message - Used
		case 17:

			$data = $crud->select("audit_log","*"," UserID = '$sid' ");
			return $data;
			break;

		//fetch all rows where UserID = 0, same with all with IPAddress
		case 18:

			$data = $crud->select("audit_log","*"," UserID = 0 ");
			return $data;
			break;

		//fetch all rows where UserID = 0, same with all with IPAddress
		case 19:

			$data = $crud->select("profile","*"," UID = '$sid' ");
			return $data;
			break;

		//fetch all jobs from job where ID = $sid
		case 20:

			$data = $crud->select("job","*"," ID = '$sid' ");
			return $data;
			break;

		//fetch all product where User = User
		case 21:

			$data = $crud->select("product","*"," CreatedBy = '$sid' ", "ID DESC");
			return $data;
			break;

		//fetch all product where User = User
		case 22:

			$data = $crud->select("product","*"," Batch = '$sid' ", "ID ASC");
			return $data;
			break;



		default:
			# code...
			break;
	}
}



//FETCH CONTENTS WITH MULTIPLE ARGUMENTS
	//ARGUMENT KEY
	// $i = switch number
	// $a = 1st arg
	// $b = 2nd arg
	// $c = 3rd arg

function FetchWithMultipleArgs($i, $a, $b=NULL, $c=NULL)
{
	global $connect;
	$crud = new Crud($connect);

	switch ($i) {

		//fetch product using batch and UID
		case 1:

			$data = $crud->select("product","*"," Batch = '$a' AND CreatedBy = '$b'", "ID ASC");
			return $data;
			break;

		//fetch cart using batch and UID
		case 2:

			$data = $crud->select("cart","*"," UID = $a ", "ID ASC");
			return $data;
			break;

		//fetch cart using batch and UID
		case 3:

			$data = $crud->select("cart","*"," UID = '$a' AND Batch = '$b'", "ID ASC");
			return $data;
			break;

		//count items in cart
		case 4:
			$data = $crud->select("cart","COUNT(ID) as Total", " UID = $a ");
			return $data[0]["Total"];
			break;

		//sum all amount in cart
		case 5:
			$data = $crud->select("cart","SUM(Total) as Total", "UID = $a ");
			return $data[0]["Total"];
			break;



		default:
			# code...
			break;
	}
}




function GetUserPhoto($uid)
{
	global $connect;
	$crud = new Crud($connect);

	$pp = FetchIndividualContent(2, $uid);

	if(isset($pp[0]["Photo"])){

		//$dd = $crud->AnyContent("Photo", "users", "ID", $uid);
		$data = "<img src='../files/images/profilepics/".$pp[0]["Photo"]."' width='60' height='60' class='pull-left thumbnail' ";
	}
	else{
		$data = "<img src='../files/images/profilepics/default.png' width='60' height='60' class='pull-left thumbnail' ";
	}

	return $data;
}


function GetUserPhoto2($uid)
{
	global $connect;
	$crud = new Crud($connect);

	$pp = FetchIndividualContent(2, $uid);

	if(isset($pp[0]["Photo"])){

		//$dd = $crud->AnyContent("Photo", "users", "ID", $uid);
		$data = "<img src='../files/images/profilepics/".$pp[0]["Photo"]."' width='60' height='60' class='pull-left thumbnail' ";
	}
	else{
		$data = "<img src='../files/images/profilepics/default.png' width='60' height='60' class='pull-left thumbnail' ";
	}

	return $data;
}


//this puts numbers in international format for nigeria
function MakePhoneNumberInt($thenumber)
{
	$dff = substr($thenumber, 0, 1);
	$dff2 = substr($thenumber, 0, 3);
	if($dff=="+")
	{
		return $thenumber;
	}
	else if($dff == "0")
	{
		return "234".substr($thenumber, 1);
	}
	else if($dff2 == "234")
	{
		return $thenumber;
	}
}	



//this sends mails
function SendMail($to, $subject, $message)
{
	global $connect;
	$crud = new Crud($connect);
   // global $connect, $database_connect;

    if(isset($to) && $to !="")
    {
        $mail = new PHPMailer();

        $sendername= "DILYASTREND";
        $senderemail = "info@dilyastrend.com";
        $to = $to;
        $subject = $subject;

        $themails = explode(",", $to);
        for ($i=0; $i <count($themails) ; $i++) { 
          $mail->AddAddress($themails[$i]);
        }

        $MessageHead =   "<img src=\"cid:fx\" /> <br><br>";
        $Message = $MessageHead . $message;

        $mail->From = $senderemail;
        $mail->FromName = $sendername;
        
        $mail->AddReplyTo('info@dilyastrend.com', 'DILYASTREND');
        $mail->AddEmbeddedImage("../assets/images/dilyastrend-logo1.jpg", 'DILYASTREND'); 
        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $Message; //for html capable clients
        //$mail->AltBody = $bodyPlainText; //for plain text clients

        if(!$mail->Send())
        {
          // echo "<p style='font-size:18px'>" . "<h2 style='color:red;'>Sorry!</h2><br> A problem occurred and your email could not be sent please try again later" . "</p>";
           //echo "Mailer Error: " . $mail->ErrorInfo;
          // echo "to is " . $to;
           //exit;
        	return false;
        }
        else
        {
        	return true;
        }
    }

}


// send a message
function Logtransaction($transtype, $amount, $description, $affects, $addedby)
{
	global $connect;
    $crud = new Crud($connect);

    $TransactionType = $transtype;
    $Amount = $amount;
    $ItemDescription = $description;
    $Affects = $affects;
    $EnteredBy = $addedby;
    $EnteredOn	= date("Y-m-d G:i:s");


    	
	$crud->insert("transactions", array("TransactionType" => $TransactionType,
	    								"Amount" => $Amount,
	    								"ItemDescription" => $ItemDescription,
	    								"Affects"=>$Affects,
	    								"EnteredBy"=>$EnteredBy,
	    								"EnteredOn"=>$EnteredOn
	    								));
}


// credit a user
function Credit($userid, $amount)
{
	global $connect;
    $crud = new Crud($connect);

    $cash =  $_SESSION["Wallet"] + $amount;
	$crud->update("users", "ID", $userid, 
				 array("WalletBalance" => $cash
	    		 ));

	return $cash;
}


// debit a user
function Debit($userid, $amount)
{
	global $connect;
    $crud = new Crud($connect);

    $cash =  $_SESSION["Wallet"] - $amount;
	$crud->update("users", "ID", $userid, 
				 array("WalletBalance" => $cash
	    		 ));

    return $cash;
}



// fetch system admin emails
function FetchAdminEmails()
{
	global $connect;
    $crud = new Crud($connect);
    $row = $crud->select("admin_emails", "GROUP_CONCAT(Email separator ', ') as AdminEmails", "IsActive ='1'" );
    return $row[0]["AdminEmails"];
}

// fetch system admin emails
function FetchAdminIDs()
{
	global $connect;
    $crud = new Crud($connect);
    $row = $crud->select("users", "GROUP_CONCAT(ID separator ', ') as AdminIDs", "AccessLevel ='1'" );
    return $row[0]["AdminIDs"];
}




?>