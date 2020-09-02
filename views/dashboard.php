

<html>
<?php include "assets/head.php"; ?>

<body>
    <div class="general-container d-flex flex-column justify-content-between">

        <?php include "assets/header.html"; ?>

        <div class='main__content d-flex justify-content-center align-items-center flex-column'>
            <div class="container" id="jsGrid">
                <script>
                    var employees = '<?php echo $this->employees; ?>'; 
                      
                </script>
            </div>
        </div>

        <?php include 'assets/footer.html'; ?>
    </div>
    <script src="<?php echo constant('URL'); ?>assets/js/app.js"></script>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>node_modules/jsgrid/dist/jsgrid.min.js"></script>

</body>

</html>