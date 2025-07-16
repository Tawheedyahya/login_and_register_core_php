<?php
// session_start();l

if (!isset($_SESSION['id'])) {
    header('Location:./login');
    exit;
}

?>
