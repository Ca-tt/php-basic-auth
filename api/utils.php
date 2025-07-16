<?php 


function validate(string $input, string $type = "email")
{
    if (empty($input)) {
        return null;
    }

    $validated_string = trim($input);

    if ($type == "email") {
        $validated_string = filter_var($validated_string, FILTER_VALIDATE_EMAIL);
    } elseif ($type == "username") {
        $validated_string = preg_replace('/[^a-zA-Z0-9_]/', '', $validated_string);
    } elseif ($type == "password") {
    }
    return $validated_string;
}

function findUserByEmail(string $email): ?array
{
    foreach ($_SESSION["users"] as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return null;
}