<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<html>
<?php include "assets/head.html"; ?>

<body>
    <div class="general-container d-flex flex-column justify-content-between">
        <?php
        include "assets/header.html";
        ?>

        <div class="container-main py-5 px-4 px-md-5 container-fluid">
            <div id="jsGrid"></div>
        </div>

        <?php include 'assets/footer.html'; ?>
    </div>
    <script src="assets/js/login.js"></script>
    <script type="text/javascript" src="node_modules/jsgrid/dist/jsgrid.min.js"></script>

</body>

</html>