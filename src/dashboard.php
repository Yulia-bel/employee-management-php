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
                        <th scope="col"><i id="add-employee" class="fas fa-plus text-success"></i></th>
                    </tr>
                </thead>
                <tbody id="employee-row-info">
                </tbody>
            </table>
        <div>
    <script>
    let employeesJsonObject;
    printTable();
    

    function printTable(){
        $('#employee-row-info').html("");
        $.ajax({
        method: 'POST',
        url: 'library/employeeController.php',
        data: {
            action: "select",

        },
        success: function(data){

            employeesJsonObject = JSON.parse(data);
            console.log(employeesJsonObject);
            let maxRow = (employeesJsonObject.length > 10)?10:employeesJsonObject.length
            for(let i = 0; i < maxRow; i++){
                $('#employee-row-info').append(
                '<tr>'
                + '<th scope="row"></th>'
                + '<td>' + employeesJsonObject[i].name + '</td>'
                + '<td>' + employeesJsonObject[i].email + '</td>'
                + '<td>' + employeesJsonObject[i].age + '</td>'
                + '<td>' + employeesJsonObject[i].streetAddress + '</td>'
                + '<td>' + employeesJsonObject[i].city + '</td>'
                + '<td>' + employeesJsonObject[i].state + ' </td>'
                + '<td>' + employeesJsonObject[i].postalCode + '</td>'
                + '<td>' + employeesJsonObject[i].phoneNumber + ' </td>'
                + '<td><i id="delete-employee" class="fas fa-trash-alt"></i></td>'
                + '</tr>')
            }
        }
    }
)
}

    </script>
    </body>
</html>