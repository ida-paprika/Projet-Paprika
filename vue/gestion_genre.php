
<?php if( $isAdmin == true ): ?>
<?php $titre = "Gestion Genres"; ?>

    <div id="pageGestion_genre">
        <div>
            <h2>Gestionnaire "Genres"</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, atque sit modi incidunt doloremque aliquam placeat inventore voluptatibus.</p>
        </div>
        <section>
        <!-- AJOUT Genre -->
            <div class="formModif blocForm">
                <h3>Ajouter un nouveau genre</h3>
                <form action="" method="post">
                    <div>
                       <label for="designation">Désignation</label>
                       <input type="text" name="designation"> 
                    </div>
                    <div>
                        <label for="filtre">Filtre</label>
                        <select name="filtre" id="">
                            <option value="all">all</option>
                            <option value="livre">livre</option>
                            <option value="livre">film</option>
                            <option value="livre">music</option>
                            <option value="livre">jeu</option>
                        </select>
                    </div>
                    <div class="submit-div">
                        <input type="submit" name="ajout_genre" value="&#128505;">
                        <input type="button" name="annuler" value="&#128503;" onclick='location.href="index.php?action=adminGenre"'>
                    </div>
                </form>
            </div>
        </section>
        <section>
        <!-- MODIF Genre -->
            <div class="formModif blocForm">
                <h3>Modifier ou supprimer un genre</h3>
                <form method="post">
                        <label for="id_genre">Choisir un genre : </label>
                        <select name="id_genre" id="">
                            <?php foreach($genre as $k => $v): ?>
                                <option value="<?= $v->getId(); ?>"><?= $v->getDesignation(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button"><a href="?action=editGenre&#target_modifGenre">Modifier</a></button>
                        <input type="submit" name="select_genre" value="Modifier">
                        <input type="submit" name="delete_genre" value="Supprimer">
                </form>
                <?php if(isset($idGenre)): ?>
                <div id="target_modifGenre">
                <h4>Modifier</h4>
            <!-- FORM "modif GENRE" -->
                <div class="formModif blocForm">
                    <form action="" method="post">
                        <div>
                            <label for="">Désignation</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="">Filtre</label>
                            <select name="" id="">
                                <option value="all">all</option>
                                <option value="livre">livre</option>
                                <option value="livre">film</option>
                                <option value="livre">music</option>
                                <option value="livre">jeu</option>
                            </select>
                        </div>
                        <div class="submit-div">
                            <input type="submit" name="gerer_genre" value="Enregistrer">
                            <input type="button" name="annuler" value="Annuler" onclick='location.href="index.php?action=adminGenre"'>
                        </div>
                    </form>
                </div>
            <!-- FIN - FORM -->
                
                
            </div>
                <?php endif; ?>
            <hr>
            
            </div>
        </section>
        <hr>
    </div>
<?php endif; ?>