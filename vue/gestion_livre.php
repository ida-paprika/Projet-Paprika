
<?php if( $isAdmin == true ): ?>
<?php $titre = "Gestion Livres"; ?>

    <div id="pageGestion_livre">
        <div>
            <h2>Gestionnaire "Livres"</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, atque sit modi incidunt doloremque aliquam placeat inventore voluptatibus.</p>
        </div>
        <section>
            <div>
                <form action="" method="post" id="formTri_gestionLivre">
                    <label for="tri_item">Trier par : </label>
                    <select name="tri_item" id="" onchange="document.getElementById('formTri_gestionLivre').submit();">
                        <option value="">...</option>
                        <option value="titre" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "titre" ? "selected" : ""; ?>>Titre</option>
                        <option value="auteur" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "auteur" ? "selected" : ""; ?>>Auteur</option>
                        <option value="type" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "type" ? "selected" : ""; ?>>Type</option>
                        <option value="user" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "user" ? "selected" : ""; ?>>User</option>
                        <option value="date" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "date" ? "selected" : ""; ?>>Date de publication</option>
                    </select>
                </form>
            </div>
        <!-- TABLE "info users" --> 
            <div class="flow-scroll">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>Couverture</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Type</th>
                            <th>Date publication</th>
                            <th>Publié par</th>
                            <th>Nb comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list_livre as $key => $value): ?>
                        <tr>
                            <td><img src="images/couvertures/<?= $value->getCouverture(); ?>" alt="couverture du livre"></td>
                            <td>
                                <a href="?action=article&art=<?= $value->getId_publication(); ?>"><?= html_entity_decode($data_publi->ctrl_publiLivres( $value->getId_publication() )->getTitre()); ?></a>
                            </td>
                            <td><?= html_entity_decode($value->getAuteur()); ?></td>
                            <td><?= html_entity_decode($value->getType()); ?></td>
                            <td><?= $data_publi->ctrl_publiLivres( $value->getId_publication() )->getDate_publication(); ?></td>
                            <td><?= ucfirst($data_publi->ctrl_getAuteur_publi($data_publi->ctrl_publiLivres($value->getId_publication())->getId_user())->getPseudo() ); ?></td>
                            <td>
                                <?php foreach($comm->ctrl_count_commentArt($value->getId_publication()) as $k): ?>
                                    <?= $k; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <a href="?action=editLivre&pl=<?= $value->getId_publication(); ?>&#target_gererLivre"><i class="fa fa-edit fa-lg"></i></a>
                                <a onclick="return confirm('Supprimer ?');" href="?deleteLivre&p=<?= $value->getId_publication(); ?>"><i class="fa fa-trash fa-lg"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <!-- FIN - TABLE -->
        </section>
        <?php if(isset($edit_pbl) && isset($edit_lvr)): ?>
        <hr>
        <section id="target_gererLivre">
            <h3>Modifier le livre</h3>
        <!-- FORM "modif user" -->
            <div class="formModif blocForm">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_publication" value="<?= $edit_pbl->getId_publication(); ?>">
                    <div>
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" value="<?= html_entity_decode($edit_pbl->getTitre()); ?>">
                    </div>
                    <div>
                        <label for="img_bg">Image de l'en-tête</label>
                        <input type="file" name="img_bg" accept="image/*">
                        <input type="hidden" name="img_bg" value="<?= $edit_pbl->getImg_bg(); ?>">
                        <img src="images/accordion/<?= $edit_pbl->getImg_bg(); ?>" class="img-entete">
                    </div>
                    <div>
                        <label for="police">Police du titre</label>
                        <select name="police" id="police">
                            <option value="AardvarkSk8" <?= isset($idPubli) && $publi->getPolice() == 'AardvarkSk8' ? 'selected' : ''; ?>>AardvarkSk8</option>
                            <option value="EightBitDragon" <?= isset($idPubli) && $publi->getPolice() == 'EightBitDragon' ? 'selected' : ''; ?>>EightBitDragon</option>
                            <option value="GooseberryJuice" <?= isset($idPubli) && $publi->getPolice() == 'GooseberryJuice' ? 'selected' : ''; ?>>GooseberryJuice</option>
                            <option value="HannoverMesse" <?= isset($idPubli) && $publi->getPolice() == 'HannoverMesse' ? 'selected' : ''; ?>>HannoverMesse</option>
                            <option value="ImSpiegelland" <?= isset($idPubli) && $publi->getPolice() == 'ImSpiegelland' ? 'selected' : ''; ?>>ImSpiegelland</option>
                            <option value="MeganJune" <?= isset($idPubli) && $publi->getPolice() == 'MeganJune' ? 'selected' : ''; ?>>MeganJune</option>
                            <option value="MesseBerlin" <?= isset($idPubli) && $publi->getPolice() == 'MesseBerlin' ? 'selected' : ''; ?>>MesseBerlin</option>
                            <option value="MesseMuenchen" <?= isset($idPubli) && $publi->getPolice() == 'MesseMuenchen' ? 'selected' : ''; ?>>MesseMuenchen</option>
                            <option value="Moonhouse" <?= isset($idPubli) && $publi->getPolice() == 'Moonhouse' ? 'selected' : ''; ?>>Moonhouse</option>
                            <option value="OrganicTeabags" <?= isset($idPubli) && $publi->getPolice() == 'OrganicTeabags' ? 'selected' : ''; ?>>OrganicTeabags</option>
                            <option value="Roundie" <?= isset($idPubli) && $publi->getPolice() == 'Roundie' ? 'selected' : ''; ?>>Roundie</option>
                            <option value="TheTruthOfLies" <?= isset($idPubli) && $publi->getPolice() == 'TheTruthOfLies' ? 'selected' : ''; ?>>TheTruthOfLies</option>
                            <option value="Tincture" <?= isset($idPubli) && $publi->getPolice() == 'AardvarkSk8' ? 'selected' : ''; ?>>Tincture</option>
                            <option value="Typewriter" <?= isset($idPubli) && $publi->getPolice() == 'Typewriter' ? 'selected' : ''; ?>>Typewriter</option>
                            <option value="UraniaCzech" <?= isset($idPubli) && $publi->getPolice() == 'UraniaCzech' ? 'selected' : ''; ?>>UraniaCzech</option>
                        </select>
                        <p class="choix-font">
                            <span style='font-family:AardvarkSk8'>AardvarkSk8</span>
                            <span style='font-family:EightBitDragon'>EightBitDragon</span>
                            <span style='font-family:GooseberryJuice'>GooseberryJuice</span>
                            <span style='font-family:HannoverMesse'>HannoverMesse</span>
                            <span style='font-family:ImSpiegelland'>ImSpiegelland</span>
                            <span style='font-family:MeganJune'>MeganJune</span>
                            <span style='font-family:MesseBerlin'>MesseBerlin</span>
                            <span style='font-family:MesseMuenchen'>MesseMuenchen</span>
                            <span style='font-family:Moonhouse'>Moonhouse</span>
                            <span style='font-family:OrganicTeabags'>OrganicTeabags</span>
                            <span style='font-family:Roundie'>Roundie</span>
                            <span style='font-family:TheTruthOfLies'>TheTruthOfLies</span>
                            <span style='font-family:Tincture'>Tincture</span>
                            <span style='font-family:Typewriter'>Typewriter</span>
                            <span style='font-family:UraniaCzech'>UraniaCzech</span>
                        </p>
                    </div>
                    <div>
                        <label for="couverture">Couverture</label>
                        <input type="file" name="couverture" accept="image/*">
                        <input type="hidden" name="couverture" value="<?= $edit_lvr->getCouverture(); ?>">
                        <img src="images/couvertures/<?= $edit_lvr->getCouverture(); ?>">
                    </div>
                    <div>
                        <label for="auteur">Auteur</label>
                        <input type="text" name="auteur" value="<?= html_entity_decode($edit_lvr->getAuteur()); ?>">
                    </div>
                    <div>
                        <label for="editeur">Editeur</label>
                        <input type="text" name="editeur" value="<?= html_entity_decode($edit_lvr->getEditeur()); ?>">
                    </div>
                    <div class="block-genres">
                        <label for="">Genre(s)</label>
                        <div class="liste_genres">
                        <?php foreach($genre as $k => $v): ?>
                            <div class="check_genre">
                                <input type="checkbox" id="<?= $v->getDesignation(); ?>" name="genre[]" value="<?= $v->getId(); ?>" 
                                <?php for ($i = 0; $i < count($data_genre->ctrl_getDesi_Genre( $edit_lvr->getId_publication() )); $i++): ?>
                                    <?= $data_genre->ctrl_getDesi_Genre( $edit_lvr->getId_publication() )[$i]->getId() == $v->getId() ? 'checked' : '' ; ?>
                                <?php endfor; ?>
                                >
                                <label for="<?= $v->getDesignation(); ?>"><?= $v->getDesignation(); ?></label>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <div>
            <!-- RECUPERER LES TYPES "selected" EN TERNAIRE -->
                        <label for="type">Type</label>
                        <select name="type" id="">
                            <option value="Roman" <?= html_entity_decode($edit_lvr->getType()) == "Roman" ? 'selected' : '' ; ?>>Roman</option>
                            <option value="Nouvelles" <?= html_entity_decode($edit_lvr->getType()) == "Nouvelles" ? 'selected' : '' ; ?>>Nouvelles</option>
                            <option value="Bande Dessinée" <?= html_entity_decode($edit_lvr->getType()) == "Bande Dessinée" ? 'selected' : '' ; ?>>Bande Dessinée</option>
                            <option value="Roman Graphique" <?= html_entity_decode($edit_lvr->getType()) == "Roman Graphique" ? 'selected' : '' ; ?>>Roman Graphique</option>
                            <option value="Manga" <?= html_entity_decode($edit_lvr->getType()) == "Manga" ? 'selected' : '' ; ?>>Manga</option>
                            <option value="Essai" <?= html_entity_decode($edit_lvr->getType()) == "Essai" ? 'selected' : '' ; ?>>Essai</option>
                            <option value="Poésie" <?= html_entity_decode($edit_lvr->getType()) == "Poésie" ? 'selected' : '' ; ?>>Poésie</option>
                            <option value="Théâtre" <?= html_entity_decode($edit_lvr->getType()) == "Théâtre" ? 'selected' : '' ; ?>>Théâtre</option>
                            <option value="Autre" <?= html_entity_decode($edit_lvr->getType()) == "Autre" ? 'selected' : '' ; ?>>Autre</option>
                        </select>
                    </div>
                    <div>
                        <label for="recompense">Récompenses : <small>(facultatif)</small></label>
                        <input type="text" name="recompense" value="<?= html_entity_decode($edit_pbl->getRecompense()); ?>">
                    </div>
                    <div>
                        <label for="resume">Résumé</label>
                        <textarea name="resume" id="" cols="20" rows="5" maxlength="1500" required><?= html_entity_decode($edit_pbl->getResume()); ?></textarea>
                    </div>
                    <div>
                        <label for="a_propos">À propos <small>(facultatif)</small></label>
                        <textarea name="a_propos" id="" cols="20"><?= html_entity_decode($edit_pbl->getA_propos()); ?></textarea>
                    </div>
                    <div>
                        <label for="avis">Avis <em>(Spoilers interdits)</em></label>
                        <textarea name="avis" id="" cols="20" rows="5" maxlength="1500" required><?= html_entity_decode($edit_pbl->getAvis()); ?></textarea>
                    </div>
                    <div>
                        <label for="avis_detail">Avis détaillé <em>(Spoilers autorisés)</em></label>
                        <textarea name="avis_detail" id="" cols="20" rows="5"><?= html_entity_decode($edit_pbl->getAvis_detail()); ?></textarea>
                    </div>
                    <div>
                        <label for="lien">Lien</label>
                        <p>https:// <input type="text" maxlength="60" value="<?= html_entity_decode($edit_pbl->getLien()); ?>"></p>
                    </div>
                    <div class="submit-div">
                        <input type="submit" name="gerer_livre" value="Enregistrer">
                        <input type="button" name="annuler" value="Annuler" onclick='location.href="index.php?action=adminLivre"'>
                    </div>
                </form>
            </div>
        <!-- FIN - FORM -->
        </section>
        <?php endif; ?>
    </div>

<?php endif; ?>