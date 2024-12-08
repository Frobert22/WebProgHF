    <?php
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
        $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $attend = isset($_POST['attend']) ? $_POST['attend'] : [];
        $tshirt = isset($_POST['tshirt']) ? $_POST['tshirt'] : '';
        $abstract = isset($_FILES['abstract']) ? $_FILES['abstract'] : null;
        $terms = isset($_POST['terms']) ? $_POST['terms'] : '';


        if (empty($firstName)) {
            $errors[] = "firstname is required";
        }

        if (empty($lastName)) {
            $errors[] = "lastname is required";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "email missing";
        }

        if (empty($attend)) {
            $errors[] = "select one";
        }

        if ($tshirt === 'P') {
            $errors[] = "choose one";
        }

        if ($abstract) {
            if ($abstract['error'] === UPLOAD_ERR_NO_FILE) {
                $errors[] = "A fájl feltöltése kötelező.";
            }
            elseif ($abstract['error'] !== UPLOAD_ERR_OK) {
                $errors[] = "Hiba történt a fájl feltöltése közben.";
            }

            elseif ($abstract['size'] > 3 * 1024 * 1024) {
                $errors[] = "A fájl mérete nem haladhatja meg a 3 MB-ot.";
            }
        }


        if ($terms !== 'agree') {
            $errors[] = "agree";
        }

        if (empty($errors)) {
            echo "<h2>Sucesful!</h2>";
            echo "<p><strong>firstname:</strong> " . ($firstName) . "</p>";
            echo "<p><strong>lastname:</strong> " . ($lastName) . "</p>";
            echo "<p><strong>E-mail:</strong> " . ($email) . "</p>";
            echo "<p><strong>T-shirt:</strong> " . ($tshirt) . "</p>";



            exit;
        }
    }
    ?>

    <h3>Online conference registration</h3>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="fname">First name:
            <input type="text" name="firstName" id="fname">
        </label>
        <br><br>

        <label for="lname">Last name:
            <input type="text" name="lastName" id="lname">
        </label>
        <br><br>

        <label for="email">E-mail:
            <input type="text" name="email" id="email">
        </label>
        <br><br>

        <label for="attend">I will attend:<br>
            <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
            <input type="checkbox" name="attend[]" value="Event2">Event 2<br>
            <input type="checkbox" name="attend[]" value="Event3">Event 3<br>
            <input type="checkbox" name="attend[]" value="Event4">Event 4<br>
        </label>
        <br><br>

        <label for="tshirt">What's your T-Shirt size?<br>
            <select name="tshirt" id="tshirt">
                <option value="P">Please select</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </label>
        <br><br>

        <label for="abstract">Upload your abstract:<br>
            <input type="file" name="abstract" id="abstract">
        </label>
        <br><br>

        <input type="checkbox" name="terms" value="agree" id="terms">
        <label for="terms">I agree to terms & conditions.</label>
        <br><br>

        <input type="submit" name="submit" value="Send registration">
    </form>

