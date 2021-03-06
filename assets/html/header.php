
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">Employee Management</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link dashboard-link" href="<?php echo constant('URL'); ?>employee/show">Dashboard</a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link employee-link" href="#">Employee</a> -->
                <a class="nav-link employee-link" href="<?php echo constant('URL'); ?>employee/details/0">Employee</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-warning" id="logout"><a href="<?php echo constant('URL'); ?>login/logout">Log out</a></button>
        </div>
    </div>
</nav>

