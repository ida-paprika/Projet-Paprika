
<?php isset($idPubli) ? $titre = "Editer ".html_entity_decode($publi->getTitre()) : $titre = "Ajout Livre"; ?>
<?php if( $isAdmin == true || $isMembre == true ): ?>
<div id="addLivre">
    <section>
        <h1><?= isset($idPubli) ? 'Modifier le livre <a href="?action=article&art='.$livre->getId_publication().'"><em>'.html_entity_decode($publi->getTitre()).'</em></a>' : 'Ajouter un livre dans la <a href="?action=Livres">bibliothèque</a>'; ?></h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Quam, odio, minus quas minima enim quo quidem rerum alias odit a 
            laborum velit magnam amet omnis dicta! Ad atque deleniti assumenda.
        </p>
    </section>
    <section>
        <div class="formArticle blocForm">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= isset($idPubli) ? $publi->getId_user() : $user; ?>">
                <?= isset($idPubli) ? '<input type="hidden" name="id_publication" value="'.$idPubli.'">' : ''; ?>
                <div>
                    <label for="img_bg">Image de l'en-tête <i class="fa fa-question-circle"></i><span class="info-form">L'image qui servira de bannière à votre article (de préférence un FanArt) ; ne pas prendre une image trop petite, elle risque de pixelliser</span></label>
                    
                    <input type="file" name="img_bg" accept="image/*" maxlength="50" <?= isset($idPubli) ? '' : 'required'?>>
                    <?= isset($idPubli) ? '<input type="hidden" name="img_bg" value="'.$publi->getImg_bg().'">' : ''; ?>
                    <?= isset($idPubli) ? '<img src="images/accordion/'.$publi->getImg_bg().'" class="vignette">' : '' ; ?>
                </div>
                <div>
                    <label for="titre">Titre <i class="fa fa-question-circle"></i><span class="info-form">Le titre du livre, première lettre des noms en majuscule</span></label>
                    <input type="text" name="titre" maxlength="60" <?= isset($idPubli) ? 'value="'.html_entity_decode($publi->getTitre()).'"' : 'placeholder="Titre du livre"'; ?>  required>
                </div>
                <div class="choix-font">
                    <label for="police">Police du titre <i class="fa fa-question-circle"></i><span class="info-form">La police de texte utilisée pour le titre ; choisir celle qui vous semble convenir au livre, plutôt qu'à vos goûts ;)</span></label>
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
                    <button type="button" onclick="hideAndShow('font-list', 'block')" ><i class="fa fa-eye"></i></button>
                    <p id="font-list">
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
                    <label for="couverture">Couverture du livre <i class="fa fa-question-circle"></i><span class="info-form">L'image de la couverture du livre (de la version "brochée", non "poche")</span></label>
                    <input type="file" name="couverture" accept="image/*" maxlength="50" <?= isset($idPubli) ? '' : 'required'?>>
                    <?= isset($idPubli) ? '<input type="hidden" name="couverture" value="'.$livre->getCouverture().'">' : ''; ?>
                    <?= isset($idPubli) ? '<img src="images/couvertures/'.$livre->getCouverture().'" class="vignette">' : '' ; ?>
                </div>
                <div>
                    <label for="auteur">Auteur <i class="fa fa-question-circle"></i><span class="info-form">Le Prénom et le Nom de l'auteur, en veillant à mettre les majuscules</span></label>
                    <input type="text" name="auteur" maxlength="50" <?= isset($idPubli) ? 'value="'.html_entity_decode($livre->getAuteur()).'"' : 'placeholder="prénom et nom de l\'auteur"'; ?> required>
                </div>
                <div>
                    <label for="editeur">Editeur <i class="fa fa-question-circle"></i><span class="info-form">Le nom de la maison d'édition qui a publié le livre pour la 1ère fois (broché)</span></label>
                    <input type="text" name="editeur" maxlength="50" <?= isset($idPubli) ? 'value="'.html_entity_decode($livre->getEditeur()).'"' : 'placeholder="Maison d\'édition"'; ?> required>
                </div>
                <div class="block-genres">
                    <label for="">Genre(s) <i class="fa fa-question-circle"></i><span class="info-form">Le ou les genre(s) du livre ; possibilité de sélectionner plusieurs genres</span></label>
                    <div class="liste_genres">
                    <?php foreach( $genre as $key => $value): ?>
                        <div class="check_genre">
                            <input type="checkbox" id="<?= $value->getDesignation(); ?>" name="genre[]" value="<?= $value->getId(); ?>"
                            <?php if(isset($idPubli)): ?>
                                <?php for ($i = 0; $i < count($data_genre->ctrl_getDesi_Genre( $idPubli )); $i++): ?>
                                    <?= $data_genre->ctrl_getDesi_Genre( $idPubli )[$i]->getId() == $value->getId() ? 'checked ' : '' ; ?>
                                <?php endfor; ?>
                            >
                            <?php endif; ?>
                            <label for="<?= $value->getDesignation(); ?>"><?= $value->getDesignation(); ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <label for="type">Type <i class="fa fa-question-circle"></i><span class="info-form">Le type du livre (un seul choix)</span></label>
                    <select name="type" id="">
                        <option value="Roman" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Roman" ? 'selected' : '' ; ?>>Roman</option>
                        <option value="Nouvelles" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Nouvelles" ? 'selected' : '' ; ?>>Nouvelles</option>
                        <option value="Bande Dessinée" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Bande Dessinée" ? 'selected' : '' ; ?>>Bande Dessinée</option>
                        <option value="Roman Graphique" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Roman Graphique" ? 'selected' : '' ; ?>>Roman Graphique</option>
                        <option value="Manga" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Manga" ? 'selected' : '' ; ?>>Manga</option>
                        <option value="Essai" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Essai" ? 'selected' : '' ; ?>>Essai</option>
                        <option value="Poésie" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Poésie" ? 'selected' : '' ; ?>>Poésie</option>
                        <option value="Théâtre" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Théâtre" ? 'selected' : '' ; ?>>Théâtre</option>
                        <option value="Autre" <?= isset($idPubli) && html_entity_decode($livre->getType()) == "Autre" ? 'selected' : '' ; ?>>Autre</option>
                    </select>
                </div>
                <div>
                    <label for="recompense">Récompenses : <small>(facultatif)</small> <i class="fa fa-question-circle"></i><span class="info-form">(si disponible) La liste des récompenses obtenues par le livre</span></label>
                    <textarea name="recompense" id="" cols="20" maxlength="400"><?= isset($idPubli) ? html_entity_decode($publi->getRecompense()) : 'Récompenses et nominations'; ?></textarea>
                </div>
                <div>
                    <label for="resume">Résumé <i class="fa fa-question-circle"></i><span class="info-form">Le résumé du livre : vous pouvez utiliser celui de la page de l'éditeur, ou le rédiger vous-même</span></label>
                    <textarea name="resume" id="" cols="20" rows="5" maxlength="1500" required><?= isset($idPubli) ? html_entity_decode($publi->getResume()) : 'Résumé du livre'; ?></textarea>
                </div>
                <div>
                    <label for="a_propos">À propos <small>(facultatif)</small> <i class="fa fa-question-circle"></i><span class="info-form">Informations complémentaires (ex : un mot à propos de l'auteur et / ou du livre). Vous pouvez utiliser la documentation de l'éditeur, ou bien le rédiger vous-même</span></label>
                    <textarea name="a_propos" id="" cols="20" maxlength="1000"><?= isset($idPubli) ? html_entity_decode($publi->getA_propos()) : 'Un mot à propos de l\'auteur et/ou du livre'; ?></textarea>
                </div>
                <div>
                    <label for="avis">Avis <em>(Spoilers interdits)</em> <i class="fa fa-question-circle"></i><span class="info-form">Pourquoi ce livre vous a particulièrement marqué, ce qui le rend particulier, le tout sans SPOILER</span></label>
                    <textarea name="avis" id="" cols="20" rows="5" maxlength="1500" required><?= isset($idPubli) ? html_entity_decode($publi->getAvis()) : 'Pourquoi vous recommandez ce livre'; ?></textarea>
                </div>
                <div>
                    <label for="avis_detail">Avis détaillé <em>(Spoilers autorisés)</em> <i class="fa fa-question-circle"></i><span class="info-form">Votre avis plus en détail, ici les spoilers sont autorisés</span></label>
                    <textarea name="avis_detail" id="" cols="20" rows="5" maxlength="3000"><?= isset($idPubli) ? html_entity_decode($publi->getAvis_detail()) : 'Votre avis plus en détail'; ?></textarea>
                </div>
                <div>
                    <label for="lien">Lien <i class="fa fa-question-circle"></i><span class="info-form">Le lien vers la page du livre sur le site de l'éditeur (version broché), ou si indisponible, vers sa page Babelio</span></label>
                    <input type="text" name="lien" maxlength="100" <?= isset($idPubli) ? 'value="'.html_entity_decode($publi->getLien()).'"' : 'placeholder="www.pagedelediteur.com"'; ?> required>
                </div>
    <!--  APERCU DE L'ARTICLE  -->
        <!--    <div>
                   <button type="button">Voir l'aperçu de la fiche</button>
                   <div id="apercu_hide_show">
                        <div class="test_accordion">Titre du livre<p></p></div>

                        <div class="test_panel">
                            <img src="images/couvertures/" alt="couverture du livre" class="couverture">
                            <div class="auteur">
                                <p><span>Auteur :</span>&ensp;Nom Auteur</p>
                            </div>
                            <div class="editeur">
                                <p><span>Editeur :</span>&ensp;Editeur</p>
                            </div>       
                            <div class="genre">
                                <p><span>Genre :</span>&ensp;
                                    Genre
                                </p>
                            </div>
                            <div class="type">
                                <p><span>Type :</span>&ensp;Type</p>
                            </div>
                            <div class="resume">
                                <p><span>Résumé :</span>&ensp;Résumé</p>
                            </div>
                            <div class="avis">
                                <p><span>Avis :</span>&ensp;Avis</p>
                            </div>
                            <div class="lien">
                                <p>Voir la page de l'éditeur</p>
                            </div>
                            <p>Voir les commentaires</p>
                        </div>
                    </div> 
                </div>-->
    <!--  FIN DE L'APERCU  -->
                <div class="action_addArticle submit-div">
                    <input type="submit" <?= isset($idPubli) ? 'name="modif_livre" value="Enregistrer les modifications"' : 'name="ajout_livre" value="Ajouter"'; ?>>
                    <input type="button" name="annuler" value="Annuler" onclick='location.href="index.php?action=<?= isset($idPubli) ? 'article&art='.$idPubli : 'addLivre'; ?>"'>
                </div>
            </form>
        </div>
    </section>
</div>
<?php endif; ?>