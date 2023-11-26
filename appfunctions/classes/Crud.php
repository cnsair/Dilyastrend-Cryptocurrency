<?php

	class Crud
	{
		private $conn;

		public function __construct($connectionObject)
		{
			$this->conn = $connectionObject;
		}

		//method to select data from any table
		public function select($table, $rows='*', $where=null, $order=null, $group =null, $join =null, $limit=null)
		{  

			try 
			{
				$sql="SELECT $rows FROM $table"; 

				if($join!=null)
				{
					$sql .= $join;
				}

				if($where!=null)
				{
					$sql .= " WHERE " . $where;
				}

				if($group!=null)
				{
					$sql .= " GROUP BY " . $group;
				}

				if($order!=null)
				{
					$sql .= " ORDER BY " . $order;
				}

				if($limit!=null)
				{
					$sql .= " LIMIT " . $limit;
				}

				//echo $sql;
				
				$q = $this->conn->prepare($sql);  
				$q->execute();

				if($q->rowCount() > 0)
				{
					while($r = $q->fetch(PDO::FETCH_ASSOC))
					{ 
						$data[]=$r; 
				
					} 
					return $data; 
				}

				else
				{
					return false;
				}
			} 

			catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
		} 


		//Method to fetch any column by issuing an ID
		public function AnyContent($whatyouwant, $table, $column, $equalsvalue)
		{
		 	try 
		 	{
		 		$sql = "SELECT $whatyouwant FROM $table WHERE $column = :equalsvalue ";
				$q = $this->conn->prepare($sql);
				$q->execute(array(':equalsvalue'=>$equalsvalue));
				$data = $q->fetch(PDO::FETCH_ASSOC);
				return $data["$whatyouwant"];
		 	} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
			
		}

		public function GenerateTextPass($len){
		  $result = "";
		    $pickfrom = "ABCDEFGHJKMNPQRSTUVWXYZ";
		    $charArray = str_split($pickfrom);
		    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		      $result .= "".$charArray[$randItem];
		    }
		    return $result;
		}


		public function GenerateAlphaNumPass($len){
		  $result = "";
		    $pickfrom = "1234567ABCDEFGHJKMNPQRSTUVWXYZ";
		    $charArray = str_split($pickfrom);
		    for($i = 0; $i < $len; $i++){
		    $randItem = array_rand($charArray);
		      $result .= "".$charArray[$randItem];
		    }
		    return $result;
		}


		public function GenerateReferral($table, $columntocount, $prefix){

		  $result = "";
		  $countprefix = strlen($prefix);
		  $sql = "SELECT $columntocount as thetotal FROM $table 
		  		  WHERE $columntocount<>'' 
		  		  ORDER BY ID DESC LIMIT 1";
		  $q = $this->conn->prepare($sql);
		  $q->execute();
		  
		  if($q->rowCount() > 0)
		  {
				$m = $q->fetch(PDO::FETCH_ASSOC);
				$refcode = substr($m["thetotal"], $countprefix);
				$refcode = ($refcode +1);
				$refcode = $prefix.$refcode; 
		  }
		  else
		  {
		  		$refcode = date('ymd') . "01";
		  		$refcode = $prefix.$refcode; 
		  }
		    return $refcode;
		}

		//method to insert data into any table
		public function insert($table, $vmk=array())
		{  
			try
			{
				foreach ($vmk as $key => $val) {
					$rowsa[] = $key;
					$preps[] = ":".$key;
				}

				$sql = "INSERT INTO $table "; 
				$rows = implode(",", $rowsa);
				$value = implode(",", $preps);
				$sql .= " (" . $rows . ")";
				$sql .= " VALUES (" . $value . ")";

				//echo $sql;

				$q = $this->conn->prepare($sql); 

				foreach ($vmk as $key => &$val) 
				{
					$q->bindParam(":".$key, $val) ;
				}
				$q->execute();

				return true; 
			} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
		}  



		//method to insert data into any table
		public function insertWithReturnValue($table, $vmk=array())
		{  
			try
			{
				foreach ($vmk as $key => $val) {
					$rowsa[] = $key;
					$preps[] = ":".$key;
				}

				$sql = "INSERT INTO $table "; 
				$rows = implode(",", $rowsa);
				$value = implode(",", $preps);
				$sql .= " (" . $rows . ")";
				$sql .= " VALUES (" . $value . ")";

				//echo $sql;

				$q = $this->conn->prepare($sql); 
				
				foreach ($vmk as $key => &$val) 
				{
					$q->bindParam(":".$key, $val) ;
				}
				$q->execute();

				return $this->conn->lastInsertId();  
			} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
		}  



		public function update($table, $column, $id, $vmk=array())
		{  
			try
			{
				$sql = "UPDATE $table SET "; 
				foreach ($vmk as $key => $val) 
				{
					$tt[] = "$key=:$key";
				}

				$rows = implode(",", $tt);
				$sql .= $rows;
				$sql .=" WHERE $column=:$column";

				//echo $sql;

				$q = $this->conn->prepare($sql); 
	
				foreach ($vmk as $key => &$val) 
				{						
					$q->bindParam(":".$key, $val);
				}
				$q->bindParam(":".$column, $id);
				$q->execute();

				return true; 
			} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
		}  

		
		public function delete($column,$id,$table)
		{  
			try
			{ 
				$sql="DELETE FROM $table WHERE $column=:id"; 
				$q = $this->conn->prepare($sql); 
				$q->bindParam(":id", $id);
				$q->execute(); 
				return true; 
			} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
		}



		//this logs user action to audit trail
		public function auditTrail($Task, $Description, $IPAddress, $AuditDate, $AuditTime, $ActionBy)
		{
			try 
		 	{
		 		$sql = "INSERT INTO audittrail SET Task = :task, 
		 										   Description = :description, 
		 										   IPAddress = :ipaddress, 
		 										   AuditDate = :auditdate, 
		 										   AuditTime = :auditime, 
		 										   ActionBy = :actionby ";
				$q = $this->conn->prepare($sql);
				$q->execute(array(':task'=>$Task,
								   ':description'=>$Description,
								   ':ipaddress'=>$IPAddress,
								   'auditdate'=>$AuditDate,
								   'auditime'=>$AuditTime,
								   'actionby'=>$ActionBy
								   ));
				//$data = $q->fetch(PDO::FETCH_ASSOC);
		 	} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
		       
		}	

		public function LogAllCalculate($identifier, $userid, $fullname)
		{
			try 
		 	{	 
				$check = "SELECT * FROM general_log WHERE IPAddr = '".$_SERVER["REMOTE_ADDR"]."' 
										&& UserID = '".$userid."'";
				$q = $this->conn->prepare($check);
				$q->execute();
				//$q->fetch(PDO::FETCH_ASSOC);

				if($q->rowCount() < 1)
				{
					$sqlx = "INSERT INTO general_log SET Identifier = :identifier, 
												UserID = :userid, 
												FullName = :fullname, 
												Visit = :visit, 
												IPAddr = :ip_addr";
					$q = $this->conn->prepare($sqlx);
					$q->execute(array(':identifier'=>$identifier,
									':userid'=>$userid,
									':fullname'=>$fullname,
									':visit'=> 1,
									'ip_addr'=> $_SERVER["REMOTE_ADDR"]
								));
				}
				else
				{	
					$m = $q->fetch(PDO::FETCH_ASSOC);
					$visit = ($m["Visit"] + 1);

					$sqlz = "UPDATE general_log SET Visit = :visit, 
													Identifier = :identifier, 
													FullName = :fullname 
							WHERE IPAddr = '".$_SERVER["REMOTE_ADDR"]."' 
							&& UserID = '".$userid."'";

					$q = $this->conn->prepare($sqlz);
					$q->execute(array(':identifier'=>$identifier,
									':visit'=>$visit,
									':fullname'=>$fullname
									));
				}
		 	} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
			
		}

		
		public function LogAudit($identifier, $userid, $fullname)
		{
			$Timenow = date("Y-m-d G:i:s");
			try 
		 	{	
				$url = $_SERVER["REQUEST_URI"];

				$sqlx = "INSERT INTO audit_log SET Task = :task, 
											UserID = :userid, 
											FullName = :fullname,
											Identifier = :identifier, 
											DateModified = :datez,
											IPAddr = :ip_addr";
				$q = $this->conn->prepare($sqlx);
				$q->execute(array(':task'=>$url,
								':userid'=>$userid,
								':fullname'=>$fullname,
								':identifier'=>$identifier,
								':datez'=>date("Y-m-d G:i:s"),
								'ip_addr'=> $_SERVER["REMOTE_ADDR"]
							));
		 	} 

		 	catch (PDOException $e) 
			{
				echo $e->getMessage();
			}
			
		}

		public function CleanCurrency($dstring)
	  	{
		    $newstr = preg_replace('/[^0-9.\']/', '', $dstring); 
		    $newstr = str_replace("'", '', $newstr);

		    return $newstr;
	  	}

		///////////////////////////////////////////////////////////////////////
		//			YET TO BE USED
		///////////////////////////////////////////////////////////////////////

		function doSelect($sql, $values = [], $fetch = '', $fetchStyle = PDO::FETCH_OBJ) {
			$stmt = self::$conn->prepare($sql);
			foreach ($values as $key => $value) {
				$stmt->bindValue($key + 1, $value);
			}
			$stmt->execute();
			if ($fetch == '') {
				$result = $stmt->fetchAll($fetchStyle);
			} else {
				$result = $stmt->fetch($fetchStyle);
			}
			return $result;
		}

		function check($data) {
			$email = $data['email'];
			$password = $data['password'];
			$sql = "SELECT * FROM users WHERE email = ? password = ?";
			$params = [$email, $password];
			$result = $this->doSelect($sql, $params);
			print_r($result);
			//if (sizeof($result) > 0) {
			//     echo 'yes';
			//} else {
			//    echo 'no';
			//}
		}

	}


 ?>