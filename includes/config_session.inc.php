<?php

ini_set('session.use_only_cookies', 1); //Configures PHP to allow sessions only through cookies and not URL parameters.
ini_set('session.use_strict_mode', 1); //Enables strict mode for session handling. Effect: Prevents the use of uninitialized session IDs Why:
// It reduces the risk of session fixation attacks.

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
]);

session_start(); // start session

if (!isset($_SESSION["last_regeneration"])){ // Checks if the last_regeneration key exists in the session.
    regenerate_session_id(); // function to regenerate the session ID.
} else{
    $internal = 60 *30;
    if (time() - $_SESSION["last_regeneration"] > $internal){ //  Checks if the time elapsed since the last session regeneration exceeds the defined interval.
        regenerate_session_id();
    }
}

function regenerate_session_id()
{
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}