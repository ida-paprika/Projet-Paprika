
<?php $titre = "Accueil"; ?>

<div id="pageAccueil">
    <h1>Bienvenue à toi, <?= isset($_SESSION['user']) ? ucfirst(unserialize($_SESSION['user'])->getPseudo()) : 'étranger'; ?> !</h1>

    <section>
        <div class="slideshow-container">
            <?php foreach($livre as $key => $value): ?>
                <div class="mySlides text-center">
                    <a href="?action=article&art=<?= $value->getId_publication(); ?>"><img src="images/couvertures/<?= $value->getCouverture(); ?>"></a>
                </div>
            <?php endforeach; ?>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </section>
    
    <section>
        <form action="" method="POST" id="formTri_genreL">
            <label for="genreLivre">J'ai envie de lire un livre du genre :&nbsp;</label>
            <select name="genreLivre" id="" onchange="document.getElementById('formTri_genreL').submit();">
                <?php foreach($genre as $k => $v): ?>
                    <option value="<?= $v->getId(); ?>"><?= $v->getDesignation(); ?></option>
                <?php endforeach; ?>
            </select>
        </form>
        <div>
            <?php if(isset($livreG)): ?>
                <?php foreach($livreG as $key => $value): ?>
                    <div class="mySlides text-center">
                        <a href="?action=article&art=<?= $value->getId_publication(); ?>"><img src="images/couvertures/<?= $value->getCouverture(); ?>"></a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    
    <div>
        Annonces
        <p>User1 a besoin d'une illustration pour Titre du Film</p>
        <p>User2 a besoin d'aide pour relire <a href="">son article</a></p>
    </div>
    
    <div>
        Dernier article publié
    </div>
    
    
    
</div>
