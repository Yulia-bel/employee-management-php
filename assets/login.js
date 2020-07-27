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

  $.ajax({
    method: 'POST',
    url: '/php-employee-management-v1/src/library/employeeController.php',
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
            + '<td id="' + user[i].id + '">' + user[i].name + '</td>'
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

            $(`#${user[i].id}`).on("click", function() {
              
              let employeeId = user[i].id;

              window.location.replace(`employee.php?employee_id=${employeeId}`)


              /*$.get('library/employeeController.php', {action: "show", id: employeeId}, function(data) {
                
                let employee = JSON.parse(data);
                console.log(employee)
                $("#emName").val(employee.name);
                $("#emLname").val(employee.lastName);
                $("#emEmail").val(`${employee.email}`);
                $("#emGender").val(`${employee.gender}`);
                $("#emCity").val(`${employee.city}`);
                $("#emStreet").val(`${employee.streetAddress}`);
                $("#emState").val(`${employee.state}`);
                $("#emAge").val(`${employee.age}`);
                $("#emPostal").val(`${employee.postalCode}`);
                $("#emPhone").val(`${employee.phoneNumber}`);
               

              })*/
            })
        }
    }
})

$('#add-employee').click(function(){
$('#employee-row-info').prepend('<div class="new-employee-div"><form><tr><th scope="row"></th><tr></div>').prepend('<tr>'
            + '<th scope="row"></th>'
            + '<td><input id="new-name"></td>'
            + '<td><input id="new-email"></td>'
            + '<td><input class="input-short" id="new-age"></td>'
            + '<td><input class="input-short" id="new-str"></td>'
            + '<td><input id="new-city"></td>'
            + '<td><input class="input-short" id="new-state"></td>'
            + '<td><input id="new-postal"></td>'
            + '<td><input id="new-phone"></td>'
            + '<td><i class="fas fa-plus text-success" id="new-user-save"></i></td>'
            + '</tr></form>')


  })







}) 