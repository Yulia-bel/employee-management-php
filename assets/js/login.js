$("#login").click(function() {
  console.log('hello')
  $('#error_message').empty();
  let email = $("#inputEmail").val();
  let password = $("#inputPassword").val();

  $.ajax({
    type: 'post',
    url: 'http://localhost/php-employee-management-v4/login/validate',
    data: {
       email: email,
       password: password
    }
 }).done(function (response) {
    if (response.includes('true')) {
      window.location.href = 'http://localhost/php-employee-management-v4/employee/show';
    } else if (response.includes('false')) {
      $('#error_message').removeClass("invisible");
      $('#error_message').append("<p class='login_error'>Wrong Password</p>");
    } else {
      $('#error_message').removeClass("invisible");
      $('#error_message').append("<p class='login_error'>Email not found</p>");
    }
 })
})