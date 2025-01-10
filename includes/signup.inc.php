<?php

// this is use to check if the user acutally clicked on the form to get here of just typed in the url to get there
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    try {

        require_once("dbh.inc.php");
        require_once("signup_model.inc.php");
        require_once("signup_contr.inc.php");

        // ERROR HANDLERS
        $error = [];
        if (is_input_empty($email, $password, $username)){ // checking if and of the users input is empty
            $error["empty_input"] = "Fill in all fields";
        }

        if (is_email_invalid($email)){ // checking if users email is valid
            $error["invalid_email"] = "Invalid email used!";
        }
        // check here if you are getting any error
        if (is_username_taken( $pdo, $username)){ // checking if users email is valid
            $error["username_taken"] = "Username already taken!";
        }

        if (is_email_registered( $pdo, $email)){ // checking if users email is valid
            $error["email_used"] = "Email already used!";
        }

        require_once 'config_session.inc.php';
        if ($error){
            $_SESSION["errors_signup"] = $error;
            header("Location: ../index.php");
            die();

        }

        create_user($pdo, $email, $password, $username);
        header("Location: ../index.php?signup=sucess");

        // closing connection and statement to the database
        $pdo = null;
        $statemnt = null;

        die();



    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage()); //Display error message

    }


} else{
    // if the user typed in the url to get here redirect the user to the index.php page
    header("location: ../index.php");
    die();
}
