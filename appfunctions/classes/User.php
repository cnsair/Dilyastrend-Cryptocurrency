<?php 

class User
{
	   private $conn;
	 
	   public function __construct($connectionObject)
			{
				$this->conn = $connectionObject;
			}
	 

	   //================================================
		//			Forgot Password
		//================================================
	   public function ForgotPassword($email)
	    {
	       try
	       {
	       	  $activationcode = $this->ActivationCode(62);
	          $q = $this->conn->prepare("SELECT * FROM users WHERE Email=:email LIMIT 1");
	          $q->execute(array(':email'=>$email));
	          $prow = $q->fetch(PDO::FETCH_ASSOC);
	          if($q->rowCount() > 0)
	          {
	          	 $q = $this->conn->prepare("UPDATE users SET ActivationCode=:activationcode WHERE Email=:email");
	          	 $q->execute(array(':activationcode'=>$activationcode, 
				   					':email'=>$email));

				  $acclev = $prow["AccessLevel"];
				  $fname = $prow["Fname"];
				  $id = $prow["ID"];

	             return $activationcode."&xid=".$id."&name=".$fname;
	          }
	          else
	          {
	          	return False;
	          }
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   }


	   //================================================
		//			Activate User
		//================================================
	      public function ActivateUser($email, $userconfirm)
	    {
	       try
	       {
	       	  $activationcode = $this->ActivationCode(30);
	          $q = $this->conn->prepare("SELECT * FROM users WHERE Email =:email && ActivationCode=:userconfirm  LIMIT 1");
	          $q->execute(array(':email'=>$email,':userconfirm'=>$userconfirm));
	          $userRow=$q->fetch(PDO::FETCH_ASSOC);
	          if($q->rowCount() > 0)
	          {

	          	 $q = $this->conn->prepare("UPDATE users SET ActiveStatus = '2', ActivatedOn=:activatedon, 
	          	 	IPAddress =:ipaddress WHERE Email=:email");
	          	 $q->execute(array(':activatedon'=>date("Y-m-d G:i:s"),
	          	 					':email'=>$email,
	          	 					':ipaddress'=>$_SERVER["REMOTE_ADDR"]));
	             return true;
	          }
	          else
	          {
	          	return false;
	          }
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   }


	   
	   


	   //================================================
		//			Encrypt password
		//================================================
		public function EncryptPword( $pword ) 
		{
	       try
	       {
				$salt = $this->saltKeys(1);
				$alpha = $pword.$salt;
				$alpha = md5( sha1( $alpha ) );
				
				return $alpha;
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   }
	   
	   
	   

	   //================================================
		//			Check password and validate password
		//================================================
		public function CheckPword( $pword ) 
		{
	       try
	       {
			/* $ff = array( str_replace(array( " ", '"', "'" ), '', $pword ) );
			$find = in_array( $pword, $ff ); */

			$pword_len = strlen( $pword ); //check lenght of characters

			//$pword_sp = str_replace(array( " ", '"', "'" ), '', $pword ); //removes spaces and quotes
			//$pword_trim = trim( $pword ); //remove whitespaces at the beginning and end
			/*$pword_pos = strpos( $pword1, " "); //checks for white spaces
			$pword_q1 = strpos( $pword1, "'"); //checks for single quotes
			$pword_q2 = strpos( $pword1, '"'); //checks for double quotes */
			
			if( ($pword_len < 6 ) ){
				return true;
			}else{
				return false;
			}
				
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   }
	 
	   //================================================
		//			Validate User Inputs
		//================================================
		public function ValidateData( $data ) 
		{
	       try
	       {
				// $count = count( $data );

				// for($i = 0; $i <= $count; $i++){
					
				// 	$data = trim( $data )[$i];
				// 	$data = stripslashes( $data )[$i];
				// 	$data = htmlspecialchars( $data )[$i];
					
				// }

				//$_SERVER["REQUEST_METHOD"] == "POST"
				//$_SERVER["PHP_SELF"];
				//$_SERVER["REQUEST_METHOD"];
				// $url = filter_var($url, FILTER_VALIDATE_URL);
				// $email = filter_var($email, FILTER_VALIDATE_EMAIL);
				// $number = filter_var($number, FILTER_VALIDATE_INT);

				$data = trim( $data );
				$data = stripslashes( $data );
				$data = htmlspecialchars( $data );
						
				return $data;
	       }
	       catch(PDOException $e)
	       {
	           echo $e->getMessage();
	       }
	   }
	   
	   
	 
	   //================================================
		//			Google reCAPTCHA KEYS
		//================================================
	   public function googleKeys($type)
	   {
			try
			{
				//FOR ONLINE
				// $secretKey = "";
				// $siteKey = "";

				//FOR LOCALHOST
				$secretKey = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
				$siteKey = "6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI";

				if($type == 1)
				{
					return $secretKey;
				}elseif($type == 2){
					return $siteKey;
				}else{
					return false;
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
	   }



	    //================================================
		//			SALT KEYS
		//================================================
		public function saltKeys($type)
		{
			try
			{
				//REGISTER / SIGNIN / CHANGE PASSWORD / FORGOT PASSWORD
				$pword_salt = "xxxxxxxx"; //type 1
				//ALLOW USER - MEMBER
				$allow_user_mem = md5('XXXXXXMEMBERS'); //type 2
				//ALLOW USER - ADMIN
				$allow_user_adm = md5('XXXXXXAdmin'); //type 3
	
				if($type == 1)
				{	return $pword_salt;
				}elseif($type == 2){
					return $allow_user_mem;
				}elseif($type == 3){
					return $allow_user_adm;
				}else{
					return false;
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}



	    //================================================
		//			FLUTTERWAVE KEYS
		//================================================
		public function flutterwKeys($type)
		{
			try
			{
				//PUBLIC | SECRET | ENCRYPTION KEY - TEST
				$publicKey = ""; //type 1
				$secretKey = ""; //type 2
				$encryptKey = ""; //type 3

				//PUBLIC | SECRET | ENCRYPTION KEY - ONLINE
				// $publicKey = ""; //type 1
				// $secretKey = ""; //type 2
				// $encryptKey = ""; //type 3
	
				if($type == 1)
				{	return $publicKey;
				}elseif($type == 2){
					return $secretKey;
				}elseif($type == 3){
					return $encryptKey;
				}else{
					return false;
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

	 
		
	    //================================================
		//			PAYSTACK KEYS
		//================================================
		public function payStack($type)
		{
			try
			{
				//PUBLIC | SECRET | ENCRYPTION KEY - TEST
				$publicKey = "pk_test_d99d"; //type 1
				$secretKey = "sk_test_6981"; //type 2
				//$encryptKey = "FLWSECK_TESTc8c7c3b5ebbf"; //type 3

				//PUBLIC | SECRET | ENCRYPTION KEY - LIVE MODE
				// $publicKey = ""; //type 1
				// $secretKey = ""; //type 2
				// $encryptKey = ""; //type 3
	
				if($type == 1)
				{	return $publicKey;
				}elseif($type == 2){
					return $secretKey;
				}else{
					return false;
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

	 

	   public function ActivationCode($len)
	   {
		  $result = "";
		    $pickfrom = "1234567890abscefghijklmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWXYZ";
		    $charArray = str_split($pickfrom);
		    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		      $result .= "".$charArray[$randItem];
		    }
		    return $result;
		}
	 
	   public function isLoggedin()
	   {
	      if(isset($_SESSION['duid']))
	      {
	         return true;
	      }
	   }

	 
	   public function redirect($url)
	   {
	       header("Location: $url");
	   }

	 
	   public function logout()
	   {
	        session_destroy();
	        unset($_SESSION['duid']);
	        return true;
	   }
}

?>