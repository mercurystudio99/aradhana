<?php
class DBController {
var $conn;
	public  function Connect(){
		
	$dbhost = "localhost";//ip address or the url of the database host
	$dbname="u185060096_realestate";//database name
	$username = "u185060096_realroot";//database username
	$password = "Pavel0622!@#$";//database password
	///$CA_KEY='C:\wamp64\www\primecut\games_api\includes\mysqlCerts\ca.pem';
	
		try {
			$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  // echo "Connected successfully"; 
			}
		catch(PDOException $e)
			{
				# Write into log and display Exception
			ExceptionLog($e->getMessage() );
			echo "Connection failed: " . $e->getMessage();
			}
			
		return $conn;
	}
	
	/**
	* method to do all insert related commands
	*/
	public function executeSelectQuery($query) {
		
		$array = array();
		
		$stmt = $this->Connect()->prepare($query);
		$res=$stmt->execute();
		
		
		
		if(!$res){
			return $stmt->errorInfo();
		}else{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	
	}
	public function getRowsCount($query) {
		$stmt = $this->Connect()->prepare($query);
		$res=$stmt->execute();
		return $stmt->rowCount();
	}
	
	public function executeInsert($query){
		
		$stmt = $this->Connect()->prepare($query);
		$res=$stmt->execute();
		if(!$res){
			return "Error: ". errorInfo();
		}else{
			return 'Success';
		}
	}
	
	
	
	/**
	* method to do all update related commands
	*/
	public function executeUpdateQuery($query) {
		$stmt = $this->Connect()->prepare($query);
		$res=$stmt->execute();
		if(!$res){
			return "Error: ". errorInfo();
		}else{
			return "Record updated successfully";
				
		}
	
	}
	
}
