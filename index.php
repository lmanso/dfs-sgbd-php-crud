<?php
session_start();
require_once('.env.php');
require_once('./controllers/db.php');

// echo $_SESSION['username'];

if (isset($_POST['username'])) {
  $_SESSION['username'] = $_POST['username'];
}

if (isset($_SESSION['username'])) {
  $id = getUserId($_SESSION['username']);
}
// var_dump($id);
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Routes
switch ($request_uri[0]) {
    // VIEW
  case '/':
    require 'public/views/home.php';
    break;

  case '/books':
    require 'public/views/books.php';
    break;

  case '/admin':
    require 'public/views/admin.php';
    break;

  case '/login':
    require 'public/views/login.php';
    break;

  case '/profile':
    require 'public/views/profile.php';
    break;

  case '/register':
    require 'public/views/register.php';
    break;

    // ACTION
  case '/loginAction':
    require 'controllers/loginAction.php';
    break;

  case '/logoutAction':
    require 'controllers/logoutAction.php';
    break;

  case '/insertUser';
    insertUser($_POST['name'], $_POST['password']);
    header('Location: /');
    break;

  case '/insertBook';

    if (empty($_POST['image'])) {
      $img = 'https://picsum.photos/300/200';
    } else {
      $img = $_POST['image'];
    }

    $user_id = getUserId($_SESSION['username']);
    $genre_id = intval($_POST['genre']);
    $grade_id = intval($_POST['grade']);
    $author_id = intval($_POST['author']);
    insertBook($_POST['name'], $_POST['summary'], $img,  $author_id, $genre_id, $grade_id, $user_id);
    header('Location: /books');
    break;

  case '/updateBook':
    if (empty($_POST['image'])) {
      $img = 'https://picsum.photos/300/200';
    } else {
      $img = $_POST['image'];
    }

    $genre_id = intval($_POST['genre']);
    $grade_id = intval($_POST['grade']);
    $author_id = intval($_POST['author']);
    updateBook($_POST['bookid'], $_POST['name'], $_POST['summary'], $img, $author_id, $genre_id, $grade_id);
    header('Location: /books');
    break;

  case '/deleteBook':
    // Recupere l'id de l'utilisateur dans l'uri
    deleteBook($request_uri[1]);
    header('Location: /books');
    break;

  case '/deleteUser':
    // Recupere l'id de l'utilisateur dans l'uri
    deleteUser($request_uri[1]);
    header('Location: /admin');
    break;
    
  default:
    require 'public/layouts/404.php';
    break;
}
