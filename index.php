<?php
require_once 'process.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modular Input Validation</title>
</head>
<body>

<h2>Input Validation Form</h2>

<?php
if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

if (!empty($success)) {
    echo "<p style='color:green;'>$success</p>";
}
?>

<form method="POST" action="index.php">
    Username: <input type="text" name="username"><br><br>
    Email: <input type="text" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    Age: <input type="number" name="age"><br><br>
    Phone: <input type="text" name="phone"><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
