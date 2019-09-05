<?php
require_once('public/layouts/header.php');
$user_id = getUserId($_SESSION['username']);
$user = getOneUser($user_id);
$books = getUserBooks($user_id);

if (isset($_SESSION['username'])) { ?>
    <div class="container">
        <div class="base">
            <div class="row top-profile">
                <div class="col-3 img_name">
                    <h1><?= $_SESSION['username']; ?></h1>
                    <div class="name-profile">
                        <?php foreach ($user as $key => $value) : ?>
                            <img src="<?= $value['img'] ?>" alt="..." class="img-profile">
                    </div>
                </div>
                <div class="col-8 purple d-flex">
                    <div class="about col-9 shadow-2dp">
                        <span><?= $value["about"] ?></span>
                    </div>
                <?php endforeach ?>
                <div class="col-3 btn-on-profile">
                <button type="button" data-target="#exampleModal" data-toggle="modal" class="my-4 center-text btn btn-font-size btn-primary shadow-2dp">Vendre un livre</button>
                    <?php if (isset($_SESSION['username']) && checkRole($id) === 1) { ?>
                        <button type="button" class="btn-font-size my-2 btn btn-primary">Ajouter un utilisateur</button>
                    <?php } ?>
                </div>
                </div>
            </div>
            <div class="row bottom-profile">
                <div class="col-12 green">
                    <div class="base swiper-container shadow-2dp">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper slider-bckg">
                            <!-- Slides -->
                            <?php foreach ($books as $key => $value) : ?>
                                <div class="swiper-slide row">
                                    <div class="col-3"></div>
                                    <div class="slider-content col-6 shadow-2dp">
                                        <h5><?= $value["name"] ?></h5>
                                        <img class="slider-item" src="<?= $value['img'] ?>" alt="Card image <?= ++$key ?>">
                                        <span><?= $value["genre"] ?> - <?= $value["author"] ?></span>
                                        <?php if ($value["grade"] == 'Gold') { ?>
                                            <span class="gold"> <?= $value["grade"] ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="col-3">

                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>

        </div>
        <?php include_once("public/views/modal-insert-books.php") ?>
    </div>
<?php } else {
    header('Location: /login');
} ?>
<?php require_once('public/layouts/footer.php');
