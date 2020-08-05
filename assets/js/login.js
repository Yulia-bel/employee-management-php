$(document).ready(function () {

  $("#login").on("click", function (e) {
    e.preventDefault()
    let username = $("#inputName").val();
    let password = $("#inputPassword").val();
    console.log(username);
    $.ajax({
      method: "POST",
      url: "?controller=login",
      data: {
        name: username,
        password: password
      },
      success: (data) => {
        console.log(data);
        if (data == "true") {
          // location.replace("src/dashboard.php");
          location.href = `?controller=login&action=loadDashboard`;
        } else {
          $("#error_message").text(data);
          $("#error_message").addClass("text-danger mb-3");
          $("#error_message").removeClass("invisible");

        }
      }
    })
  })

  $.ajax({
    method: 'GET',
    url: "resources/employees.json",

    success: function (data) {
      console.log(data);
      // let employees = JSON.parse(data)
      // console.log(employees);

      $("#jsGrid").jsGrid({
        height: "auto",
        width: "100%",
        filtering: false,
        inserting: true,
        editing: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete this employee?",
        controller: {
          loadData: function () {
            return $.ajax('library/employeeController.php');
          },
          insertItem: function (newEmployee) {
            console.log(newEmployee)
            return $.ajax({
              type: "POST",
              url: "controllers/employeeController.php",
              data: {
                action: "addemployee",
                newEmployee: newEmployee
              }
            }).done(function (response) {
              console.log(response)
              //alert("Employee named " + newEmployee.name + " inserted successfully!");
            });
          },
          deleteItem: function (employee) {
            return $.ajax({
              type: "DELETE",
              url: ".controllers/employeeController.php",
              data: {
                "deleteId": employee.id
              },
            }).done(function (response) {
              alert(response);
            });
          }
        },
        rowClick: function (row) {
          window.location.replace(`../src/employee.php?employee_id=${row.item.id}`);
          //TODO modify this replace -> check if the line beneath works as expected
          // location.href = `index.php?view=employee&employee_id=${row.item.id}`;

        },
        onItemInserting: function (args) {
          if (args.item.id === undefined) {
            $.ajax({
              url: "controllers/employeeController.php",
              method: "POST",
              data: {
                action: "getId"
              },
              success: function (data) {
                console.log(data)
                args.item.id = data
              }
            })
          }
        },

        data: data,

        fields: [{
            name: "id",
            title: "Id",
            visible: false,
            width: 0
          },
          {
            name: "name",
            title: "Name",
            type: "text",
            width: 100
          },
          {
            name: "email",
            title: "Email",
            type: "text",
            width: 200
          },
          {
            name: "age",
            title: "Age",
            type: "number",
            width: 75
          },
          {
            name: "streetAddress",
            title: "Street No.",
            type: "text",
            width: 100
          },
          {
            name: "city",
            title: "City",
            type: "text",
            width: 120
          },
          {
            name: "state",
            title: "State",
            type: "text",
            width: 70
          },
          {
            name: "postalCode",
            title: "Postal Code",
            type: "text",
            width: 100
          },
          {
            name: "phoneNumber",
            title: "Phone Number",
            type: "text",
            width: 140
          },
          {
            type: "control",
            editButton: false,
            width: 50
          }
        ]
      });

    }
  })

})