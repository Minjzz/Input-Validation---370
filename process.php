<?php
require_once 'validation.php';

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = validate_inputs($_POST);

    if (empty($errors)) {
        $success = "All inputs are valid!";
    }
}
