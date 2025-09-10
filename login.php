<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us - Atharva Ayurveda Medical College and Hospital</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
<!-- in <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- before </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar {
            background-color: #0d6efd; /* Hospital blue */
            padding: 15px 0;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #cfe2ff !important;
        }
        .btn-login {
            background-color: white;
            color: #0d6efd;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-color: #cfe2ff;
        }
        .btn-register {
            background-color: transparent;
            border: 2px solid white;
            color: white;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>

    
    
</head>
<body>
    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><h6 style="color: #0d6efd;"><i class="fas fa-home me-1"></i> Home</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html"><h6 style="color: #0d6efd;"><i class="fas fa-info-circle me-1"></i>About Us</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><h6 style="color: #0d6efd;"><i class="fas fa-user-md me-1"></i> Admin</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php"><h6 style="color: #0d6efd;"><i class="fas fa-procedures me-1"></i> Patient</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><h6 style="color: #0d6efd;"><i class="fas fa-user-md me-1"></i> Doctors</h6> </a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="login.php" class="btn btn-login me-2"><h6 style="color: #0d6efd;"><i class="fas fa-sign-in-alt me-1"></i> Login</h6></a>
                    <a href="signup.php" class="btn btn-register"> <h6 style="color: #0d6efd;"><i class="fas fa-user-plus me-1"></i> Register</h6></a>
                </div>
            </div>
        </div>
    </nav>

    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
    include("connection.php");
    function generate_captcha()
    {
        $captcha_code = substr(md5(uniqid(mt_rand(), true)), 0, 6);
        $_SESSION['captcha_code'] = $captcha_code;
        $image = imagecreate(100, 30);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        imagestring($image, 5, 20, 5, $captcha_code, $text_color);
        header("Content-type: image/png");
        imagepng($image);
        imagedestroy($image);
    }
    
    



    if($_POST){

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        $captcha_input = $_POST['captcha'];

    if ($captcha_input !== $_SESSION['captcha_code']) {
        echo ("<script>alert('Invalid CAPTCHA code. Try Again!');
    window.location.href = 'login.php';</script>");
        exit;
    }
        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                //TODO
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){


                    //   Patient dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    header('location: patient/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }elseif($utype=='d'){
                //TODO
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows==1){


                    //   doctor dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }






        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>





    <center>
        <div style="margin-top: 7%;">
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Welcome Back!</p>
                </td>
            </tr>
        <div class="form-body">
            <tr>
                <td>
                    <p class="sub-text">Login with your details to continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <label for="userpassword" class="form-label">Password: </label>
                </td>
            </tr>

            <tr>
                <td class="label-td">
                    <input type="Password" name="userpassword" class="input-text" placeholder="Password" required>
                </td>
            </tr>

                <tr>
                <td class="label-td">
                    <img src="captcha.php" alt="Captcha" id="captcha_image" onclick="refreshCaptcha()">
                    
                    <input type="submit" value="Refresh" onclick="refreshCaptcha()" style="background-color: #0d6efd; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">

                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="captcha" placeholder="Enter Captcha" required>
                </td>
            </tr>

            <tr>
                <td><br>
                <?php echo $error ?>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Login" class="login-btn btn-primary btn">
                </td>
            </tr>
        </div>
            <tr>
                <td>
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                    <a href="signup.php" class="hover-link1 non-style-link">Sign Up</a>
                    <br><br><br>
                </td>
            </tr>
                        
                        
    
                        
                    </form>
        </table>

    </div>
    </div>
</center>
<div class="footer"><center>
    <p>&copy; 2025 Hospital Management System. All rights reserved.</p>
</center>
</div>

<script>
      function refreshCaptcha() {
        var captcha = document.getElementById('captcha_image');
        captcha.src = 'captcha.php?' + Date.now();
      }
    </script>

</body>
</html>
