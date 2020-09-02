<!-- TODO Application entry point. Login view -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Managment</title>
  <!-- OWN STYLE -->
  <link href="assets/css/login.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <!-- DEPENDENCIES - JQUERY AND BOOTSTRAP-->
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <script src="assets/js/login.js"></script>
</head>


<body>
<div class="general-container d-flex flex-column justify-content-between">
    <?php include "assets/loginheader.html"; ?>

    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center mb-5">Sign In</h5>

              <form class="form-signin" method="POST" action="login/logIn">

                <div class="form-label-group">
                  <input type="text" id="inputName" name="email" class="form-control mb-3" placeholder="Username" required autofocus>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required>
                </div>

                <div class="form-label-group invisible" id="error_message">

                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit" id="login">Sign in</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'assets/footer.html'; ?>
  </div>
  <script type="text/javascript" src="node_modules/jsgrid/dist/jsgrid.min.js"></script>

</body>


</html>