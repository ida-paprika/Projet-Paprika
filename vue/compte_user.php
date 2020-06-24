
<?php $titre = "Mon Compte"; ?>
<div id="pageCompte_user">
    
    <section>
        <img src="images/avatars/<?= $user->getAvatar(); ?>" alt="avatar utilisateur" class="userAvatar">
        <h1>Profil de <span><?= $user->getPseudo(); ?></span></h1>
        <p><span>Inscript depuis le : </span><?= $user->getDate_inscription(); ?></p>
        <p><span>Statut : </span><?= $user->getStatut(); ?></p>
        <p>
            <span>Adresse mail : </span><?= $user->getMail(); ?> 
            <small>(Votre email n'est pas visible par les autres utilisateurs)</small>
        </p>
        <div>
            <?php if( $isAdmin == true || $isMembre == true ): ?>
                <?php foreach($numPubli as $k => $v): ?>
                    <p><span>Nombre d'articles publiés : </span><?= $v; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php foreach($numComm as $k => $v): ?>
                <p><span>Nombre de commentaires postés : </span><?= $v; ?></p>
            <?php endforeach; ?>
        </div>
    </section>
    <hr>
    <section>
        <div>
            <p><span>Sexe : </span><?= $user->getSexe();?></p>
        </div>
        <div>
            <p>
                <span>Mini Bio : </span><?= html_entity_decode($user->getBio());?>
            </p>
        </div>
        <div>
            <a <?= $user->getLien_site() != null ? 'href="https://'.$user->getLien_site().'"' : ''; ?> target="_blank" class="<?= $user->getLien_site() != null ? 'lien-color' : 'lien-null'; ?>"><i class="fa fa-home"></i></a>

            <a <?= $user->getLien_fb() != null ? 'href="https://'.$user->getLien_fb().'"' : ''; ?> target="_blank" class="<?= $user->getLien_fb() != null ? 'lien-color' : 'lien-null'; ?>"><i class="fa fa-facebook-square"></i></a>

            <a <?= $user->getLien_insta() != null ? 'href="https://'.$user->getLien_insta().'"' : ''; ?> target="_blank" class="<?= $user->getLien_insta() != null ? 'lien-color' : 'lien-null'; ?>"><i class="fa fa-instagram"></i></a>
        </div>
    </section>
    <hr>
    <section>
        <div class="actions_compte">
            <button type="button" onclick="hideAndShow('formModif_hide_show', 'block')" class="modif_profil">Modifier mon profil</button>
            
            <div class="formModif blocForm" id="formModif_hide_show">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $user->getId(); ?>">
                    <div>
                        <label for="image">Choisir un avatar</label>
                        <input type="file" name="avatar" accept="image/*" maxlength="50">
                        <img src="images/avatars/<?= $user->getAvatar(); ?>" class="vignette">
                    </div>
                    <div>
                        <label for="sexe">Changer de sexe</label>
                        <select name="sexe" id="">
                            <option value="indéfini" <?= html_entity_decode($user->getSexe()) == "indéfini" ? "selected" : ""; ?>>Indéfini</option>
                            <option value="femme" <?= $user->getSexe() == "femme" ? "selected" : ""; ?>>Femme</option>
                            <option value="homme" <?= $user->getSexe() == "homme" ? "selected" : ""; ?>>Homme</option>
                        </select>
                    </div>
                    <div>
                        <label for="bio">Mini bio</label>
                        <textarea name="bio" id="" cols="20" value="<?= $user->getBio(); ?>" 
                                  minlength="20" maxlength="200"><?= html_entity_decode($user->getBio()); ?></textarea>
                    </div>
                    <div>
                        <label for="">Site perso</label>
                        <input type="text" name="lien_site" value="<?= $user->getLien_site() != null ? $user->getLien_site() : ''; ?>" 
                               placeholder="<?= $user->getLien_site() != null ? $user->getLien_site() : 'www.votre_site.com'; ?>" 
                               minlength="10" maxlength="50">
                    </div>
                    <div>
                        <label for="fb">Page Facebook</label>
                        <input type="text" name="lien_fb" value="<?= $user->getLien_fb() != null ? $user->getLien_fb() : ''; ?>" 
                               placeholder="<?= $user->getLien_fb() != null ? $user->getLien_fb() : 'www.facebook.com/votre_fb/'; ?>" 
                               minlength="10" maxlength="50">
                    </div>
                    <div>
                        <label for="insta">Page Instagram</label>
                        <input type="text" name="lien_insta" value="<?= $user->getLien_insta() != null ? $user->getLien_insta() : ''; ?>" 
                               placeholder="<?= $user->getLien_insta() != null ? $user->getLien_insta() : 'www.instagram.com/votre_insta/'; ?>" 
                               minlength="10" maxlength="50">
                    </div>
                    <div>
                        <label for="mail">Modifier l'adresse email</label>
                        <input type="mail" name="mail" value="<?= $user->getMail(); ?>" 
                               placeholder="<?= $user->getMail(); ?>" minlength="8" maxlength="30">
                    </div>
                    <div>
                        <button id="btnModifMdp" type="button" onclick="hideAndShow('modifMdp_hide_show', 'flex')">Modifier le mot de passe</button>
                        <div class="modifMdp" id="modifMdp_hide_show">
                            <label for="mdp">Nouveau mot de passe</label>
                            <input type="password" name="mdp" placeholder="Nouveau mot de passe" minlength="8" maxlength="20">

                            <label for="confMdp">Confirmer le mot de passe</label>
                            <input type="password" name="confMdp"  placeholder="Confirmer le mot de passe" minlength="8" maxlength="20">
                        </div>
                    </div>
                    <?= !empty($msg)? '<div class="my-2 p-3 bg-danger">'. $msg . "</div>" : ''; ?>
                    <div class="submit-div">
                        <button id="btnValidForm" type="button" onclick="hideAndShow('validForm_hide_show', 'flex')">Enregistrer les modifications</button>
                        <div class="validForm" id="validForm_hide_show">
                            <div>
                                <label for="oldMdp">Entrez votre mot de passe</label>
                                <input type="password" name="oldMdp" placeholder="Mot de passe actuel" minlength="8" maxlength="20" required>
                            </div>
                            <input type="submit" name="modifier_user" value="Valider">
                        </div>
                        
                        <input type="button" name="annuler" value="Annuler" onclick='location.href="index.php?action=compte"'>
                    </div>
                </form>
            </div>
            <button id="btn-modalUser" class="suppr_compte">Supprimer mon compte</button>
            <div id="modal-displayUser" class="modalBox">
                <div class="modal-contenu style-modal">
                    <span class="closeUser">&times;</span>
                    <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                    <button><a href="?deleteUser=<?= $user->getId(); ?>">C'est mon dernier mot</a></button>
                </div>
            </div> 
            <button style="display:none" type="button" class="suppr_compte"><a href="?deleteUser=<?= $user->getId(); ?>">Supprimer mon compte</a></button>
        </div>
    </section>
    <hr>
    <!-- ARTICLES PUBLIES -->
    <?php if( ($isAdmin == true || $isMembre == true) && !empty($publiUser) ): ?>
        <section>
            <h3>Liste des articles publiés</h3>
            <div class="flow-scroll">
                <table class="table-custom">
                    <tr>
                        <th></th>
                        <th>Titre</th>
                        <th>Date de publication</th>
                        <th>Commentaires</th>
                        <th>Edit</th>
                    </tr>
                    <?php foreach($publiUser as $key): ?>
                        <tr>
                            <td><?= $ctr_publi->ctrl_isLivre($key->getId_publication()) == true ? '<i class="fa fa-book"></i>' : '<i class="fa fa-film"></i>'; ?></td>
                            <td><a href="?action=article&art=<?= $key->getId_publication(); ?>"><?= html_entity_decode($key->getTitre()); ?></a></td>
                            <td><?= $key->getDate_publication(); ?></td>
                            <td>
                                <?php foreach($ctr_comm->ctrl_count_commentArt($key->getId_publication()) as $k): ?>
                                    <?= $k; ?>
                                <?php endforeach; ?>
                            </td>
                            <!-- if(is_livre($idPubli) -> href="?action=editArt&(id_publi+id_livre)" -->
                            <!-- FROM livres WHERE id_publi = $idPubli  -->
                            <!-- $ctr_publi->ctrl_isLivre($k->getId()) == true ? "?action=updateLivre&art=".$k->getId() : "?action=updateFilm&art=".$k->getId(); -->
                            <td><a href="<?= $ctr_publi->ctrl_isLivre($key->getId_publication()) == true ? "?action=updateLivre&art=".$key->getId_publication() : "?action=updateFilm&art=".$key->getId_publication(); ?>"><i class="fa fa-edit fa-lg"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>

    <?php endif; ?>
    

    
</div>
