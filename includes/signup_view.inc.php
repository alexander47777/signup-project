<?php

declare(strict_types=1);

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $error = $_SESSION["errors_signup"];

        echo "<br>";
        foreach($error as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }

        unset($_SESSION["errors_signup"]);
    }
}