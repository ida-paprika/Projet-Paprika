
<?php if( $isAdmin == true ): ?>
<?php $titre = "Gestion Utilisateurs"; ?>

    <div id="pageGestion_user">
        <div>
            <h2>Gestionnaire "Utilisateurs"</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, atque sit modi incidunt doloremque aliquam placeat inventore voluptatibus.</p>
        </div>
        <section>
            <div>
                <form action="" method="post" id="formTri_gestionUser">
                    <label for="tri_item">Trier par : </label>
                    <select name="tri_item" id="" onchange="document.getElementById('formTri_gestionUser').submit();">
                        <option value="">...</option>
                        <option value="pseudo" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "pseudo" ? "selected" : ""; ?>>Pseudo</option>
                        <option value="date" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "date" ? "selected" : ""; ?>>Date d'inscription</option>
                        <option value="statut" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "statut" ? "selected" : ""; ?>>Statut</option>
                    </select>
                </form>
            </div>
        <!-- TABLE "info users" -->
            <div class="flow-scroll">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Pseudo</th>
                            <th>Mail</th>
                            <th>Date d'inscription</th>
                            <th>Nb articles</th>
                            <th>Nb comments</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_user as $key => $value): ?>
                        <tr>
                            <td><img src="images/avatars/<?= $value->getAvatar(); ?>" alt="avatar utilisateur"></td>
                            <td><a href="?action=profil&user=<?= $value->getId(); ?>"><?= $value->getPseudo(); ?></a></td>
                            <td><?= $value->getMail(); ?></td>
                            <td><?= $value->getDate_inscription(); ?></td>
                            <?php foreach($publi->ctrl_count_publiUser($value->getId()) as $k => $v): ?>
                                <td><?= $v; ?></td>
                            <?php endforeach; ?>
                            <?php foreach($comm->ctrl_count_commentUser($value->getId()) as $k => $v): ?>
                                <td><?= $v; ?></td>
                            <?php endforeach; ?>
                            <td><?= $value->getStatut(); ?></td>
                            <td>
                                <a href="?action=editUser&u=<?= $value->getId(); ?>&#target_gererUser"><i class="fa fa-edit fa-lg"></i></a>
                                <a onclick="return confirm('Supprimer ?');" href="?deleteUser=<?= $value->getId(); ?>"><i class="fa fa-trash fa-lg"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <!-- FIN - TABLE -->
        </section>
        <?php if(isset($edit_u)): ?>
        <hr>
        <section id="target_gererUser">
            <h3>Modifier l'utilisateur</h3>
        <!-- FORM "modif user" -->
            <div class="formModif blocForm">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $edit_u->getId(); ?>">
                    <div>
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" value="<?= $edit_u->getPseudo(); ?>">
                    </div>
                    <div>
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" accept="image/*">
                        <img src="images/avatars/<?= $edit_u->getAvatar(); ?>" alt="avatar utilisateur" class="vignette">
                        <input type="hidden" name="avatar" value="<?= $edit_u->getAvatar(); ?>">
                    </div>
                    <div>
                        <label for="mail">Mail</label>
                        <input type="text" name="mail" value="<?= $edit_u->getMail(); ?>">
                    </div>
                    <div>
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="">
                            <option value="indéfini" <?= html_entity_decode($edit_u->getSexe()) == "indéfini" ? "selected" : ""; ?>>Indéfini</option>
                            <option value="femme" <?= $edit_u->getSexe() == "femme" ? "selected" : ""; ?>>Femme</option>
                            <option value="homme" <?= $edit_u->getSexe() == "homme" ? "selected" : ""; ?>>Homme</option>
                        </select>
                    </div>
                    <div>
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="" cols="30"><?= html_entity_decode($edit_u->getBio()); ?></textarea>
                    </div>
                    <div>
                        <label for="lien_site">Lien site</label>
                        <input type="text" name="lien_site" value="<?= $edit_u->getLien_site(); ?>">
                    </div>
                    <div>
                        <label for="lien_fb">Lien Fb</label>
                        <input type="text" name="lien_fb" value="<?= $edit_u->getLien_fb(); ?>">
                    </div>
                    <div>
                        <label for="lien_insta">Lien Insta</label>
                        <input type="text" name="lien_insta" value="<?= $edit_u->getLien_insta(); ?>">
                    </div>
                    <div>
                        <label for="statut">Statut</label>
                        <select name="statut" id="">
                            <option value="utilisateur" <?= $edit_u->getStatut() == "utilisateur" ? "selected" : ""; ?>>Utilisateur</option>
                            <option value="membre" <?= $edit_u->getStatut() == "membre" ? "selected" : ""; ?>>Membre</option>
                            <option value="admin" <?= $edit_u->getStatut() == "admin" ? "selected" : ""; ?>>Admin</option>
                        </select>
                    </div>
                    <div class="submit-div">
                        <input type="submit" name="gerer_user" value="Enregistrer">
                        <input type="button" name="annuler" value="Annuler" onclick='location.href="index.php?action=adminUser"'>
                    </div>
                </form>
            </div>
        <!-- FIN - FORM -->
        </section>
        <?php endif; ?>
    </div>

<?php endif; ?>