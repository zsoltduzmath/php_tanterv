<?php

echo 'Hello World';

if (isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == 'register') {
    echo '<h1>Regisztráció</h1>';
    echo '<form method="post">';
    echo '<input type="hidden" name="cmd" value="register"/><br/>';
    echo '<input type="text" name="username"/><br/>';
    echo '<input type="text" name="password"/><br/>';
    echo '<input type="submit" name="submit"/><br/>';
    echo '</form>';
}