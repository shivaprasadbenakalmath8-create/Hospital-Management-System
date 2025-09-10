<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us - Atharva Ayurveda Medical College and Hospital</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
    

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



if($_POST){

    

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob']
    );


    print_r($_SESSION["personal"]);
    header("location: create-account.php");




}

?>


    <center>
        <div style="margin-top: 7%;">
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">Add Your Personal Details to Continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Address: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="nic" class="form-label">NIC: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="nic" class="input-text" placeholder="NIC Number" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="dob" class="form-label">Date of Birth: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Next" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
    </div>
</center>
<div class="footer"><center>
    <p>&copy; 2025 Hospital Management System. All rights reserved.</p>
</center>
</div>

</body>
</html>