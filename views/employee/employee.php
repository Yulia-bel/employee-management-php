<!-- TODO Employee view -->
<html>
<?php 

require "assets/head.html";
// require "models/employeeManager.php";


//Saving employee id previously passed through url in js on click event (login.js, line 64)

$employeeId = $_GET['id'];

if(!isset($_GET['id'])) {
  exit('Id required');
}

// using the function from employeeManager.php directly here - in $employee we save the object of the employee found by employeeManager by id of employee

$employee = getEmployee($_GET["id"]);

/* the properties of $employee we put directly in form as value using the syntax: value='<?= $employee->name ?>'*/

// $now = (new \DateTime())->format('U');

//   $timeDifference = $now - $_SESSION["startTime"];

//   if($timeDifference > 500) {
//     $_SESSION = array();
//     session_destroy();
//     header("Location: index.php?logout=$timeDifference");
//   }

?>

    <body>
    <?php
    include "assets/header.html";
    ?>

    

      <div class="container">
        <form class="w-75 mt-5" method="POST" action="index.php?controller=employee&action=update">

        <div class="form-row mb-3">
          <?php
            if(property_exists($employee, "photo")) echo "<img src='$employee->photo' alt='No avatar' width='300' height='300'>";
            else echo "No avatar chosen"
          ?>
            
        </div>

          <?php
            include "imageGallery.php";
          ?>

          <div class="form-row mb-3">
            <div class="col">
              <label for="emName" class="ml-2">First Name</label>
              <input type="text" class="form-control" name="emName" id="emName" placeholder="First name" value="<?= $employee->name ?>">
            </div>
            <div class="col">
              <label for="emLname" class="ml-2">Last Name</label>
              <input type="text" class="form-control" name="emLname" id="emLname" placeholder="Last name" value="<?= $employee->lastName ?>">
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="col">
              <label for="emEmail"class="ml-2">Email</label>
              <input type="text" class="form-control" name="emEmail" id="emEmail" placeholder="Email" value="<?= $employee->email ?>">
            </div>
            <div class="col">  
              <label for="emGender" class="ml-2">Gender</label>  
              <select id="emGender" name="emGender" class="form-control">
                <option selected>Female</option>
                <option>Male</option>
              </select>
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="col">
              <label for="emCity" class="ml-2">City</label> 
              <input type="text" class="form-control" name="emCity" id="emCity" placeholder="City" value="<?= $employee->city ?>">
            </div>
            <div class="col">
              <label for="emStreet" class="ml-2">Street</label> 
              <input type="text" class="form-control" name="emStreet" id="emStreet" placeholder="Street Address" value="<?= $employee->streetAddress ?>">
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="col">
              <label for="emState" class="ml-2">State</label> 
              <input type="text" class="form-control" name="emState" id="emState" placeholder="State" value="<?= $employee->state ?>">
            </div>
            <div class="col">
              <label for="emAge" class="ml-2">Age</label> 
              <input type="text" class="form-control" name="emAge" id="emAge" placeholder="Age" value="<?= $employee->age ?>">
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="col">
              <label for="emPostal" class="ml-2">Postal Code</label> 
              <input type="text" class="form-control" name="emPostal" id="emPostal" placeholder="Postal Code" value="<?= $employee->postalCode ?>">
            </div>
            <div class="col">
              <label for="emPhone" class="ml-2">Phone Number</label> 
              <input type="text" class="form-control" name="emPhone" id="emPhone" placeholder="Phone Number" value="<?= $employee->phoneNumber ?>">
              <input type="text" class="form-control invisible" name="emId" id="emId" placeholder="Phone Number" value="<?= $employee->id ?>">
              <input type="text" class="form-control invisible" name="emPhoto" id="emPhoto" placeholder="Phone Number" value="">
            </div>
          </div>

          <div class="form-row mb-3">
            <div class="col">
              <input type="submit" class="btn btn-primary mr-4" id="emSave" value="Submit">
              <input type="button" class="btn btn-primary" id="emReturn" value="Return" onclick="location.href='?controller=login&action=loadDashboard'">
            </div>
          </div>
        </form>
      </div>
         
      <script src="assets/js/login.js"></script>
      <script type="text/javascript" src="node_modules/jsgrid/dist/jsgrid.min.js"></script>
    </body>
</html>