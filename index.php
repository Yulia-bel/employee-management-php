<!-- TODO Application entry point. Login view -->

<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Managment</title>
    <!-- OWN STYLE -->
    <link href="css/login.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- DEPENDENCIES - JQUERY AND BOOTSTRAP-->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <script src="assets/login.js"></script>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center mb-5">Sign In</h5>

              <form class="form-signin">

                <div class="form-label-group">
                  <input type="email" id="inputEmail" name="email" class="form-control mb-3" placeholder="Email address" required autofocus>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required>
                </div>

                <div class="form-label-group invisible" id="error_message">
                  
                </div>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="login">Sign in</button>
               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>


</html>