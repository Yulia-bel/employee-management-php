$(document).ready(function () {


  callGrid(JSON.parse(employees));

  function callGrid(employees) {
    
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
            type: "POST",
            url: "insert",
            dataFilter: function(response) {
               return JSON.parse(response)
              },
            data: {
              newEmployee: newEmployee 
            }
          }).done(function (response) {
            console.log(response)
          });
        },
        deleteItem: function (employee) {
          
          return $.ajax({
            type: "DELETE",
            url: "delete",
            data: {
              deleteId: employee.id
            },
          }).done(function (response) {
            console.log(response)
            //alert("Employee named deleted successfully!");
          });
        }
      },
      rowDoubleClick: function (row) {
        window.location.href = `details/${row.item.id}`
      },

      /*onItemInserting: function(args) {
        if(args.item.id === undefined) {
          $.ajax({
            url: "controllers/employeeController.php",
            method: "POST",
            data: {
              action: "getId"
            },
            success: function(data) {
              console.log(data)
              args.item.id = data
            }
          })
        }
      },*/

      data: employees,

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