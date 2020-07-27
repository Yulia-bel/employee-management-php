<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<html>
<?php 
include "../assets/head.html";
session_start();

if(!isset($_SESSION["userId"])) {
    header('Location: ../index.php');
}

?>

    <body>
<?php
include "../assets/header.html";
?>
        <div class="table-container">
        <?php 
            echo $_SESSION["startTime"];
        ?>
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
    <script>

    $.ajax({
        method: 'POST',
        url: 'library/employeeController.php',
        data: {
            action: "select"
        },
        success: function(data){

            let user = JSON.parse(data);
            console.log(user);
            for(let i = 0; i < user.length; i++){
                $('#employee-row-info').append(
                '<tr>'
                + '<th scope="row"></th>'
                + '<td>' + user[i].name + '</td>'
                + '<td>' + user[i].email + '</td>'
                + '<td>' + user[i].age + '</td>'
                + '<td>' + user[i].streetAddress + '</td>'
                + '<td>' + user[i].city + '</td>'
                + '<td>' + user[i].state + ' </td>'
                + '<td>' + user[i].postalCode + '</td>'
                + '<td>' + user[i].phoneNumber + ' </td>'
                + '<td><i class="fas fa-trash-alt"></i></td>'
                + '</tr>'
                )
            }
        }
    })
    </script>
    <script src="../assets/login.js"></script>
    </body>
</html>