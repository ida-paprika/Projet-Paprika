
<?php $titre = "Livres"; ?>

<div id="pageLivres">
    <section>
        <h1>Bibliothèque</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </section>

    
    <section class="artLivres">
        <?php foreach($data_livre as $key => $value): ?>
        <article class="publication">
            <button class="accordion" 
                    style="background-image: url('images/accordion/<?= $data_publi->ctrl_publiLivres( $value->getId_publication() )->getImg_bg(); ?>'); font-family: <?= $data_publi->ctrl_publiLivres( $value->getId_publication() )->getPolice(); ?>;" 
                    id="<?= $data_publi->ctrl_publiLivres( $value->getId_publication() )->getImg_bg(); ?>" ><?= html_entity_decode($data_publi->ctrl_publiLivres( $value->getId_publication() )->getTitre()); ?><p></p>
            </button>

            <div class="panel">
                <img src="images/couvertures/<?= $value->getCouverture(); ?>" alt="couverture du livre" class="couverture">
                <div class="auteur">
                    <p><span>Auteur :</span>&ensp;<?= html_entity_decode($value->getAuteur()); ?></p>
                </div>
                <div class="editeur">
                    <p><span>Editeur :</span>&ensp;<?= html_entity_decode($value->getEditeur()); ?></p>
                </div>       
                <div class="genre">
                    <p><span>Genre :</span>&ensp;
                    <?php foreach($data_genre->ctrl_getDesi_Genre( $value->getId_publication() ) as $k): ?>
                        <?= html_entity_decode($k->getDesignation()); ?>
                    <?php endforeach; ?>
                    </p>
                </div>
                <div class="type">
                    <p><span>Type :</span>&ensp;<?= html_entity_decode($value->getType()); ?></p>
                </div>
                <div class="resume">
                    <p><span>Résumé :</span>&ensp;<?= html_entity_decode(str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->ctrl_publiLivres( $value->getId_publication() )->getResume())); ?></p>
                </div>
                <div class="avis">
                    <p><span>Avis :</span>&ensp;<?= html_entity_decode(str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->ctrl_publiLivres( $value->getId_publication() )->getAvis())); ?></p>
                </div>
                <div class="lien">
                    <a href="<?= "https://".$data_publi->ctrl_publiLivres( $value->getId_publication() )->getLien(); ?>" target="_blank">
                        Voir la page <?= $data_publi->ctrl_publiLivres( $value->getId_publication() )->getLien() == "%babelio%" ? "babelio" : "de l'éditeur"; ?>
                    </a>
                </div>
                
                <!-- ( $data_publi->ctrl_publiLivres($value->getId_publication()); ) -->
                <a href="?action=article&art=<?= $value->getId_publication(); ?>">Page de l'article</a>
            </div>
        </article>

        <?php endforeach; ?>

    </section>
</div>


