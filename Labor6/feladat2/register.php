<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
        $errors[] = "The name field cannot be empty.";
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    if (empty($_POST['password']) || strlen($_POST['password']) < 8 ||
        !preg_match('/[A-Z]/', $_POST['password']) ||
        !preg_match('/[0-9]/', $_POST['password']) ||
        !preg_match('/[\W_]/', $_POST['password'])) {
        $errors[] = "The password must be at least 8 characters long and include an uppercase letter, a number, and a special character.";
    }

    if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors[] = "The password and its confirmation do not match.";
    }
    if (empty($_POST['birth_date']) || !strtotime($_POST['birth_date'])) {
        $errors[] = "A valid birth date is required.";
    }
    if (!in_array($_POST['gender'], ['Male', 'Female', 'Other'])) {
        $errors[] = "A valid gender must be selected.";
    }

    if (empty($errors)) {
        echo "Name: " .($_POST['name']) . "<br>";
        echo "Email: " .($_POST['email']) . "<br>";
        echo "Birth Date: " .($_POST['birth_date']) . "<br>";
        echo "Gender: " .($_POST['gender']) . "<br>";

        if (!empty($interests)) {
            echo "Interests: " . implode(', ', $interests) . "<br>";
        }

        if (!empty($country)) {
            echo "Country: " . $country . "<br>";
        }
    } else {
        echo "Errors:<br>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

?>

<form method="POST" action="">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email Address:</label><br>
    <input type="text" id="email" name="email"><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>

    <label for="confirm_password">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password"><br><br>

    <label for="birth_date">Birth Date:</label><br>
    <input type="date" id="birth_date" name="birth_date"><br><br>

    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="Male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="Female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="Other">
    <label for="other">Other</label><br><br>

    <label>Interests:</label><br>
    <input type="checkbox" id="sport" name="interests[]" value="Sport">
    <label for="sport">Sport</label><br>
    <input type="checkbox" id="art" name="interests[]" value="Art">
    <label for="art">Art</label><br>
    <input type="checkbox" id="science" name="interests[]" value="Science">
    <label for="science">Science</label><br><br>

    <label for="country">Country:</label><br>
    <select id="country" name="country">
        <option value="">Select...</option>
        <option value="Hungary">Hungary</option>
        <option value="Austria">Austria</option>
        <option value="Romania">Romania</option>
    </select><br><br
