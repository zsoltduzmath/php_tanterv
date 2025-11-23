<?php

function getFromRequest($key)
{
    if (isset($_REQUEST[$key])) {
        return $_REQUEST[$key];
    } else {
        return null;
    }
}

function isUserAlreadyExists($userName): bool
{
    global $db, $user;
    $sql = "SELECT * FROM my_site.user WHERE name = '" . mysqli_real_escape_string($db, $userName) . "' and deleted_at IS NULL";
    if ($user) {
        $sql .= " and id != " . $user->getId();
    }
    $results = $db->execute_query($sql);
    if ($results->fetch_row()) {
        return true;
    } else {
        return false;
    }
}

function isValidPassword($password)
{
    if (strlen($password) < 5) {
        return false;
    }
    // csak számokra ez megoldás, és betűkre?
//    if (!str_contains($password, 0) && !str_contains($password, 1) &&
//        !str_contains($password, 2) && !str_contains($password, 3) &&
//        !str_contains($password, 4) && !str_contains($password, 5) &&
//        !str_contains($password, 6) && !str_contains($password, 7) &&
//        !str_contains($password, 8) && !str_contains($password, 9)) {
//        return false;
//    }
    // megoldás a reguláris kifejezés
    if (!preg_match('/[0-9]+/', $password) || !preg_match('/[a-z]+/i', $password)) {
        return false;
    }
    return true;
}