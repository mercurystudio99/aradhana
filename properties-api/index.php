
<!--
 API Documentation HTML Template  - 1.0.1
 Copyright © 2016 Florian Nicolas
 Licensed under the MIT license.
 https://github.com/ticlekiwi/API-Documentation-HTML-Template
 !-->
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>API - Documentation</title>
    <meta charset="utf-8">
    <meta property="og:type" content="website" />
	<meta property="og:url" content="https://properties-api.myspacetech.in/" />
	<meta property="og:title" content="Real Estate" />
    
    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/hightlightjs-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500|Source+Code+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" media="all">
   
</head>

<body>
<div class="left-menu">
    <div class="content-logo">
       
        <span>API Documentation</span>
    </div>
    <div class="content-menu">
        <ul>
            <li class="scroll-to-link" data-target="get-characters">
                <a>Get All Properties</a>
            </li>
             <li class="scroll-to-link" data-target="errors">
                <a>Get property by ID</a>
            </li>
			<li class="scroll-to-link" data-target="title">
                <a>Get property by Title</a> 
            </li>

            <li class="scroll-to-link" data-target="Bedrooms">
                <a>By no of Bedrooms</a> 
            </li>

            <li class="scroll-to-link" data-target="garages">
                <a>By no of Garages</a> 
            </li>

            <li class="scroll-to-link" data-target="location">
                <a>By Location ID</a> 
            </li>

            <li class="scroll-to-link" data-target="location-name">
                <a>By Location Name</a> 
            </li>
            <li class="scroll-to-link" data-target="price">
                <a>By Price Range</a> 
            </li>
             <li class="scroll-to-link" data-target="login">
                <a>User Login</a> 
            </li>
           
            <li class="scroll-to-link" data-target="register">
                <a>Register user</a> 
            </li>
           
        </ul>
 
    </div>
</div>
<div class="content-page">
    <div class="content-code"></div>
    <div class="content">
      
        <div class="overflow-hidden content-section" id="content-get-characters">
            <h2 id="get-characters">get All properties list</h2>
           
            <p>
                To get access token you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties</code>
            </p>
            <br>
             
            <pre><code class="json">
Results:
This endpoint returns all the properties
                </code></pre>
        </div>
		
		
        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Get property by ID</h2>
            <p>
                To get a property by id  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/{id}</code>
            </p>
            <br>
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/properties/12

Results:
All details for that property ID
                </code></pre>
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>id</td>
                    <td>String</td>
                    <td>property id</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="overflow-hidden content-section" id="content-title">
            <h2 id="title">Get property by title</h2>
            <p>
                To get a property by title  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/title/{title}</code><br>
            </p>
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/properties/title/Luxury Axio

Results:
All properties that have a title containing Luxury Axio
                </code></pre>
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>title</td>
                    <td>String</td>
                    <td>property title</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="overflow-hidden content-section" id="content-Bedrooms">
            <h2 id="Bedrooms">Get property by No of bedrooms</h2>
            <p>
                To get a property by bedrooms  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/bedrooms/{bedrooms}</code><br>

            </p>
             <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/properties/bedrooms/3

Results:
All properties that have 3 Bedrooms
                </code></pre>
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>bedrooms</td>
                    <td>int</td>
                    <td>No of bedrooms</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="overflow-hidden content-section" id="content-garages">
            <h2 id="garages">Get property by No of garages</h2>
            <p>
                To get a property by bedrooms  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/garages/{garages}</code><br>

            </p>
            
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/properties/garages/3

Results:
All properties that have 3 garages
                </code></pre>
                
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>garages</td>
                    <td>int</td>
                    <td>No of garages</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="overflow-hidden content-section" id="content-location">
            <h2 id="location">Get property by location id; this is important where users have to select location names from a list</h2>
            <p>
                To get a property by bedrooms  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/location/{location_id}</code><br>
            </p>
            
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/properties/location/2

Results:
All properties which are located in location with ID 2 (New-york).
A better refined Endpoint is by Location Name as shown below
                </code></pre>
                
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>location</td>
                    <td>String</td>
                    <td>Location ID</td>
                </tr>
                </tbody>
            </table>
        </div>



        <div class="overflow-hidden content-section" id="content-location-name">
            <h2 id="location-name">Get property by locationname name</h2>
            <p>
                To get a property by location name   you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/locationname/{locationName}</code><br>
          
            </p>
            
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/properties/locationname/Amstredam 

Results:
All properties which are located in location Amstredam
                </code></pre>
                
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>location name</td>
                    <td>String</td>
                    <td>Location Name</td>
                </tr>
                </tbody>
            </table>
        </div>

		 <div class="overflow-hidden content-section" id="content-price">
            <h2 id="price">Get property by price range</h2>
            <p>
                To get a property by price range  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/prices/{minprice}/{maxprice}</code><br>
          
            </p>
            
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/properties/prices/3500/5000

Results:
All properties which have a price between 3500 and 5000
                </code></pre>
                
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Minimum Price</td>
                    <td>Double</td>
                    <td>Minimum house price</td>
                </tr>
                <tr>
                    <td>Maximum Price</td>
                    <td>Double</td>
                    <td>Maximum house price</td>
                </tr>
                </tbody>
            </table>
        </div>
		
	<div class="overflow-hidden content-section" id="content-login">
            <h2 id="login">Login</h2>
            <p>
                To  login you need to make a POST call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/login/</code><br>
          
            </p>
            
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/login/
{email_address: "aradhana@gmail.com", passwrd:"admin"}
Results:
[
    {
        "status": "success",
        "data": [
            {
                "id": 28,
                "name": "",
                "first_name": "Kevin r",
                "last_name": "r",
                "email": "aradhana@gmail.com",
                "email_verified_at": null,
                "password": "d033e22ae348aeb5660fc2140aec35850c4da997",
                "two_factor_secret": null,
                "two_factor_recovery_codes": null,
                "address": "",
                "address2": null,
                "phone": "",
                "birthday": "0000-00-00",
                "city": "",
                "state": "",
                "country": "",
                "zip_code": null,
                "last_login_at": null,
                "avatar_id": null,
                "banner_id": null,
                "gallery": null,
                "bio": null,
                "status": null,
                "create_user": null,
                "update_user": null,
                "vendor_commission_amount": null,
                "vendor_commission_type": null,
                "deleted_at": null,
                "remember_token": null,
                "created_at": null,
                "updated_at": null,
                "payment_gateway": null,
                "total_guests": null,
                "locale": null,
                "business_name": null,
                "verify_submit_status": null,
                "is_verified": null,
                "active_status": 0,
                "dark_mode": 0,
                "messenger_color": "#2180f3",
                "stripe_customer_id": null,
                "total_before_fees": null,
                "user_name": ""
            }
        ]
    }
]
                </code></pre>
                
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>email_address</td>
                    <td>Email</td>
                    <td>Registered user email address</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>String</td>
                    <td>Registered user password step 1: base64_encoded and then urlencoded <td>
                </tr>
                </tbody>
            </table>
        </div>
			
		<div class="overflow-hidden content-section" id="content-register">
            <h2 id="register">Register New user</h2>
            <p>
                To register you need to make a POST call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/register/</code><br>
          
            </p>
            
            <pre><code class="json">
Example:
https://properties-api.myspacetech.in/ver1/register/
{"first_name":"","last_name":"","email":"","password":"","address":"","phone":"","birthday":"","city":"","state":"","country":""}
Results:
[
    {
        "status": "success",
        "data": [
            {
            "An Email Address was sent to you with the initial password"
            }
        ]
    }
]
                </code></pre>
                
            <h4>QUERY PARAMETERS</h4>
            <table width="100%">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>email_address</td>
                    <td>Email</td>
                    <td>Registered user email address</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>String</td>
                    <td>Registered user password step 1: base64_encoded and then urlencoded <td>
                </tr>
                </tbody>
            </table>
        </div>
		
    </div>
    <div class="content-code"></div>
</div>

<script src="js/script.js"></script>
</body>
</html>