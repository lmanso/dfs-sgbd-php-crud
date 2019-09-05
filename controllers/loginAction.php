
<?php
require_once('public/layouts/header.php');
// $users = getAllUsers();

if (checkPassword($id) === $_POST['password'] && checkUsername($id) === $_POST['username'] && !empty($_POST['username']) &&  !empty($_POST['password'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: /profile');
} else {
    session_destroy();
    header('Location: /login');
}
