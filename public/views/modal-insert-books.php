            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Formulaire de vente</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/insertBook" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="">Titre</label>
                                        <input type="input" class="form-control" name="name" aria-describedby="Donnez un titre à votre article" placeholder="Titre de votre article">
                                    </div>
                                    <div class="form-group">
                                        <label for="genres">Sélectionner un genre :</label>
                                        <select class="form-control" name="genre">
                                            <?php foreach ($genres as $key => $value) : ?>
                                                <option value="<?= ++$key ?>"><?= $value["name"] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="grades">Sélectionner un grade :</label>
                                        <select class="form-control" name="grade">
                                            <?php foreach ($grades as $key => $value) : ?>
                                                <option value="<?= ++$key ?>"><?= $value["name"] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Sélectionner un auteur :</label>
                                        <select class="form-control" name="author">
                                            <?php foreach ($authors as $key => $value) : ?>
                                                <option value="<?= ++$key ?>"><?= $value["name"] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Ecrivez le résumé :</label>
                                        <textarea class="form-control" name="summary" rows="3" placeholder="Ecrivez le contenu de votre article"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image (via url)</label>
                                        <input type="input" class="form-control" name="image" aria-describedby="l'image illustrera votre article" placeholder="">
                                    </div>
                                </fieldset>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>