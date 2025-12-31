<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST['username']);
    $mobile   = htmlspecialchars($_POST['mobile']);
    $email    = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $gender   = htmlspecialchars($_POST['gender']);
    $course   = htmlspecialchars($_POST['course']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 8px;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        p {
            font-size: 15px;
            margin: 8px 0;
            color: #333;
        }

        span {
            font-weight: bold;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Form Submitted Successfully</h2>
        <p><span>Username:</span> <?php echo $username; ?></p>
        <p><span>Mobile:</span> <?php echo $mobile; ?></p>
        <p><span>Email:</span> <?php echo $email; ?></p>
        <p><span>Gender:</span> <?php echo $gender; ?></p>
        <p><span>Course:</span> <?php echo $course; ?></p>
    </div>

</body>

</html>