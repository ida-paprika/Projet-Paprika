
<?php $titre = "Profil de ".ucfirst($data_user->getPseudo()); ?>

<div id="pageProfil_user">
    
    <section>
        <img src="images/avatars/<?= $data_user->getAvatar(); ?>" alt="avatar utilisateur" class="userAvatar">
        <h2>Profil de <span><?= ucfirst($data_user->getPseudo()); ?></span></h2>
        <p><span>Inscript depuis le : </span><?= $data_user->getDate_inscription(); ?></p>
        <p><span>Statut : </span><?= $data_user->getStatut(); ?></p>
        <div>
            <?php if( $data_user->getStatut() == 'membre' || $data_user->getStatut() == 'admin' ): ?>
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
            <p><span>Sexe : </span><?= $data_user->getSexe();?></p>
        </div>
        <div>
            <p>
                <span>Mini Bio : </span><?= html_entity_decode($data_user->getBio());?>
            </p>
        </div>
        <div>
            <a <?= $data_user->getLien_site() != null ? 'href="https://'.$data_user->getLien_site().'"' : ''; ?> class="<?= $data_user->getLien_site() != null ? 'lien-color' : 'lien-null'; ?>" target="_blank"><i class="fa fa-home"></i></a>

            <a <?= $data_user->getLien_fb() != null ? 'href="https://'.$data_user->getLien_fb().'"' : ''; ?> class="<?= $data_user->getLien_fb() != null ? 'lien-color' : 'lien-null'; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>

            <a <?= $data_user->getLien_insta() != null ? 'href="https://'.$data_user->getLien_insta().'"' : ''; ?> class="<?= $data_user->getLien_insta() != null ? 'lien-color' : 'lien-null'; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
        </div>
    </section>
    <hr>
<!-- ARTICLES PUBLIES -->
    <?php if( ($data_user->getStatut() == 'membre' || $data_user->getStatut() == 'admin') && !empty($publiUser) ): ?>
        <section>
            <h3>Liste des articles publiés</h3>
            <div class="flow-scroll">
                <table class="table-custom">
                    <tr>
                        <th></th>
                        <th>Titre</th>
                        <th>Date de publication</th>
                        <th>Commentaires</th>
                    </tr>
                    <?php foreach($publiUser as $k): ?>
                        <tr>
                            <td><?= $ctr_publi->ctrl_isLivre($k->getId_publication()) == true ? '<i class="fa fa-book"></i>' : '<i class="fa fa-film"></i>'; ?></td>
                            <td><a href="?action=article&art=<?= $k->getId_publication(); ?>"><?= html_entity_decode($k->getTitre()); ?></a></td>
                            <td><?= $k->getDate_publication(); ?></td>
                            <td>
                                <?php foreach($ctr_comm->ctrl_count_commentArt($k->getId_publication()) as $cle): ?>
                                    <?= $cle; ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>
    <?php endif; ?>
    

    
</div>
