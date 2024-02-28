<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//defined('BASEPATH') OR exit('No direct script access allowed');
include("includes/dbcontroller.php");
$db = new DBController();

class Properties_Model
{

public function get_all_users()
	{
		global $db;

		$sql = "select u.id, u.name,u.email,u.phone,concat('https://aradhana.myspacetech.in/uploads/',m.file_path) as image from users as u inner join media_files as m on m.id=m.id limit 20";
		return $db->executeSelectQuery($sql);
	}
	public function get_all_properties()
	{
		global $db;

		$sql = "select s.id, s.title,s.price,s.address,s.bed,s.bathroom,s.square,s.room,concat('https://aradhana.myspacetech.in/uploads/',m.file_path) as image,l.name as location_name from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id inner join bravo_locations as l on s.location_id=l.id limit 0,20";
		return $db->executeSelectQuery($sql);
	}
	public function get_recent_properties()
	{
		global $db;

		$sql = "select s.id, s.title,s.price,s.address,s.bed,s.bathroom,s.room,s.square,DATEDIFF(NOW(), s.created_at) AS days_since,concat('https://aradhana.myspacetech.in/uploads/',m.file_path) as image,l.name as location_name from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id inner join bravo_locations as l on s.location_id=l.id order by s.created_at  desc limit 0,20";
		return $db->executeSelectQuery($sql);
	}
	public function get_recommended_properties()
	{
		global $db;

		$sql = "select s.id, s.title,s.price,s.address,s.bed,s.bathroom,s.room,s.square,concat('https://aradhana.myspacetech.in/uploads/',m.file_path) as image,l.name as location_name from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id inner join bravo_locations as l on s.location_id=l.id and s.liked=1 order by s.created_at  desc limit 0,20";
		return $db->executeSelectQuery($sql);
	}

	public function get_all_properties_by_id($property_id)
	{
		global $db;
		$property_id = str_replace("'", "", $property_id);

		$sql = "select s.id, s.title,s.price,s.address,s.bed,s.bathroom,s.room,s.square,s.faqs,s.facilities,s.content,concat('https://aradhana.myspacetech.in/uploads/',m.file_path) as image,l.name as location_name from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id and s.id='$property_id' inner join bravo_locations as l on s.location_id=l.id;";
		$result = $db->executeSelectQuery($sql);
		
		$records = [];
		foreach ($result as $row) {
			$property_id = $row['id'];
			// Create a JSON record using the data from the query result and the images
			$record = [
				'id' => $property_id,
				"title"=>$row['title'],
				"price"=>$row['price'],
				"address"=>$row['address'],
				"bed"=>$row['bed'],
				"bathroom"=>$row['bathroom'],
				"room"=>$row['room'],
				"image"=>$row['image'],
				"square"=>$row['square'],
				"location_name"=>$row['location_name'],
				"faqs"=>$row['faqs']? json_decode($row['faqs']):"",
				"facilities"=>$row['facilities']? json_decode($row['facilities']):"",
				"content"=>$row['content'],
				    
			];

			// Add the record to the array
			$records[] = $record;
		}
		
		return $records;
	}

	public function get_all_properties_images($property_id)
	{
		global $db;
		$id = str_replace("'", "", $property_id);
		$sql = "SELECT concat('https://aradhana.myspacetech.in/uploads/',file_path) as img_url FROM media_files WHERE FIND_IN_SET(id, (SELECT gallery FROM bravo_spaces WHERE id = '$id'));;";
		return $db->executeSelectQuery($sql);
	}


	public function get_all_properties_by_title($title)
	{
		global $db;
		$title = strtolower(str_replace("'", "", $title));
		$sql = "select s.*,m.file_path ,l.name as location_name from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id and LOWER(s.title) like '%$title%' inner join bravo_locations as l on s.location_id=l.id;";
		$result = $db->executeSelectQuery($sql);
		// Array to store the JSON records
		$records = [];
		foreach ($result as $row) {
			$property_id = $row['id'];
			// Call an external function to get images using the ID
			$images = $this->get_all_properties_images($property_id);
			// Create a JSON record using the data from the query result and the images
			$record = [
				'id' => $property_id,
				'data' => $row,
				'images' => $images
			];

			// Add the record to the array
			$records[] = $record;
		}



		return $records;
	}


	public function get_all_properties_by_bedrooms($bedrooms)
	{
		global $db;
		$id = str_replace("'", "", $bedrooms);
		$sql = "select s.*,m.file_path from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id and s.bed = $bedrooms;";
		$result = $db->executeSelectQuery($sql);
		// Array to store the JSON records
		$records = [];
		foreach ($result as $row) {
			$property_id = $row['id'];
			// Call an external function to get images using the ID
			$images = $this->get_all_properties_images($property_id);
			// Create a JSON record using the data from the query result and the images
			$record = [
				'id' => $property_id,
				'data' => $row,
				'images' => $images
			];

			// Add the record to the array
			$records[] = $record;
		}



		return $records;
	}


	public function get_all_properties_by_garage($garage)
	{
		global $db;
		$id = str_replace("'", "", $garage);
		$sql = "select s.*,m.file_path from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id and s.garage = $garage;";
		$result = $db->executeSelectQuery($sql);
		// Array to store the JSON records
		$records = [];
		foreach ($result as $row) {
			$property_id = $row['id'];
			// Call an external function to get images using the ID
			$images = $this->get_all_properties_images($property_id);
			// Create a JSON record using the data from the query result and the images
			$record = [
				'id' => $property_id,
				'data' => $row,
				'images' => $images
			];

			// Add the record to the array
			$records[] = $record;
		}



		return $records;
	}



	public function get_all_properties_by_location($location_id)
	{
		global $db;
		$id = str_replace("'", "", $location_id);
		$sql = "SELECT s.*,m.file_path FROM bravo_spaces AS s INNER JOIN media_files AS m ON s.banner_image_id=m.id 
		INNER JOIN bravo_locations ON bravo_locations.id = s.location_id
		WHERE s.location_id = $location_id;";

		$result = $db->executeSelectQuery($sql);
		// Array to store the JSON records
		$records = [];
		foreach ($result as $row) {
			$property_id = $row['id'];
			// Call an external function to get images using the ID
			$images = $this->get_all_properties_images($property_id);
			// Create a JSON record using the data from the query result and the images
			$record = [
				'id' => $property_id,
				'data' => $row,
				'images' => $images
			];

			// Add the record to the array
			$records[] = $record;
		}



		return $records;
	}


	public function get_all_properties_by_location_name($location_name)
	{
		global $db;

		$location_name = strtolower(str_replace("'", "", $location_name));
		$sql = "SELECT s.*,m.file_path FROM bravo_spaces AS s INNER JOIN media_files AS m ON s.banner_image_id=m.id 
		INNER JOIN bravo_locations l ON l.id = s.location_id
		WHERE LOWER(l.name) like '%$location_name%';";

		

		$result = $db->executeSelectQuery($sql);
		// Array to store the JSON records
		$records = [];
		foreach ($result as $row) {
			$property_id = $row['id'];
			// Call an external function to get images using the ID
			$images = $this->get_all_properties_images($property_id);
			// Create a JSON record using the data from the query result and the images
			$record = [
				'id' => $property_id,
				'data' => $row,
				'images' => $images
			];

			// Add the record to the array
			$records[] = $record;
		}
		return $records;
	}

public function get_all_properties_by_price($min,$max)
	{
		global $db;
		
		$sql = "select s.*,m.file_path from bravo_spaces as s inner join media_files as m on s.banner_image_id=m.id and s.price between $min and $max;";
		$result = $db->executeSelectQuery($sql);
		// Array to store the JSON records
		$records = [];
		foreach ($result as $row) {
			$property_id = $row['id'];
			// Call an external function to get images using the ID
			$images = $this->get_all_properties_images($property_id);
			// Create a JSON record using the data from the query result and the images
			$record = [
				'id' => $property_id,
				'data' => $row,
				'images' => $images
			];

			// Add the record to the array
			$records[] = $record;
		}



		return $records;
	}
	public function getAccessToken($user_id)
	{
		global $db;

		$sql = "SELECT * FROM tokens  WHERE username = '$user_id' and valid >= NOW()";
		return $db->getRowsCount($sql);
	}



	public function get_user($ref, $email_address)
	{
		global $db;

		$sql = "SELECT $ref FROM coll_users  WHERE email_address = '$email_address'";
		$stmt = $db->Connect()->prepare($sql);
		$result = $stmt->execute();
		if ($stmt->rowCount() > 0) {
			while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
				return $rows["{$ref}"];
			}
		} else {
			return "-";
		}
	}



	


	public function change_password($username, $pass)
	{
		global $db;
		$sqls = "update coll_users set siri='$pass' where email_address='$username'";
		return $db->executeInsert($sqls);
	}



	public function register_user($first_name, $last_name, $email,$password,
	$address,$phone,$birthday,$city,$state,$country,$user_name)
	{
		global $db;
		$date_created = date("Y-m-d H:i:s");
		$passw = sha1($password);
		$sqls = "INSERT INTO users (first_name, last_name, email, password, address, phone, birthday,city,state,country,user_name )
	             VALUE('$first_name', '$last_name', '$email','$passw','$address','$phone','$birthday','$city','$state','$country','$user_name')";
		//$db->executeInsert($sqls);

		if ($db->executeInsert($sqls) == "Success") {

			$msg = "<html>
					<body>
					<p>Dear " . $first_name . ",</p>
					<p>Welcome to <a href='smartcoll.com'>Smartcoll.com</a></p>
					<p>Your Password is: <strong>" . $password . "</strong> </p>
					<p>Make sure you change the password immediately you login</p>
				  </body>
				  </html> ";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: noreply";
			$sending = mail($email, "ONE TIME LOGIN PASSWORD", $msg, $headers);

			if ($sending == true) {
				return 'An Email Address was sent to you with the initial password';
			
			} else {
				return "User Added, but Notification Email failed to send";
			}
		} else {
			return $db->executeInsert($sqls);
		}
	}







	public function generateAccessToken()
	{
		if (function_exists('random_bytes')) {
			$randomData = random_bytes(20);
			if ($randomData !== false && strlen($randomData) === 20) {
				return bin2hex($randomData);
			}
		}
		if (function_exists('openssl_random_pseudo_bytes')) {
			$randomData = openssl_random_pseudo_bytes(20);
			if ($randomData !== false && strlen($randomData) === 20) {
				return bin2hex($randomData);
			}
		}
		if (function_exists('mcrypt_create_iv')) {
			$randomData = mcrypt_create_iv(20, MCRYPT_DEV_URANDOM);
			if ($randomData !== false && strlen($randomData) === 20) {
				return bin2hex($randomData);
			}
		}
		if (@file_exists('/dev/urandom')) { // Get 100 bytes of random data
			$randomData = file_get_contents('/dev/urandom', false, null, 0, 20);
			if ($randomData !== false && strlen($randomData) === 20) {
				return bin2hex($randomData);
			}
		}
		// Last resort which you probably should just get rid of:
		$randomData = mt_rand() . mt_rand() . mt_rand() . mt_rand() . microtime(true) . uniqid(mt_rand(), true);

		return substr(hash('sha512', $randomData), 0, 40);
	}



	public function rowsCount($sql)
	{
		global $db;
		return $db->getRowsCount($sql);
	}



	public function validateAccessToken($access_token)
	{
		global $db;
		$sql = "SELECT access_token FROM tokens  WHERE access_token = '$access_token'";
		return $db->getRowsCount($sql);
	}


	public function login($email, $password)
	{
		global $db;
		$passwd=sha1($password);
		$sql = "SELECT *  FROM users WHERE email = '$email' and password='$passwd'";
		$result = $db->executeSelectQuery($sql);

		if ($db->getRowsCount($sql) > 0) {
			
			return $db->executeSelectQuery($sql);
			/*$storedPassword = $result['password'];

			if (password_verify($password, $storedPassword)) {
				// Password matches, login successful
				return 'Success';
			} else {
				// Password does not match
				return 'Failed';
			}*/
		} else {
			// User not found
			return 'Invalid User';
		}
	}

}
