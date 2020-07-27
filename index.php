<!-- TODO Application entry point. Login view -->

<html lang="en">
<?php
require "assets/head.html";
?>

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