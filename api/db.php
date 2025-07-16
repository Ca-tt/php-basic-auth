<?php
function createSaveUser(int $id, string $username, string $email, string $password, bool $is_admin = false) {
    $user = [
        'id' => $id,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'is_admin' => $is_admin
    ];

    $_SESSION['users'][] = $user;
}