<?php
session_start();

if(isset($_SESSION['author_id'])){
    header('location:../dashboard/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../public/access/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/access/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../public/access/plugins/pace/pace.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sedan:ital@0;1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../public/access/style.css">



    <title>Protfolio</title>
</head>

<body>
   
    <div class="container" id="container">
<!-- Registor page start here ....................................................... -->
<!-- Registor page start here ....................................................... -->
        <div class="form-container sign-up">
            <form action="manage.php" method="POST">
                <h2>Create Account</h2>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span> Used Your Email For Registation !!  <b id="Login" style="font-size: 14px; cursor: pointer;" >LogIn</b></span>

                 <!-- name require star here.......!! -->
                <input type="text" name="name" placeholder="Name" <?php if (isset($_SESSION['name-error'])) {
                                                                        echo 'is-invalid';
                                                                    } else '';
                                                                    ?>
                 value="<?= (isset( $_SESSION['old-name'] )) ?  $_SESSION['old-name'] : ''; unset( $_SESSION['old-name'])?>" />
                <?php if (isset($_SESSION['name-error'])) { ?>
                  <div id="emailHelp" class="form-text m-b-md text-danger error "><?php echo $_SESSION['name-error'] ?></div>
                <?php }
                unset($_SESSION['name-error']) ?>
                 <!-- name require star here.......!! -->

                <!-- email require star here...........!! -->
                <input type="email" name="email" placeholder="Email" <?php if (isset($_SESSION['name-error'])) {
                                                                            echo 'is-invalid';
                                                                        } else ''; ?> 
                value="<?= (isset( $_SESSION['old-email'] )) ?  $_SESSION['old-email'] : ''; unset( $_SESSION['old-email'])?>"/>
               
                <?php if (isset($_SESSION['email-error'])) { ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger error "><?php echo $_SESSION['email-error'] ?></div>
                <?php }
                unset($_SESSION['email-error']) ?>
                <!-- email require end  here.......-->

                <!-- password require star here..........!! -->

                <input type="password" id="signUpPassword" name="password" placeholder="Password" style="position: relative;" <?php if (isset($_SESSION['pass-error'])) {
                                                                                                                                    echo 'is-invalid';
                                                                                                                                } else '';
                                                                                                                                ?>                                                                                                            
                value="<?= (isset( $_SESSION['old-pass'] )) ?  $_SESSION['old-pass'] : ''; unset( $_SESSION['old-pass'])?>" />
                <span style="position: absolute; right:50px; top:340px; opacity:70%;" class="toggle-password" onclick="togglePasswordVisibility('signUpPassword')">
                            <i class="material-icons">visibility_off</i>
                </span> 
                <?php if (isset($_SESSION['pass-error'])) { ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger error "><?php echo  $_SESSION['pass-error'] ?></div>
                    <?php }
                unset($_SESSION['pass-error']) ?>
                 <!-- password require star here..........!! -->

                <!-- C-password require star here.........!! -->
                <input type="password" id="signUpCPassword" name="cpassword" placeholder="Confirm Password" style="position:relative;" <?php if (isset($_SESSION['Cpass-error'])) {
                                                                                                                                            echo 'is-invalid';
                                                                                                                                        } else '';
                                                                                                                                        ?> 
                    value="<?= (isset( $_SESSION['old-cpass'] )) ?  $_SESSION['old-cpass'] : ''; unset( $_SESSION['old-cpass'])?>" />
                    <span style="position: absolute; right:50px; bottom:150px; opacity:70%;" class="toggle-password" onclick="togglePasswordVisibility('signUpCPassword')">
                            <i class="material-icons">visibility_off</i>
                    </span>
                <?php if (isset($_SESSION['Cpass-error'])) { ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger error "><?php echo     $_SESSION['Cpass-error'] ?></div>
                    <?php }
                unset($_SESSION['Cpass-error']) ?>
               <!-- C-password require star here.........!! -->
                <button type="submit" name="signupbtn">Sign Up</button>
            </form>
        </div>


<!-- Registor page end here ....................................................... -->
<!-- Registor page end here ....................................................... -->
<!-- Registor page end here ....................................................... -->

<!-- login page start here ....................................................... -->
<!-- login page start here ....................................................... -->
<!-- login page start here ....................................................... -->


        <div class="form-container sign-in">
            <form action="manage.php" method="POST">
                <h2>Sign In</h2>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>Uesd Your Email &&  Password..!!  <b id="Regis" style="font-size: 14px; cursor: pointer;">SignIn</b></span>


                <!-- complate refistor messs -->
                <?php if(isset($_SESSION['regis-complate'])) { ?>
                    <div class="alert alert-custom display:flex;" role="alert">
                       <div class="custom-alert-icon icon-success icon "><i class="material-icons-outlined  ico">done</i></div>
                                                          
                       <div class="alert-content">
                           <span class="alert-title">
                               <?php echo $_SESSION['regis-complate'] ?>
                            </span>
                            <br>
                            <span  class="alert-text">
                             <?php echo  $_SESSION['regis-name']?>
                         </span>
                               </div>
                    </div>
                    <?php } unset($_SESSION['regis-complate'])?>
                <!-- complate refistor messs -->

                 <!-- email require star here...........!! -->
                <input type="email" name="email" placeholder="Email" style="position: relative; " value="
                <?php 
                if(isset( $_SESSION['email-regis'])) {echo  $_SESSION['email-regis'];}
                else{
                    echo ' ';
                } unset( $_SESSION['email-regis']);
                    ?>" 
                <?php if (isset($_SESSION['name-error'])) {
                    echo 'is-invalid';
                } else ''; ?> />

                <?php if (isset($_SESSION["login_unsuccuessfull"])) { ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger error "><?php echo $_SESSION["login_unsuccuessfull"]?></div>
                    <?php }
                unset($_SESSION["login_unsuccuessfull"]) ?>

                
                <?php if (isset($_SESSION['login-email'])) { ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger error "><?php echo  $_SESSION['login-email'] ?></div>
                <?php }
                unset($_SESSION['login-email']) ?>

                <!-- email require end here...........!! -->
                <input type="password" name="password" placeholder="Password"  style="position: relative;"<?php if (isset($_SESSION['pass-erro'])) {
                                                                                    echo 'is-invalid';
                                                                                } else ''; ?>>

              
                <?php if (isset($_SESSION['pass-erro'])) { ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger error "><?php echo $_SESSION['pass-erro'] ?></div>
                <?php }
                unset($_SESSION['pass-erro']) ?>
                <!-- password require end here...........!! -->



           
<a href="#">Forget Your Password?</a>
                <button type="submit" name="signinbtn">Sign In</button>
            </form>
        </div>

<!-- login page end here ....................................................... -->
<!-- login page end here ....................................................... -->
<!-- login page end here ....................................................... -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
        
    </div>

    <script src="script.js"></script>


    <!-- <script src="../public/access/script.js"></script>  -->
    <script>
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const redis = document.getElementById('Regis');
const Login = document.getElementById('Login');

function showSignUp() {
    container.classList.add("active");
}

// Function to show sign-in form if sign-up was successful
function showSignIn() {
    container.classList.remove("active");
}
function showregis() {
    container.classList.add("active");
}

// Function to show sign-in form if sign-up was successful
function showLogin() {
    container.classList.remove("active");
}

<?php if (isset($_SESSION['show-signin']) && $_SESSION['show-signin'] == true) { ?>
    showSignIn();
<?php } else { ?>
    showSignUp();
<?php } ?>
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
redis.addEventListener('click', () => {
    container.classList.add("active");
});

Login.addEventListener('click', () => {
    container.classList.remove("active");
});


function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            var icon = input.nextElementSibling.querySelector('.material-icons');
            if (input.type === "password") {
                input.type = "text";
                icon.textContent = "visibility";
            } else if (input.type === "text") {
                input.type = "password";
                icon.textContent = "visibility_off";
            }
        }


    </script>

</body>

</html>