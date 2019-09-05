<?php

$dbname = DBNAME;

//GET ALL
function getAllUsers()
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM t_users;");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllGrades()
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM t_grades;");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBooks()
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT t_books.id, t_books.name, t_books.summary, t_books.img, date,
    t_authors.name as author,
    t_users.name as seller,
    t_users.id as user_id,
    t_grades.name as grade,
    t_genres.name as genre 
    FROM t_books
    LEFT JOIN t_users ON t_books.user_id = t_users.id
    LEFT JOIN t_authors ON t_books.author_id = t_authors.id
    LEFT JOIN t_grades ON t_books.grade_id = t_grades.id
    LEFT JOIN t_genres ON t_books.genre_id = t_genres.id;");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);

}

function getAllGenres()
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM t_genres;");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getAllAuthors()
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM t_authors;");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

//GET ONE

function getUserBooks($user_id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT t_books.name, t_books.summary, t_books.img, date, 
    t_authors.name as author,
    t_users.name as seller,
    t_grades.name as grade,
    t_genres.name as genre 
    FROM t_books
    LEFT JOIN t_users ON t_books.user_id = t_users.id
    LEFT JOIN t_authors ON t_books.author_id = t_authors.id
    LEFT JOIN t_grades ON t_books.grade_id = t_grades.id
    LEFT JOIN t_genres ON t_books.genre_id = t_genres.id WHERE user_id = $user_id ;");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getOneUser($user_id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM t_users WHERE id = :id");
    $request->execute([
        ":id" => $user_id,
    ]);
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getOneBooks($book_id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT * FROM t_books WHERE id = :id");
    $request->execute([
        ":id" => $book_id,
    ]);
    return $request->fetch(PDO::FETCH_ASSOC);
}

function getUserId($username)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT id FROM t_users WHERE name= :name;");
    $request->execute([
        ":name" => $username
    ]);
    return intval($request->fetch(PDO::FETCH_ASSOC)["id"]);
}

/** CHECK */
function checkPassword($id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT password FROM t_users WHERE id= :id;");
    $request->execute([
        ":id" => $id
    ]);
    // var_dump();die;
    return $request->fetch(PDO::FETCH_ASSOC)["password"];
}

function checkUsername($id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT name FROM t_users WHERE id= :id;");
    $request->execute([
        ":id" => $id
    ]);
    // var_dump();die;
    return $request->fetch(PDO::FETCH_ASSOC)["name"];
}

function checkRole($id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("SELECT role FROM t_users WHERE id= :id;");
    $request->execute([
        ":id" => $id
    ]);
    return intval($request->fetch(PDO::FETCH_ASSOC)["role"]);
}

//INSERT
function insertUser($name, $password)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("INSERT INTO t_users (name, password) VALUES ( :name, :password)");
    $request->execute([
        ":name" => $name,
        ":password" => $password,
    ]);
}

function insertBook($name, $summary, $img, $author_id, $genre_id, $grade_id, $user_id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("INSERT INTO t_books (name, summary, img, date, author_id, genre_id, grade_id, user_id) VALUES (:name, :summary, :img, now(), :author_id, :genre_id, :grade_id, :user_id);");
    $request->bindParam(':name', $name);
    $request->bindParam(':summary', $summary);
    $request->bindParam(':img', $img);
    $request->bindParam(':author_id', $author_id);
    $request->bindParam(':genre_id', $genre_id);
    $request->bindParam(':grade_id', $grade_id);
    $request->bindParam(':user_id', $user_id);
    $request->execute();
}

/** UPDATE */

function updateBook($bookid, $name, $summary, $img, $author_id, $genre_id, $grade_id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connec->prepare("UPDATE t_books SET name = :name, summary = :summary, img = :img, author_id = :author_id, genre_id = :genre_id, grade_id = :grade_id WHERE id= $bookid");
    $request->bindParam(':name', $name);
    $request->bindParam(':summary', $summary);
    $request->bindParam(':img', $img);
    $request->bindParam(':author_id', $author_id);
    $request->bindParam(':genre_id', $genre_id);
    $request->bindParam(':grade_id', $grade_id);
    $request->execute();
}

/** DELETE */
function deleteUser($id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $request = $connec->prepare("DELETE FROM `t_users` WHERE ((`id` = $id));");
    $request->execute();
}

function deleteBook($id)
{
    global $dbname;
    $connec = new PDO("mysql:dbname=$dbname; charset=utf8mb4", USER, PASSWORD);
    $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $request = $connec->prepare("DELETE FROM `t_books` WHERE ((`id` = $id));");
    $request->execute();
}