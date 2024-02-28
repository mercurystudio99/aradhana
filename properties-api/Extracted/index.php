
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
            <li class="scroll-to-link" data-target="get-characters">
                <a>Get property by ID</a>
            </li>
			<li class="scroll-to-link" data-target="get-characters">
                <a>Get property by Title</a> 
            </li>

            <li class="scroll-to-link" data-target="get-characters">
                <a>By no of Bedrooms</a> 
            </li>

            <li class="scroll-to-link" data-target="get-characters">
                <a>By no of Garages</a> 
            </li>

            <li class="scroll-to-link" data-target="get-characters">
                <a>By Location ID</a> 
            </li>

            <li class="scroll-to-link" data-target="get-characters">
                <a>By Location Name</a> 
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
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/token_access</code>
            </p>
            <br>
            
        </div>
		
		
        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Get property by ID</h2>
            <p>
                To get a property by id  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/{id}</code>
            </p>
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


        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Get property by title</h2>
            <p>
                To get a property by title  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/title/{title}</code><br>
                <code class="higlighted">Example: https://properties-api.myspacetech.in/ver1/properties/title/Arlo </code>
            </p>
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


        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Get property by No of bedrooms</h2>
            <p>
                To get a property by bedrooms  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/bedrooms/{bedrooms}</code><br>
                <code class="higlighted">Example: https://properties-api.myspacetech.in/ver1/properties/bedrooms/3 </code>
            </p>
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


        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Get property by No of garages</h2>
            <p>
                To get a property by bedrooms  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/garages/{garages}</code><br>
                <code class="higlighted">Example: https://properties-api.myspacetech.in/ver1/properties/garages/3 </code>
            </p>
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


        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Get property by location id; this is important where users have to select location names from a list</h2>
            <p>
                To get a property by bedrooms  you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/location/{location_id}</code><br>
                <code class="higlighted">Example: https://properties-api.myspacetech.in/ver1/properties/location/2 </code>
            </p>
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



        <div class="overflow-hidden content-section" id="content-errors">
            <h2 id="errors">Get property by locationname name</h2>
            <p>
                To get a property by location name   you need to make a GET call to the following url :<br>
                <code class="higlighted">https://properties-api.myspacetech.in/ver1/properties/locationname/{locationName}</code><br>
                <code class="higlighted">Example: https://properties-api.myspacetech.in/ver1/properties/locationname/Amstredam </code>
            </p>
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

		
		
		
		
		
    </div>
    <div class="content-code"></div>
</div>

<script src="js/script.js"></script>
</body>
</html>