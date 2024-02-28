<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("model/Model.php");
//$model = new Properties_Model();
/**
 * @property  games api
 */

class PropertiesController  {
	
	/* Properties */
    private $model;
    public function __construct() // to remember use public
    {
       
		 $this->model = new Properties_Model();
    }



    public function index()
    {
        echo "This is aradhana Properties api controller";
    }
	

public function getUsersList() {
		$request = file_get_contents('php://input');
		echo json_encode(
			array('status' => 'success',
				 "data"=>$this->model->get_all_users()
				 )
		);
    }
	
	/**
	 * Retrieves a list of all properties from the model 
	 * and returns it as JSON
	 */
	public function getPropertiesList() {
		$request = file_get_contents('php://input');
		echo json_encode(
			array('status' => 'success',
				 "data"=>$this->model->get_all_properties()
				 )
		);
    }
    public function getRecentPropertiesList() {
		$request = file_get_contents('php://input');
		echo json_encode(
			array('status' => 'success',
				 "data"=>$this->model->get_recent_properties()
				 )
		);
    }
public function getRecommendedPropertiesList() {
		$request = file_get_contents('php://input');
		echo json_encode(
			array('status' => 'success',
				 "data"=>$this->model->get_recommended_properties()
				 )
		);
    }

	public function getPropertiesListByID() {
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if($_GET['id']!=""){
			$id=$_GET['id'];


		echo json_encode([
			'status' => 'success',
				 "data"=>$this->model->get_all_properties_by_id($id),
				 "Images"=>$this->model->get_all_properties_images($id)
				 ]);

		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide property ID'));
		}
    }




	public function getPropertiesListByTitle() {
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if($_GET['title']!=""){
			$title=$_GET['title'];

			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->get_all_properties_by_title($title)
					 )
			)."]";

		
		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide property Title'));
		}
    }



	public function getPropertiesListByBedrooms() {
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if($_GET['bedrooms']!=""){
			$no_of_beds=$_GET['bedrooms'];

			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->get_all_properties_by_bedrooms($no_of_beds)
					 )
			)."]";

		
		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide property Title'));
		}
    }




	public function getPropertiesListByGarages() {
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if($_GET['garages']!=""){
			$garages=$_GET['garages'];

			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->get_all_properties_by_garage($garages)
					 )
			)."]";

		
		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide No of Garages'));
		}
    }




	public function getPropertiesListByLocationID() {
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if($_GET['location']!=""){
			$location =$_GET['location'];

			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->get_all_properties_by_location($location)
					 )
			)."]";

		
		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide location id'));
		}
    }



	public function getPropertiesListByLocationName() {
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if($_GET['location']!=""){
			$locationname =$_GET['location'];

			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->get_all_properties_by_location_name($locationname)
					 )
			)."]";

		
		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide location name'));
		}
    }

public function getPropertiesListByPrice() {
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if($_GET['minprice']!="" && $_GET['maxprice']!=""){
			$min =$_GET['minprice'];
			$max =$_GET['maxprice'];

			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->get_all_properties_by_price($min,$max)
					 )
			)."]";

		
		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide Minimum and Maximum prices'));
		}
    }

	public function registerUser(){
		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if(isset($_POST['first_name']) && $_POST['first_name']!=""){
			$first_name =$_POST['first_name'];
			$last_name =$_POST['last_name'];
			$email =$_POST['email'];
			$password =$_POST['password'];
			$address =isset($_POST['address']) ? $_POST['address'] : "";
			$phone =isset($_POST['phone']) ? $_POST['phone'] : "";
			$birthday =isset($_POST['birthday']) ? $_POST['birthday'] : "";
			$city =isset($_POST['city']) ? $_POST['city'] : "";
			$state =isset($_POST['state']) ? $_POST['state'] : "";
			$country =isset($_POST['country']) ? $_POST['country'] : "";
			$user_name =isset($_POST['user_name']) ? $_POST['user_name']: "";
			
			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->register_user($first_name, $last_name, $email,$password,$address,$phone,$birthday,$city,$state,$country,$user_name)
					 )
			)."]";



		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide first_name, last_name email and password'));
		}


	}



public function login(){

		$request = file_get_contents('php://input');
		$json = json_decode($request, true); 
		if(isset($_POST['email_address']) && $_POST['email_address']!=""){
			$email_address =$_POST['email_address'];
			$passwrd =urldecode(base64_decode($_POST['passwrd']));
			echo "[".json_encode(
				array('status' => 'success',
					 "data"=>$this->model->login($email_address, $passwrd)
					 )
			)."]";

		
		}else{
			 echo json_encode(array('status' =>'Error', 'Response'=>'Provide Name, Email and Password'));
		}
	}


	

	public function resetPassword(){

	}

	
	
}
