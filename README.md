
# PHP EMPLOYEE MANAGEMENT VERSION 4  
  
  
## Project overview

The following project represents the final step of the development of a simple employee management service, which allows user (admin) to see the list of employees with the detailed information, remove, update and create employees. 
At this final stage the project has been refactored in accordance with the Object Oriented Programming paradigm. Procedural functions within controller and model folders has been replaced with classes and methods (extending the basic classes located in folder 'libs/classes'), managed by the router class App which is interpretening the introduced url.

Key points of the functionality remail the same:
  
1. Login and logout with a SQL Database as user storage  
2. Controlled user session set to 10 minutes  
3. Show data from a SQL Database in a JS Grid  
4. Pagination of the data configured by the grid  
5. Employees CRUD Create Read Delete and Update with from a SQL Database as employees storage  
6. Employee page  with employee detail  
7. External web service to get employees images  
8. Employee avatar through web service images  
  
  
## Folder structure

``` 

├── assets
│   ├── css
│   │   ├── login.css
│   │   └── main.css
│   ├── html
│   │   ├── footer.html
│   │   ├── head.php
│   │   ├── header.php       
│   │   └── loginheader.php
│   ├── img
│   └── js
│       ├── app.js
│       ├── login.js   
│       └── utils.js
├── config
│   ├── config.php
│   ├── constants.php
│   └── db.sql
├── controllers
│   ├── avatars.php
│   ├── employee.php
│   ├── error.php.
│   └── login.php
├── libs
│   └── classes
│       ├── controller.php
│       ├── database.php
│       ├── router.php
│       ├── session.php
│       └── view.php
├── models
│   ├── avatarmodel.php
│   ├── employeemodel.php
│   └── loginmodel.php
├── nodemodules
├── views
│   ├── employee
│   |    ├── employee.php
│   |    └── imageGallery.php
│   ├── errors
│   |    └── errors.php
│   ├── login
│   |    └── login.php
│   └── dashboard.php
├── .gitignore
├── .htaccess
├── index.php
├── package.json
├── package-lock.json
├── viewsREADME.md
└── UML.drawio


OOP and MVC interaction on the example of employee/details/1 in url - calling method details with parameter of the Employee class:

<img src="https://docs.google.com/drawings/d/e/2PACX-1vQdZDHouFKzhukN86rmOg0EeHEk6S6mZSld_ShUwbK0Fww4p4rp5-HQJaJ-69nQ-cb3ClEjZv7ag4cT/pub?w=1173&amp;h=725">
``` 

## External libraries  
  
All them must be installed with the npm here you have a package.json take a look please.  
  
* [Bootstrap](https://getbootstrap.com/)  
* [Bootstrap icons](https://icons.getbootstrap.com/)  
* [JSGrid](http://js-grid.com/)  

## Images Web Service for the extra feature  
  
As we explained in the pdf document of this project we will use [this images api](https://uifaces.co/) 

  
This web service in the version free that is which we are going to use has limitations. Five request per minute or thirty in an hour.  
So if you want to develop this extra feature it would be cool to have a mocked response to develop at ease. So for this purpose we left in `resources/` folder a file called images_mock which can be used to the implementation of the extra feature once you have your code running well you need to remove this mock and to connect directly with the web service.   
  
[Read the doc!](https://uifaces.co/api-docs)  
  

## Curl  
  
In php we interact with HTTP web services through cUrl or client URL.   
This is also a command in Unix systems. We are going to give you an over view in order to familiarise with it and then use it in the application for the extra feature.  
  
To play a little with it, You can create a script in the root folder of your web server and with these request we have here to try make GET, POST. PUT and DELETE request against this super cool service which ables to developer to post and get data from what we call a request bin.  
[ReqBin ](https://reqbin.com/curl)  
  
  
#### Basic knowledge  
  
````  
<?php  
curl_init();      // initializes a session  
curl_setopt();    // changes the session behavior setting options  
curl_exec();      // executes the started session  
curl_close();     // closes the session and deletes data made by curl_init();  
````   
#### Adding headers to request  
```  
curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array(  
 'Header-Key: Header-Value', 'X-API-KEY: 5d17e5de89a3e35d3902c4d667534'));  
```  
  
#### Getting error messages from cUrl  
```  
$curlHandler = curl_init('https://hostname.com/resource/');  
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);  
  
if(curl_exec($curlHandler) === false)  
{  
 echo 'Curl error: ' . curl_error($curlHandler); //gets last cUrl error as a string  
}  
```  
  
#### Get Request  
```  
<?php  
  
$curlHandler = curl_init();  
  
curl_setopt($curlHandler, CURLOPT_URL, 'https://hostname.com/resource');  
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);  
  
$apiResponse = curl_exec($curlHandler);  
curl_close($curlHandler);  
  
$decodedResponse = json_decode($apiResponse);  
  
```  
  
#### Post Request  
```  
<?php  
  
$postData = [  
 'parameter1' => 'foo', 'parameter2' => 'bar'];  
  
$curlHandler = curl_init('http://hostname.com/api/resource');  
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);  
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call  
  
$apiResponse = curl_exec($curlHandler);  
curl_close($curlHandler);  
  
$decodedResponse = json_decode($apiResponse);  
  
```  
  
#### Post Request  
```  
<?php  
  
$postData = [  
 'parameter1' => 'foo', 'parameter2' => 'bar'];  
  
$curlHandler = curl_init('http://hostname.com/api/resource');  
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);  
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call  
  
$apiResponse = curl_exec($curlHandler);  
curl_close($curlHandler);  
  
$decodedResponse = json_decode($apiResponse);  
  
```  
  
#### Delete Request  
````  
$curlHandler = curl_init('http://hostname.com/api/resource');  
curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, 'DELETE');// Setting HTTP verb that will by used for the request  
  
$apiResponse = curl_exec($curlHandler);  
$httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);// Getting http response code  
curl_close($curlHandler);  
  
$decodedResponse = json_decode($apiResponse);  
````  
  
#### All together  
````
$postData = [  
 'parameter1' => 'foo', 'parameter2' => 'bar'];  
  
$curlHandler = curl_init('http://hostname.com/api/resource');  
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);  
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call  
  
$apiResponse = curl_exec($curlHandler);  
if (curl_errno($curlHandler)) {  
 $errorMessage = curl_error($curlHandler);  
 //throw error}  
curl_close($curlHandler);  
  
$decodedResponse = json_decode($apiResponse);  
````


## Authors ✒️
- **Yulia Belyakova & Iman Aazibou** - _All the work of design and code_ - [Repository](https://code.assemblerschool.com/yulia-belyakova/php-employee-management-v4)

previous step:
- **Jaime Botet & Alejandro Palomes** - _All the work of design and code_ - [Repository](https://code.assemblerschool.com/jaime-botet/php-employee-management-v3)

legacy code used, including employee form validaions by Ezequiel  (assets/js/utils.js):
- **Ezequiel Garay & Yulia Belyakova** - _All the work of design and code_ - [Repository](https://code.assemblerschool.com/yulia-belyakova/php-employee-management-v3)