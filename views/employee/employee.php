<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>assets/css/main.css">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>assets/img/logo.png">
    <title>Employee Edit</title>
</head>
<body>
    <div class="main d-flex flex-column justify-content-between">
        <?php include('assets/header.html') ?>
        <div class='main__content d-flex justify-content-center align-items-center flex-column'>
            <div id="formErrMsg" class="d-none errorMsg mb-4 align-items-center justify-content-center alert">
                <span>Please, correct the highlighted errors.</span>
            </div>
            <div id="profilePicCont" class="profile__img d-flex justify-content-center align-items-center mt-3">
                <img src="<?= $employee && isset($employee->img) ? $employee->img : "assets/img/usuario.svg" ?>" alt="profile picture" id="profileImg">
            </div>
            <div id="profilePicSelect" class="profile__img--selector d-none flex-wrap justify-content-sm-between justify-content-center mt-3">
            </div>
            <form id="employeeForm" class="my-5" name="employeeInfo" method="POST" action="index.php">
                <input type="hidden" name="controller" value="employee">
                <input type="hidden" name="action" value="updateEmployeeCont">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="nameInp" name="name" placeholder="Name" value="<?= $this->employee && isset($this->employee->name) ? $this->employee->name : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Last Name</label>
                        <input type="text" class="form-control" id="surnameInp" placeholder="Last name" name="lastName" value="<?= $this->employee && isset($this->employee->lastName) ? $this->employee->lastName : "" ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email adress</label>
                        <input type="email" class="form-control" name="email" id="emailInp" placeholder="Email address" value="<?= $this->employee && isset($this->employee->email) ? $this->employee->email : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select name="gender" id="genderInp" class="form-control" value="">
                            <option value="select" disabled selected>Select</option>
                            <option value="man" <?= $this->employee && isset($this->employee->gender) ? ($this->employee->gender == "man" ? "selected" : "") : ""?>>Man</option>
                            <option value="woman" <?= $this->employee && isset($this->employee->gender) ? ($this->employee->gender == "woman" ? "selected" : "") : ""?>>Woman</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" name="city" id="cityInp" class="form-control" placeholder="City" value="<?= $this->employee && isset($this->employee->city) ? $this->employee->city : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Street Address</label>
                        <input type="text" name="streetAddress" id="addressInp" class="form-control" placeholder="Street Adress" value="<?= $this->employee && isset($this->employee->streetAddress) ? $this->employee->streetAddress : "" ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="state">State</label>
                        <input type="text" name="state" id="stateInp" class="form-control" placeholder="State or Province" value="<?= $this->employee && isset($this->employee->state) ? $this->employee->state : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="ageInp" class="form-control" placeholder="Age" value="<?= $this->employee && isset($this->employee->age) ? $this->employee->age : "" ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="po">Postal Code</label>
                        <input type="text" name="postalCode" id="poInp" class="form-control" placeholder="Postal Code" value="<?= $this->employee && isset($this->employee->postalCode) ? $this->employee->postalCode : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="phoneInp" class="form-control" placeholder="Phone number" value="<?= $this->employee && isset($this->employee->phoneNumber) ? $this->employee->phoneNumber : "" ?>">
                        <input type="hidden" name="id" id="id" value="<?= $this->employee && isset($this->employee->id) ? $this->semployee->id : "" ?>">
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-dark" id='submitForm'>Submit</button>
                    <a href="<?= $_SERVER["HTTP_REFERER"] ?>" class="btn btn-outline-danger mx-2" id="returnBtn">Return</a>
                </div>
            </form>
        </div>
        <?php include('assets/footer.html') ?>
    </div>
    <script src="<?php echo constant('URL'); ?>node_modules/jquery/dist/jquery.js"></script>
    <script src="<?php echo constant('URL'); ?>https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>node_modules/bootstrap/js/dist/index.js" defer></script>
    <script src="<?php echo constant('URL'); ?>https://unpkg.com/axios/dist/axios.min.js"></script>

</body>
</html>