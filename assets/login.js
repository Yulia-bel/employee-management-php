$(document).ready(function() {

  $("#login").on("click", function(e) {
    e.preventDefault()
    let email = $("#inputEmail").val();
    let password = $("#inputPassword").val();

    $.ajax({
      method: "POST",
      url: "src/library/loginController.php",
      data: {email:email, password:password },
      success: (data) => {
        console.log(data)
        if (data == "true" ) {
          window.location.replace("src/dashboard.php");
        } else {
          $("#error_message").text(data);
          $("#error_message").addClass("text-danger mb-3");
          $("#error_message").removeClass("invisible");
        
        }
      }
    })
  })

  $("#logout").on("click", function() {
    $.get("../src/library/sessionHelper.php", {action: "logout"}, function(data){

      if (data == "success") window.location.replace("../index.php");
    })
  })

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
                + '<td id="' + employeesJsonObject[i].id + '">' + employeesJsonObject[i].name + '</td>'
                + '<td>' + employeesJsonObject[i].email + '</td>'
                + '<td>' + employeesJsonObject[i].age + '</td>'
                + '<td>' + employeesJsonObject[i].streetAddress + '</td>'
                + '<td>' + employeesJsonObject[i].city + '</td>'
                + '<td>' + employeesJsonObject[i].state + ' </td>'
                + '<td>' + employeesJsonObject[i].postalCode + '</td>'
                + '<td>' + employeesJsonObject[i].phoneNumber + ' </td>'
                + '<td><i class="fas fa-trash-alt" data-del="' + employeesJsonObject[i].id + '"></i></td>'
                + '</tr>')

                $(`#${employeesJsonObject[i].id}`).on("click", function() {       
                    let employeeId = employeesJsonObject[i].id;
                    //On click event cjanges the URI part of url so that we can later acces it with $_GET['employee_id'] on employee.php page (for example employee.php?employee_id=1)
                    window.location.replace(`employee.php?employee_id=${employeeId}`)
                  })

                $(`i[data-del='${employeesJsonObject[i].id}']`).on("click", function (event) {
                    if (confirm(`Are you sure you want to delete ${employeesJsonObject[i].name}?`)) {
                      let employeeId = $(event.target).attr('data-del');
                    
                      $.ajax({
                        method: "POST",
                        url: "library/employeeController.php",
                        data: {deleteId: employeeId},
                        success: function (data) {
                          if (data == "expired") {
                            window.location.replace(`../index.php?logout=true`)
                          } else {
                            printTable();
                          }
                        }
                      })     
                    }
                  })
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



}) 