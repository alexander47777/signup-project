<?php

declare(strict_types=1);

function is_input_empty(string $email, string $password, string $username) {
    if (empty($email) || empty($password) || empty($username)) {
        return true;
    } else {
        return false;
    }

}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }

}

function is_username_taken(PDO $pdo, string $username) {
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }

}

function is_email_registered(PDO $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }

}

function create_user(PDO $pdo, string $email, string $password, string $username)
{
    
    set_user($pdo, $email, $password, $username);

}