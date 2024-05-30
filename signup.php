<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $fullname = $_POST['fullname'];
    $emailaddress = $_POST['emailaddress'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $phonenumber = $_POST['phonenumber'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    if(!empty($emailaddress) && !empty($password) && !is_numeric($emailaddress))
    {
        $query = "insert into user(fullname, emailaddress, password, age, phonenumber, dateofbirth, gender, address) values('$fullname', '$emailaddress', '$password','$age', '$phonenumber', '$dateofbirth', '$gender', '$address')";

        mysqli_query($con, $query);

        echo "<script type='text/javascript'> alert('Successfully Register')</script>";
    }

    else{
        echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
        
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - MyGov</title>
    <style>
        /* CSS styles */

        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* Apply box-sizing border-box to all elements */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }

        /* Style the header */
        header {
            background-color: rgb(64, 136, 64);
            color: #fff;
            padding: 15px 0;
        }

       header h1 {
            float: left;
        }

        nav {
            float: right;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            display: inline;
            margin-left: 20px;
        }

        nav ul li a {
            color: #fff;
            font-size: large;
            text-decoration: none;
        }
        /* Style the input boxes */
        .input-box {
            margin-bottom: 20px;
            font-size: medium;
        }

       .input-box label {
            display: block;
            margin-bottom: 5px;
        }

        .input-box input,
        .input-box textarea {
            width: 20%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-box textarea {
            resize: vertical; /* Allow vertical resizing */
        }

        .banner {
            background-image: url('signup.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            color: black;
            text-align: center;
            background-position: cover;
            width: 1470px;
            height: 1000px;
            padding: 100px 0;
        }

        /* Style the Sign Up button */
        .button {
            display: block;
            margin:auto;
            width: 15%;
            padding: 10px;
            background-color: #000000;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #595252;
        }

        

        /* Responsive Layout */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }

        @media (max-width: 600px) {
            header {
                padding: 10px 0;
            }
            header h1 {
                float: none;
                text-align: center;
                margin-bottom: 20px;
            }
            nav {
                float: none;
                text-align: center;
            }
            nav ul li {
                display: block;
                margin: 0;
            }
            .banner {
                padding: 80px 0;
            }
        }
    </style>

</head>
<body>
    <header>
        <div class="container">
            <h1>MyGov</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="signup.html">Sign Up</a></li>
                    <li><a href="signin.html">Sign In</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="banner">
        <h1><b>Sign Up</b></h1>
        <section class="cover">
            <div class="container"></div>
        </section>
        <form method="POST">
            <div class="input-box">
                <label><b>Full Name</b></label>
                <input type="text" name="fullname" placeholder="Enter name" required />
            </div>

            <div class="input-box">
                <label><b>Email Address</b></label>
                <input type="text" name="emailaddress" placeholder="Enter email address" required />
            </div>

            <div class="input-box">
                <label><b>Password</b></label>
                <input type="password" name="password" placeholder="Enter password" required />
            </div>

            <div class="input-box">
                <label><b>Confirm Password:</b></label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="input-box">
                <label><b>Age</b></label>
                <input type="text" name="age" placeholder="Enter age" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label><b>Phone Number</b></label>
                    <input type="number" name="phonenumber" placeholder="Enter phone number" required />
                </div>
                <div class="input-box">
                    <label><b>Date of Birth</b></label>
                    <input type="date" name="dateofbirth" placeholder="Enter date of birth" required />
                </div>
            </div>
            <div class="gender-box">
                <label><b>Gender</b></label>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="m" checked />
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="f" />
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gender" value="o" />
                        <label for="check-other">Prefer not to say</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label><b>Address</b></label>
                <input type="text" placeholder="Enter street address" name="address" required />
                <div class="column">
                    <div class="select-box">
                        <select name="country">
                            <option hidden>Country</option>
                            <option>Bangladesh</option>
                            <option>Sri-Lanka</option>
                            <option>India</option>
                            <option>Japan</option>
                        </select>
                    </div>
                    <input type="text" placeholder="Enter your city" name="city" required />
                </div>
                <div class="column">
                    <input type="text" placeholder="Enter your region" name="region" required />
                    <input type="number" placeholder="Enter postal code" name="postalcode" required />
                </div>
            </div>
            <button type="signup" class="button">Sign Up</button>
            </form>
            <p>Already have an account? <a href="signin.php">Sign In Here</a></p>

</section>
</body>
</html>
