<?php $titre = "Connexion"; ?>

<div id="pageConnexion">
    <section>
        <h2>Se connecter</h2>
        <div class="blocForm">
            <form action="" method="post">
                <div class="userMail">
                    <label for="mail"></label>
                    <input type="email" name="mail" placeholder="adresse mail" 
                           title="Saisir une adresse mail valide"
                           minlength="8" maxlength="30" required class="u-mail">
                </div>
                <div class="userMdp">
                    <label for="mdp"></label>
                    <input type="password" name="mdp" placeholder="mot de passe"
                           title="De 8 à 20 caractères, minuscule, majuscule et chiffre requis"
                           minlength="8" maxlength="20" required class="u-mdp">
                </div>
                <?= !empty($_SESSION['msg'])? '<p class="my-2 p-1 bg-danger font-weight-bold text-center" id="message"><i class="fa fa-exclamation-triangle"></i> '. $_SESSION['msg'] . '</p>' : ''; ?>
                <div class="submit-div">
                    <input type="submit" name="userConnect" value="Se connecter">
                </div>
            </form>
            <p>(Pas encore de compte ? <a href="?action=inscription">Inscrivez-vous !</a>)</p>
        </div>
    </section>
</div>