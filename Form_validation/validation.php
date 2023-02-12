<!DOCTYPE html>
<html>

<head>
    <style>
        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>

    <?php
    // define variables to empty values  
    $nameErr = $emailErr = $dateErr = $genderErr = $educationErr = "";
    $name = $email = $date = $gender = $agree = "";
    $education[] = "";

    //Input fields validation  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //String Validation  
        if (empty($_POST["name"])) {
            $nameErr = "Full Name is required";
        } else {
            $name = input_data($_POST["name"]);
            if (!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $name)) {
                $nameErr = "Only alphabets and white space period dash are allowed";
            }
        }
        //Email Validation   
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = input_data($_POST["email"]);
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        // Date Validation
        if (empty($_POST["birthday"])) {
            $dataErr = "Date is required";
        } else {
            $date = input_data($_POST["birthday"]);
        }
        //Empty Field Validation  
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = input_data($_POST["gender"]);
        }
        //Checkbox Validation
        if (!isset($_POST["deg"])) {
            $educationErr = "Degree's Requires...";
        } else {
            $degreeValues = $_POST["deg"];
            $check = 0;
            $check = count($degreeValues);
            if ($check < 2) {
                $educationErr = "You need to select atlest 2 Degrees";
            } else {
                foreach ($degreeValues as $key => $values) {
                    echo $values . ", ";
                    $education[] = $values;
                }
            }
        }
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Registration Form</h2>
    <span class="error">* Fillup All Require Data </span>
    <br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Full Name -->
        <fieldset>
            <legend><em>Full Name</em></legend>
            <input type="text" name="name">
            <span class="error">* <?php echo $nameErr; ?> </span>
        </fieldset>
        <br><br>
        <!-- Email -->
        <fieldset>
            <legend><em>E-mail</em></legend>
            <input type="text" name="email">
            <span class="error">* <?php echo $emailErr; ?> </span>
        </fieldset>
        <br><br>
        <!-- Gender -->
        <fieldset>
            <legend><em>Gender</em></legend>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
            <span class="error">* <?php echo $genderErr; ?> </span>
        </fieldset>
        <br><br>
        <!-- Birth Date -->
        <fieldset>
            <legend>Date Of Birth</legend>
            <input type="date" name="birthday">
            <span class="error">* <?php echo $dateErr; ?> </span>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="deg[]" value="SSC"> SSC
            <br>
            <span class="error">* <?php echo $educationErr; ?> </span>
            <input type="checkbox" name="deg[]" value="HSC"> HSC
            <br>
            <span class="error">* <?php echo $educationErr; ?> </span>
            <input type="checkbox" name="deg[]" value="BSc"> BSc
            <br>
            <span class="error">* <?php echo $educationErr; ?> </span>
            <input type="checkbox" name="deg[]" value="MSc"> MSc
            <span class="error">* <?php echo $educationErr; ?> </span>
        </fieldset>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        if ($nameErr == "" && $emailErr == "" && $dateErr == "" && $genderErr == "" && $educationErr == "") {
            echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";
            echo "<h2>Your Input:</h2>";
            echo "Name: " . $name;
            echo "<br>";
            echo "Email: " . $email;
            echo "<br>";
            echo "Date of Birth: " . $date;
            echo "<br>";
            echo "Gender: " . $gender;
            echo "<br>";
            echo "Degree: " . $education;
        } else {
            echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
        }
    }
    ?>

</body>

</html>