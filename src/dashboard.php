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
   $('#add-employee').click(function(){
    $('#employee-row-info').prepend('<tr id="toggle">'
                + '<th scope="row"></th>'
                + '<td><input id="new-name"></td>'
                + '<td><input id="new-email"></td>'
                + '<td><input class="input-short" id="new-age"></td>'
                + '<td><input class="input-short" id="new-street"></td>'
                + '<td><input id="new-city"></td>'
                + '<td><input class="input-short" id="new-state"></td>'
                + '<td><input id="new-postal"></td>'
                + '<td><input id="new-phone"></td>'
                + '<td><i class="fas fa-plus text-success" id="new-user-save"></i></td>'
                + '</tr>')


                $("#new-user-save").on("click", function() {
                    let newName = $('#new-name').val();
                    let newEmail = $('#new-email').val();
                    let newAge = $('#new-age').val();
                    let newStreet = $('#new-street').val();
                    let newCity = $('#new-city').val();
                    let newState = $('#new-state').val();
                    let newPostal = $('#new-postal').val();
                    let newPhone = $('#new-phone').val();
                    $('#toggle').remove();

                    $.ajax({
                    method: "POST",
                    url: "../src/library/employeeController.php",
                    data: {action:"addemployee",name: newName, email: newEmail, age: newAge, street: newStreet, city: newCity, state: newState, postal: newPostal, phone: newPhone}, 
                    success: function() {
                        printTable();
                    }
                })
            })
        })
}

    </script>
    </body>
</html>