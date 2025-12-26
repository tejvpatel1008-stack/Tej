<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST['username']);
    $mobile   = htmlspecialchars($_POST['mobile']);
    $email    = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $gender   = htmlspecialchars($_POST['gender']);
    $course   = htmlspecialchars($_POST['course']);

    echo "<h2>Form Submitted Successfully</h2>";
    echo "Username: $username <br>";
    echo "Mobile: $mobile <br>";
    echo "Email: $email <br>";
    echo "Gender: $gender <br>";
    echo "Course: $course <br>";
}
?>
