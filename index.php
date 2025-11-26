<?php

include 'functions.php';
include 'User.php';

// adatbázis kapcsolat létrehozása
$db = mysqli_connect('localhost', 'root', '', 'my_site');

//////////////////////////////////////////////////////////
/// M O D E L
//////////////////////////////////////////////////////////

$user = null;
$errorMsg = '';
$okMsg = '';
$cmd = 'register';
$username = '';
$userId = 0;

//////////////////////////////////////////////////////////
/// C O N T R O L L E R
//////////////////////////////////////////////////////////

// a controller a model értékeinek beállításával vezérli a view-t, a megjelenést

if (getFromRequest('cancel')) {
    $_REQUEST = [];
}

// ha érkezik user_id, akkor beállítunk egy user objektumot, amit bárhol használhatunk
if (getFromRequest('user_id')) {
    $results = $db->execute_query('SELECT * FROM my_site.user WHERE id = '
        . mysqli_real_escape_string($db, getFromRequest('user_id')));
    $row = $results->fetch_assoc();
    $user = new User($row['id']);
    $user->setName($row['name']);
}

// regisztráció
if (getFromRequest('cmd') === 'register') {
    // regisztrációkor rányomott a küldésre
    if (getFromRequest('submit')) {
        // input validálás
        // todo kivenni fgv-be, a módosítással azonos
        if (!getFromRequest('username') || !getFromRequest('password')) {
            $errorMsg = 'Név és jelszó megadása kötelző!';
        } elseif (isUserAlreadyExists(getFromRequest('username'))) {
            $errorMsg = 'Ezzel a névvel már létezik felhasználó!';
        } elseif (!isValidPassword(getFromRequest('password'))) {
            $errorMsg = 'A jelszó legalább 5 hosszú legyen és tartalmazzon betűt és számot is!';
        }
        // ha van hiba, akkor az ki fogjuk írni és nem történik meg a regisztráció
        if ($errorMsg) {
            $cmd = getFromRequest('cmd');
            $username = getFromRequest('username');
        } else {
            $db->execute_query("INSERT INTO my_site.user (name, password) VALUES ('"
                . mysqli_real_escape_string($db, getFromRequest('username')) . "', '"
                . password_hash(getFromRequest('password'), PASSWORD_BCRYPT) . "');");
            $okMsg = 'A felhasználót sikeresen regisztráltuk.';
        }
    }
}

// felhasználó módosatásának megjelenítése és az adatok módosításának elvégzése
if (getFromRequest('cmd') === 'modify') {
    // rányomott a módosítás után a küldésre
    if (getFromRequest('submit')) {
        // input validálás
        if (!getFromRequest('username') || !getFromRequest('password')) {
            $errorMsg = 'Név és jelszó megadása kötelző!';
        } elseif (isUserAlreadyExists(getFromRequest('username'))) {
            $errorMsg = 'Ezzel a névvel már létezik felhasználó!';
        } elseif (!isValidPassword(getFromRequest('password'))) {
            $errorMsg = 'A jelszó legalább 5 hosszú legyen és tartalmazzon betűt és számot is!';
        }
        // további ellenőrzés
        if ($errorMsg) {
            $cmd = getFromRequest('cmd');
            $username = getFromRequest('username');
            $userId = $user->getId();
        } else {
            $db->execute_query("UPDATE my_site.user SET modified_at = NOW(), name = '"
                . mysqli_real_escape_string($db, getFromRequest('username')) . "' WHERE id = " . $user->getId());
            $okMsg = 'A felhasználót sikeresen módosítottuk.';
        }
    } else {
        // a kiválasztott felhasználó módosítandó adatait jelenítjük meg
        $cmd = getFromRequest('cmd');
        $username = $user->getName();
        $userId = $user->getId();
    }
}

// felhasználó törlése
if (getFromRequest('cmd') === 'delete') {
    $db->execute_query("UPDATE my_site.user SET deleted_at = NOW() WHERE id = " . $user->getId());
    $user = null;
    $okMsg = 'A felhasználót sikeresen töröltük.';
}

//////////////////////////////////////////////////////////
/// V I E W
//////////////////////////////////////////////////////////

// regisztrációs form
// csak egyszerű változókat tartalmaz, vezérlés nincs benne

echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Site</title>
<link rel="stylesheet" href="res/style.css">
</head>
<body>';

echo '<h1>My Site</h1>';
echo '
<div class="nav"><a href="index.php?cmd=register" class="nav_btn">regisztráció</a></div>
';
echo '<h2>Regisztráció</h2>';
if ($errorMsg) {
    echo "<div class='error_msg'>$errorMsg</div>";
}
if ($okMsg) {
    echo "<div class='ok_msg'>$okMsg</div>";
}
echo '<form method="post">';
echo '<input type="hidden" name="cmd" value="' . $cmd . '"/>';
echo '<table class="list">';
echo '<tr>';
echo '<td>';
echo 'Név:';
echo '</td>';
echo '<td>';
echo '<input type="text" name="username" value="' . $username . '"/>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo 'Jelszó:';
echo '</td>';
echo '<td>';
// a jelszó értékét nem tudjuk visszaírni, mert nem plain text tároljuk
echo '<input type="password" name="password"/>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo '</td>';
echo '<td>';
echo '<input type="submit" name="submit" value="Küldés" class="btn"/>';
if ($userId) {
    echo '<input type="hidden" name="user_id" value="' . $userId . '"/>';
    echo ' <input type="submit" name="cancel" value="Mégse" class="btn"/>';
}
echo '</td>';
echo '</tr>';
echo '</table>';
echo '</form>';


// Regisztrált felhasználók listájának kiíratása, logikát már nem tartalmaz
// Lekérdez és kiír

echo '<h2>Regisztrált felhasználók</h2>';

$results = $db->execute_query('SELECT * FROM user WHERE deleted_at IS NULL ORDER BY created_at DESC;');

if (!$results->fetch_row()) {
    echo 'Nincs regisztrált felhasználó.';
} else {
    echo '<table class="list">';
    echo '<tr>';
    echo '<th>Azonosító</th>';
    echo '<th>Név</th>';
    echo '<th>Módosítás</th>';
    echo '<th>Törlés</th>';
    echo '</tr>';
    // egyedi ciklus PHP-ban
    foreach ($results as $result) {
        echo '<tr>';
        echo '<td>';
        echo $result['id'];
        echo '</td>';
        echo '<td>';
        echo $result['name'];
        echo '</td>';
        echo '<td>';
        echo '<a class="btn" href="index.php?cmd=modify&user_id=' . $result['id'] . '">módosítás</a>';
        echo '</td>';
        echo '<td>';
        echo '<a class="delete_btn" href="index.php?cmd=delete&user_id=' . $result['id'] . '" 
onclick="if (!confirm(\'Biztosan törlöd?\')) return false;">törlés</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</body></html>';
}
$db->close();
