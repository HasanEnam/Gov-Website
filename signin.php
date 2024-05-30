<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $emaila = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        $query = "select *from user where email = '$email' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $password)
                {
                    header("location: main.html");
                    die;

                }
            }
        }
        echo "<script type='text/javascript'> alert('wrong username or paassword')</script>";
    }
    else{
        echo "<script type='text/javascript'> alert('username or paassword matched')</script>";
    }
    
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - MyGov</title>
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

        /* Style the container */
        .container {
            width: 80%; /* Adjust as needed */
            margin: 0 auto; /* Center the container horizontally */
            padding: 20px;
        }

        
        header {
            background-color: rgb(64, 136, 64);
            color: #fff;
            padding: 20px 0;
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
            background-image: url('signin.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            color: black;
            text-align: center;
            background-position: cover;
            width: 1485px;
            height: 670px;
            padding: 100px 0;
        }

        /* Style the Sign Up button */
        .button {
            display: block;
            margin: auto;
            width: 20%;
            padding: 10px;
            background-color: black;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #3a3737;
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
        <h1><b>Sign In</b></h1>
        <section class="cover">
            <div class="container"></div>
        </section>
        <form action="" method="POST">
                <div class="input-box">
                     <label><b>Email:</b></label>
                     <input type="text" name="email" placeholder="Enter email" required />
                </div>
     
                <div class="input-box">
                     <label><b>Password</b></label>
                     <input type="password" name="password" placeholder="Enter password" required />
                </div>
                <button type="signin" class="button">Sign In</button>
        </form>
     
</section>
</body>
</html>