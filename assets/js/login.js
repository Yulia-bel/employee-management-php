$(document).ready(function () {

  $("#login").on("click", function (e) {
    e.preventDefault()
    let username = $("#inputName").val();
    let password = $("#inputPassword").val();
    $.ajax({
      method: "POST",
      url: "?controller=login",
      data: {
        name: username,
        password: password
      },
      success: (data) => {
        if (data == "true") {
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
    // url: "resources/employees.json",
    url: "libs/database.php?action=getEmployees",

    success: function (data) {
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
          insertItem: function (newEmployee) {
            return $.ajax({
              method: "POST",
              url: "index.php",
              data: {
                controller: "employee",
                action: "addemployee",
                newEmployee: newEmployee
              }
            }).done(response => {
              alert("Employee named " + newEmployee.name + " inserted successfully!");
              return response;
            }).fail(console.log);
          },
          deleteItem: function (employee) {
            return $.ajax({
              type: "DELETE",
              url: `index.php?controller=employee`,
              data: {
                "deleteId": employee.id
              },
            }).done(function (response) {
              alert("Employee deleted");
            }).fail(console.log);
          }
        },
        rowClick: function (row) {
          location.href = `index.php?controller=employee&action=showEmployee&id=${row.item.id}`;
        },
        //Not necessary this function?
        // onItemInserting: function (args) {
        //   if (args.item.id === undefined) {
        //     $.ajax({
        //       url: "index.php?controller=employee",
        //       method: "POST",
        //       data: {
        //         action: "getId"
        //       },
        //       success: function (data) {
        //         args.item.id = data;
        //       }
        //     })
        //   }
        // },

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

  //If we are showing an employee, add/remove the active class in the navbar links
  if (window.location.href.indexOf("controller=employee&action=showEmployee") > -1) {
    $(".employee-link").parent().addClass("active");
    $(".dashboard-link").parent().removeClass("active");
  }

  //Or when we click, we change the add/remove the active class in the navbar links
  $(".dashboard-link").click(() => {
    if (!$(".dashboard-link").parent().hasClass("active")) {
      $(".dashboard-link").parent().addClass("active");
      $(".employee-link").parent().removeClass("active");
    }
  })
  $(".employee-link").click(() => {
    if (!$(".employee-link").parent().hasClass("active")) {
      $(".employee-link").parent().addClass("active");
      $(".dashboard-link").parent().removeClass("active");
    }
  })
})