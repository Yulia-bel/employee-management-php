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

}) 