<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Collect and sanitize inputs
    $username = trim($_POST["Username"] ?? "");
    $mobile   = trim($_POST["mobile"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $gender   = $_POST["gender"] ?? "";
    $course   = $_POST["course"] ?? "";
    $terms    = isset($_POST["terms"]);

    // Username validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Mobile validation (10 digits)
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $errors[] = "Enter a valid 10-digit mobile number.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email address.";
    }

    // Password validation
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    // Gender validation
    if (empty($gender)) {
        $errors[] = "Please select gender.";
    }

    // Course validation
    if (empty($course)) {
        $errors[] = "Please select course.";
    }

    // Terms validation
    if (!$terms) {
        $errors[] = "You must agree to terms.";
    }

    // Show results
    if (!empty($errors)) {
        echo "<h3>Form Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li style='color:red;'>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<h3 style='color:green;'>Form submitted successfully!</h3>";
        echo "Username: $username <br>";
        echo "Mobile: $mobile <br>";
        echo "Email: $email <br>";
        echo "Gender: $gender <br>";
        echo "Course: $course <br>";
    }
}
?>
