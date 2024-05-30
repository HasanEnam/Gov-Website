<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $emaila = $_POST['email'];
    $message = $_POST['message'];

    if(!empty($email) && !empty($password) )
    {
        $query = "select *from user where email = '$email' limit 5";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);

              
            }
        }
        echo "<script type='text/javascript'> alert('You'r message has been recorded')</script>";
    }
    else{
        echo "<script type='text/javascript'> alert('We will contact with you soon.')</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        /* styles.css */

        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
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

        /* Style the header */
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
            color: #333;
            font-size: large;
        }

       .input-box label {
            display: block;
            margin-bottom: 5px;
        }

        .input-box input,
        .input-box textarea {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-box textarea {
            resize: vertical; /* Allow vertical resizing */
        }

.banner {
    background-image: url('contact.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    color: black;
    text-align: center;
    font-size: large;
    background-position: cover;
    width: 1486px;
    height: 661px;
    padding: 100px 0;
}

/* Style the submit button */
.button {
    display: block;
    margin: auto;
    width: 30%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #0056b3;
}

/* Responsive styles */
@media (max-width: 768px) {
    .container {
        width: 90%; /* Adjust as needed for smaller screens */
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
        <h1><b>Contact</b></h1>
        <section class="cover">
            <div class="container"></div>
        </section>
        <form id="contact-form" action="submit_form.php" method="POST">
            <div class="input-box">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-box">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="button">Send Message</button>
        </form>
    </section>
</body>
</html>
