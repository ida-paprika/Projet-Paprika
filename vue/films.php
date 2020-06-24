
<?php $titre = "Films"; ?>

<div id="pageFilms">
    <section>
        <h1>Vidéothèque</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </section>

    <section class="artFilms">
        <?php foreach ($data_film as $key => $value): ?>

        <article class="publication">
            <button class="accordion"><?= $data_publi->ctrl_publiFilms( $value->getId_publication() )->getTitre(); ?><p></p></button>

            <div class="panel">
                <img src="images/affiches/<?= $value->getAffiche(); ?>" alt="affiche du film" class="affiche">
                <div class="realisateur">
                    <p><span>Réalisateur :</span>&ensp;<?= $value->getRealisateur(); ?></p>
                </div>     
                <div class="genre">
                    <p><span>Genre :</span>&ensp;
                    <?php foreach($data_genre->ctrl_getDesi_Genre( $value->getId_publication() ) as $k): ?>
                        <?= $k->getDesignation(); ?>
                    <?php endforeach; ?>
                    </p>
                </div>
                <div class="duree">
                    <p><span>Durée :</span>&ensp;<?= $value->getDuree(); ?></p>
                </div>
                <div class="nationalite">
                    <p><span>Nationalité :</span>&ensp;<?= $value->getNationalite(); ?></p>
                </div>
                <div class="date_sortie">
                    <p><span>Sorti le :</span>&ensp;<?= $value->getDate_sortie(); ?></p>
                </div>
                <div class="acteurs">
                    <p><span>Avec :</span>&ensp;<?= $value->getActeurs(); ?></p>
                </div>
                <div class="resume">
                    <p><span>Résumé :</span>&ensp;<?= str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->ctrl_publiFilms( $value->getId_publication() )->getResume()); ?></p>
                </div>
                <div class="avis">
                    <p><span>Avis :</span>&ensp;<?= str_replace(array("\r\n", "\n", "\r"), '<br />', $data_publi->ctrl_publiFilms( $value->getId_publication() )->getAvis()); ?></p>
                </div>
                <div class="lien">
                    <a href="<?= "https://".$data_publi->ctrl_publiFilms( $value->getId_publication() )->getLien(); ?>" target="_blank">
                        Voir la page <?= $data_publi->ctrl_publiFilms( $value->getId_publication() )->getLien() == "%allocine%" ? "AlloCiné" : "IMDB"; ?>
                    </a>
                </div>
                <a href="?action=article&art=<?= $value->getId_publication(); ?>">Voir les commentaires</a>
            </div>
        </article>
        
        <?php endforeach; ?>
    </section>
</div>

