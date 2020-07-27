<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<html>
<?php 
include "../assets/head.html";
?>

    <body>
<?php
include "../assets/header.html";
?>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Street No.</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Phone number</th>
                        <th scope="col"><i class="fas fa-plus"></i></th>
                    </tr>
                </thead>
                <tbody id="employee-row-info">
                </tbody>
            </table>
        <div>
    </body>
</html>