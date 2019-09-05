<?php
require_once('public/layouts/header.php');
$books = getAllBooks();
$user = getAllUsers();
$authors = getAllAuthors();
$genres = getAllGenres();
$grades = getAllGrades();
// $user_id = getUserId($_SESSION['username']);
// $books = getUserBooks($user_id);
?>

<div class="container">
    <div class="row">
        <h1 class="">Liste des livres :</h1>
        <div class="col-9">
            <?php foreach ($books as $key => $value) : ?>
                <div class="" style="max-height: 90vh; max-width: 45vh">
                    <div class="card-content align-center shadow-2dp card text-white bg-dark mb-3">
                        <div class="center-text card-header"> <?= $value["name"] ?>
                            <div>
                                <?php if( $value['user_id'] == $id) {?>
                                <button type="button" data-target="#update" data-toggle="modal" data-bookid="<?php echo $value["id"] ?>" class="my-4 center-text btn btn-font-size btn-info shadow-2dp"><i class="far fa-edit"></i></button>
                                <a href="/deleteBook?<?= $value["id"] ?>"><button id="<?= $value["id"] ?>" type="button" class="btn btn-danger shadow-2dp"><i class="far fa-trash-alt"></i></button></a>
                                <?php } else{}?>
                            </div>
                        </div>
                        <div class="card-body">
                            <img class="img-home" src="<?= $value['img'] ?>" alt="Card image <?= ++$key ?>">
                            <h4 class="card-title"></h4>
                            <p class="card-text"><?=substr( $value["summary"], 0, 250) ?></p>
                        </div>
                        <div class="card-footer text-muted ">
                            <h5 class="mb-2 text-white"><?= $value["genre"] ?> </h5>
                            <h6 class="mb-2 text-white"> <?= $value["grade"] ?> - <?= $value["author"] ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-3">
            <h2 class="my-4">livres :</h2>
            <?php foreach ($books as $key => $value) : ?>
            <div class="list-group" style="max-height: 90vh; max-width: 55vh">
                    <a href="#" class="center-text list-group-item disabled shadow-2dp"> <?= $value["name"] ?> </a>
                </div>
                <?php endforeach ?>
                <button type="button" data-target="#exampleModal" data-toggle="modal" class="my-4 center-text btn btn-font-size btn-primary shadow-2dp">Vendre un livre</button>
                
            <h2 class="my-4">Auteurs :</h2>
            <?php foreach ($authors as $key => $value) : ?>
                <div class="list-group" style="max-height: 90vh; max-width: 55vh">
                        <a href="#" class="center-text list-group-item disabled shadow-2dp"> <?= $value["name"] ?> </a>
                    </div>
                    <?php endforeach ?>
                    <button type="button" class="my-4 center-text btn btn-font-size btn-primary shadow-2dp">Ajouter un auteur</button>
                    
                    <h2 class="my-4">Genres :</h2>
            <?php foreach ($genres as $key => $value) : ?>
            <div class="list-group" style="max-height: 90vh; max-width: 55vh">
                    <a href="#" class="center-text list-group-item disabled shadow-2dp"> <?= $value["name"] ?> </a>
                </div>
                <?php endforeach ?>
                <button type="button" class="my-4 center-text btn btn-font-size btn-primary shadow-2dp">Ajouter un genre</button>
                
                <h2 class="my-4">Vendeurs :</h2>
                <?php foreach ($books as $key => $value) : ?>
                <div class="list-group" style="max-height: 90vh; max-width: 55vh">
                        <a href="#" class="center-text list-group-item disabled shadow-2dp"> <?= $value["seller"] ?> </a>
                    </div>
                    <?php endforeach ?>
                    <?php include_once("public/views/modal-insert-books.php") ?>
                    <?php include_once("public/views/modal-update-books.php") ?>
                </div>
            </div>
    </div>
</div>

<?php require_once('public/layouts/footer.php');
