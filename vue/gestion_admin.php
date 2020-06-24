
<?php if($isAdmin == true): ?>
<?php $titre = "Administrateur"; ?>

<div id="pageAdmin">

    <div>
        <h1>Administrateur</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, quo, dolore, quidem laudantium quasi.</p>
    </div>
    <hr>
    <?php if(!empty($all_sgCom)): ?>
    <section class="alert_comment">
        <h3><i class="fa fa-exclamation-triangle"></i> Alertes "commentaires" <i class="fa fa-exclamation-triangle"></i></h3>
        <div class="flow-scroll">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Signalé par</th>
                        <th>Motif</th>
                        <th>Contenu&nbsp;du&nbsp;commentaire</th>
                        <th>Posté par</th>
                        <th>Article</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($all_sgCom as $key => $value): ?>
                    <tr>
                        <form action="" method="POST">
                            <input type="hidden" name="id_comment" value="<?= $value->getId_comment(); ?>">
                            <input type="hidden" name="id_publi" value="<?= $value->getId_publication(); ?>">
                            <td><?= $data_sgCom->ctrl_get_fromUser($value->getId())->getPseudo(); ?></td>
                            <td><?= html_entity_decode($value->getMotif()); ?></td>
                            <td>
                                <textarea name="contenu" id="" rows="3" class="edit-contenu"><?= html_entity_decode($data_sgCom->ctrl_get_contenuCom($value->getId())->getContenu()); ?></textarea>
                            </td>
                            <td><?= $data_sgCom->ctrl_get_auteur_comm($value->getId())->getPseudo(); ?></td>
                            <td><a href="?action=article&art=<?= $value->getId_publication(); ?>"><?= html_entity_decode($data_sgCom->get_titreArticle($value->getId())->getTitre()); ?></a></td>
                            <td>
                                <input type="submit" name="editComment_admin" value="" class="editIcone">
                                <a onclick="return confirm('Supprimer ?');" href="?deleteComment=<?= $value->getId_comment(); ?>&p=<?= $value->getId_publication(); ?>"><i class="fa fa-trash fa-lg"></i></a>
                            </td>
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <hr>
    <?php endif; ?>
    <section class="cards-board">
        <article>
            <h4>Utilisateurs</h4>
            <?php foreach($numUser as $k => $v): ?>
                <p><?= $v; ?></p>
            <?php endforeach; ?>
            <hr>
            <div>
                <?php foreach($numUserU as $k => $v): ?>
                    <p><?= $v; ?> utilisateurs</p>
                <?php endforeach; ?>
                <?php foreach($numUserM as $k => $v): ?>
                    <p><?= $v; ?> membres</p>
                <?php endforeach; ?>
            </div>
        </article>
        <article>
            <h4>Articles</h4>
            <?php foreach($numPubli as $k => $v): ?>
                <p><?= $v; ?></p>
            <?php endforeach; ?>
            <hr>
            <div>
                <?php foreach($numPubliL as $k => $v): ?>
                    <p><?= $v; ?> livres</p>
                <?php endforeach; ?>
                <?php foreach($numPubliF as $k => $v): ?>
                    <p><?= $v; ?> films</p>
                <?php endforeach; ?>
            </div>
        </article>
        <article>
            <h4>Commentaires</h4>
            <?php foreach($numComm as $k => $v): ?>
                <p><?= $v; ?></p>
            <?php endforeach; ?>
            <hr>
            <div>
                <p>En moyenne : </p>
                <?php foreach($moyComL as $c ): ?>
                <p><?= $c; ?> par livre</p>
                <?php endforeach; ?>
                <?php foreach($moyComF as $c ): ?>
                <p><?= $c; ?> par film</p>
                <?php endforeach; ?>
            </div>
        </article>
    </section>
    <hr>
    <div>
        <form action="" method="post" id="formTri_gestionAdmin">
            <label for="tri_item">Afficher les informations de :&nbsp;</label>
            <select name="tri_item" id="" onchange="document.getElementById('formTri_gestionAdmin').submit();">
                <option value="mois">ce mois</option>
                <option value="semaine" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "semaine" ? "selected" : ""; ?>>cette semaine</option>
                <option value="jour" <?= isset($_POST['tri_item']) && $_POST['tri_item'] == "jour" ? "selected" : ""; ?>>ce jour</option>
            </select>
        </form>
    </div>
    <hr>
    <?php if(!empty($list_publi)): ?>
    <section class="last-art">
        <h3>Derniers <strong>articles</strong> publiés</h3>
        <div class="flow-scroll">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th></th>
                        <th>Titre</th>
                        <th>Publié le</th>
                        <th>Par</th>
                        <th>Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list_publi as $key => $value): ?>
                    <tr>
                        <td><?= $data_publi->ctrl_isLivre($value->getId_publication()) == true ? '<i class="fa fa-book"></i>' : '<i class="fa fa-film"></i>'; ?></td>
                        <td><?= html_entity_decode($value->getTitre()); ?></td>
                        <td><?= $value->getDate_publication(); ?></td>
                        <td><?= $data_publi->ctrl_getAuteur_publi($value->getId_user())->getPseudo(); ?></td>
                        <td><a href=""><i class="fa fa-eye fa-lg"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <hr>
    <?php else: ?>
    <p class="bg-white text-center">Aucun article publié dans ce laps de temps</p>
    <?php endif; ?>
    <?php if(!empty($list_com)): ?>
    <section class="last-comment">
        <h3>Derniers <strong>commentaires</strong> postés</h3>
        <div class="flow-scroll">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Contenu</th>
                        <th>Dans</th>
                        <th>Posté le</th>
                        <th>Par</th>
                        <th>Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list_com as $key => $value): ?>
                    <tr>
                        <td><?= html_entity_decode($value->getContenu()); ?></td>
                        <td><?= html_entity_decode($data_com->ctrl_getTitre_comment($value->getId_publication())->getTitre()); ?></td>
                        <td><?= $value->getDate_comment(); ?></td>
                        <td><?= $data_com->ctrl_getAuteur_comment($value->getId_user())->getPseudo(); ?></td>
                        <td><a href=""><i class="fa fa-eye fa-lg"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <hr>
    <?php else: ?>
        <p class="bg-white text-center">Aucun commentaire posté dans ce laps de temps</p>
    <?php endif; ?>
    <?php if(!empty($list_user)): ?>
    <section class="last-user">
        <h3>Derniers <strong>utilisateurs</strong> inscrits</h3>
        <div class="flow-scroll">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Pseudo</th>
                        <th>Mail</th>
                        <th>Inscrit le</th>
                        <th>Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list_user as $key => $value): ?>
                    <tr>
                        <td><img src="images/avatars/<?= $value->getAvatar(); ?>" alt="" class="vignette"></td>
                        <td><?= $value->getPseudo(); ?></td>
                        <td><?= $value->getMail(); ?></td>
                        <td><?= $value->getDate_inscription(); ?></td>
                        <td><a href=""><i class="fa fa-eye fa-lg"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php else: ?>
        <p class="bg-white text-center">Aucun utilisateur inscrit dans ce laps de temps</p>
    <?php endif; ?>
</div>
<?php endif; ?>