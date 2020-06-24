
<?php $titre = html_entity_decode($data_publi->getTitre()); ?>

<div id="pageArticle_livre" class="pageArticle">
    <section>
        <article>
            <div style="display: none;" id="font-titre"><?= $data_publi->getPolice(); ?></div>
            <div class="titreArticle" style="background-image: url('images/accordion/<?= $data_publi->getImg_bg(); ?>')">
                <h1 class="titre-art" style="font-family: <?= $data_publi->getPolice(); ?>;"><?= html_entity_decode($data_publi->getTitre()); ?></h1>
            </div>
            <div class="panel">
                <img src="images/couvertures/<?= $data_livre->getCouverture(); ?>" alt="couverture du livre" class="couverture">
                <div class="auteur">
                    <p><span>Auteur :</span>&ensp;<?= html_entity_decode($data_livre->getAuteur()); ?></p>
                </div>
                <div class="editeur">
                    <p><span>Editeur :</span>&ensp;<?= html_entity_decode($data_livre->getEditeur()); ?></p>
                </div>       
                <div class="genre">
                    <p><span>Genre :</span>&ensp;
                    <!-- foreach( genre ): -->
                    <?php foreach($data_genre->ctrl_getDesi_Genre( $data_livre->getId_publication() ) as $k): ?>
                        <?= html_entity_decode($k->getDesignation()); ?>
                    <?php endforeach; ?>
                    <!-- endforeach; -->
                    </p>
                </div>
                <div class="type">
                    <p><span>Type :</span>&ensp;<?= html_entity_decode($data_livre->getType()); ?></p>
                </div>
            <?php if( !empty($data_publi->getRecompense())): ?>
                <div class="recompenses">
                    <p><span>Récompenses :</span>&ensp;<?= html_entity_decode($data_publi->getRecompense()); ?></p>
                </div>
            <?php endif; ?>
                <div class="resume">
                    <p><span>Résumé :</span>&ensp;<?= html_entity_decode(str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->getResume() )); ?></p>
                </div>
            <?php if( !empty($data_publi->getA_propos())): ?>
                <div class="a_propos">
                    <p><span>À propos :</span>&ensp;<?= html_entity_decode(str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->getA_propos() )); ?></p>
                </div>
            <?php endif; ?>
                <div class="avis">
                    <p><span>Avis :</span>&ensp;<?= html_entity_decode(str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->getAvis() )); ?></p>
                </div>
                <?php if( !empty($data_publi->getAvis_detail()) ): ?>
                <div class="avis_detail">
                    <p>
                        <span>Plus en détail :</span> ( <i class="fa fa-exclamation-triangle"></i><em> peut contenir des spoilers </em>
                        <i class="fa fa-exclamation-triangle"></i> )&ensp;<?= html_entity_decode("<span class='spoiler'>".str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->getAvis_detail() )."</span>"); ?>
                    </p>
                </div>
            <?php endif; ?>
                <div class="lien">
                    <a href="<?= "https://".$data_publi->getLien(); ?>" target="_blank">
                        Voir la page <?= $data_publi->getLien() == "%babelio%" ? "babelio" : "de l'éditeur"; ?>
                    </a>
                </div>
                <div>
                    <p>L'acheter en ligne | Trouver une librairie</p>
                </div>
                <div class="user_article">
                    <img src="images/avatars/<?= $ctrPubli->ctrl_getAuteur_publi($data_publi->getId_user())->getAvatar(); ?>" alt="avatar de l'auteur de l'article">
                    <p>
                        
                        <em>Publié par :</em>&ensp;<a href="?action=profil&user=<?= $data_publi->getId_user(); ?>"><?= ucfirst($ctrPubli->ctrl_getAuteur_publi($data_publi->getId_user())->getPseudo() ); ?></a>
                    </p>
                </div>
            </div>    
    <!-- elseif( FILM ): -->
    
    <!-- endif; -->
        </article>
        
        <div class="block_comments">
            <!-- ternaire en fonction de comment_livre/film -->
            <section>
                <h4>Commentaires</h4>
                <?php foreach( $data_comm->ctrl_getComment_Livre($data_livre->getId_publication()) as $k ): ?>
                <div class="affichComment">
                    <hr>
                    <img src="images/avatars/<?= $data_comm->ctrl_getAuteur_comment($k->getId_user())->getAvatar(); ?>" alt="avatar de l'auteur du commentaire">
                    <p>
                        <span><a href="?action=profil&user=<?= $k->getId_user(); ?>"><?= ucfirst($data_comm->ctrl_getAuteur_comment($k->getId_user())->getPseudo() ); ?> </a><small><em>(le <?= $k->getDate_comment(); ?>)</em></small> : </span>
                        <?= html_entity_decode($k->getContenu()); ?>
                    </p>
                    <?php if($isAdmin == true): ?>
                    <button type="button"><a href="?deleteComment=<?= $k->getId_comment(); ?>&p=<?= $k->getId_publication(); ?>">Supprimer ce commentaire</a></button>
                    <?php elseif($isMembre == true): ?>
                        <button data-target="<?= "#modal-display".++$num1; ?>" id="<?= "btn-modal".$num1; ?>" class="btnModal"><small>Signaler ce commentaire</small></button>
                        
                        <div id="<?= "modal-display".$num1; ?>" class="modalBox">
                            <div class="modal-contenu">
                                <span class="close">&times;</span>
                                <form action="" method="POST" class="style-modal">
                                    <input type="hidden" name="id_comment" value="<?= $k->getId_comment(); ?>">
                                    <input type="hidden" name="id_from_user" value="<?= $user->getId(); ?>">
                                    <input type="hidden" name="id_user_com" value="<?= $k->getId_user(); ?>">
                                    <input type="hidden" name="id_publication" value="<?= $data_publi->getId_publication(); ?>">
                                    <div>
                                        <label for="motif">Motif du signalement</label>
                                        <p>250 caractères max</p>
                                        <textarea name="motif" id="" cols="20"></textarea>
                                    </div>
                                    <div>
                                        <input type="submit" name="signal_comment" value="Signaler">
                                        <input type="button" value="Annuler" onclick='location.href="index.php?action=article&art=<?= $data_publi->getId_publication(); ?>"'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- <div class="bg-danger">Editer</div> -->
                </div>
                <?php endforeach; ?>
            </section>
            
            <?php if($isConnect == true): ?>
            <section class="addComment blocForm">
                <form action="" method="post">
                    <input type="hidden" name="id_user" value="<?= $user->getId(); ?>">
                    <!-- input type="hidden" name="id_livre" value="<? $data_livre->getId(); ?>" -->
                    <input type="hidden" name="id_publication" value="<?= $data_livre->getId_publication(); ?>">
                    <div>
                        <label for="contenu">Ajouter un commentaire :</label>
                        <textarea name="contenu" id="" cols="20" rows="3"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="ajout_comment" value="&#128505;">
                        <input type="button" name="annuler" value="&#128503;" onclick='location.href="index.php?action=article"'>
                    </div>
                </form>
            </section>
            <?php else: ?>
            <div class="blocForm text-center pb-1">
                <p>Vous devez être <a href="?action=connexion">connecté</a> pour ajouter un commentaire</p>
            </div>
            <?php endif; ?>
            <!-- fin ternaire -->
        </div>
    
        
    </section>

</div>




                    