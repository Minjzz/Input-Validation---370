<?php
require_once 'functions.php';

function validate_inputs($postData) {

    $errors = [];

    // USERNAME
    if (empty($postData["username"])) {
        $errors[] = "Username is required.";
    } else {
        $username = clean_input($postData["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $username)) {
            $errors[] = "Username must be 4-20 characters (letters, numbers, underscore only).";
        }
    }

    // EMAIL
    if (empty($postData["email"])) {
        $errors[] = "Email is required.";
    } else {
        $email = clean_input($postData["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    // PASSWORD
    if (empty($postData["password"])) {
        $errors[] = "Password is required.";
    } else {
        $password = $postData["password"];

        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters.";
        }

        if (!preg_match("/[A-Z]/", $password)) {
            $errors[] = "Password must contain at least one uppercase letter.";
        }

        if (!preg_match("/[0-9]/", $password)) {
            $errors[] = "Password must contain at least one number.";
        }
    }

    // AGE
    if (empty($postData["age"])) {
        $errors[] = "Age is required.";
    } else {
        $age = clean_input($postData["age"]);
        if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 18 || $age > 100) {
            $errors[] = "Age must be between 18 and 100.";
        }
    }

    // PHONE
    if (empty($postData["phone"])) {
        $errors[] = "Phone number is required.";
    } else {
        $phone = clean_input($postData["phone"]);
        if (!preg_match("/^[0-9]{10,13}$/", $phone)) {
            $errors[] = "Phone number must be 10-13 digits only.";
        }
    }

    return $errors;
}
