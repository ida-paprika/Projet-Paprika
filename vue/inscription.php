<?php $titre = "Inscription"; ?>

<div id="pageInscription">
    <section>
        <h2>Créer un compte</h2>
        <div class="blocForm">
            <form action="" method="post">
                <div class="newUserPseudo">
                    <label for="pseudo"></label>
                    <input type="text" name="pseudo" placeholder="pseudo" 
                           minlength="3" maxlength="20" 
                           title="De 3 à 20 caractères, minuscules, majuscules et chiffres seulement (pas de caractères spéciaux)" 
                           required class="u-pseudo" value="<?= isset($pseudo) ? $pseudo : '' ; ?>">
                </div>
                <div class="newUserMail">
                    <label for="mail"></label>
                    <input type="email" name="mail" placeholder="adresse mail" 
                           title="Saisir une adresse mail valide"
                           minlength="8" maxlength="30" required class="u-mail" value="<?= isset($mail) ? $mail : '' ; ?>">
                </div>
                <div class="newUserMdp">
                    <label for="mdp"></label>
                    <input type="password" name="mdp" placeholder="mot de passe"
                           title="De 8 à 20 caractères, minuscule, majuscule et chiffre requis"
                           minlength="8" maxlength="20" required class="u-mdp">
                </div>
                <?= !empty($msg)? '<p class="my-2 p-1 bg-danger font-weight-bold text-center" id="message"><i class="fa fa-exclamation-triangle"></i> '. $msg . '</p>' : ''; ?>
                <div class="submit-div">
                    <input type="submit" name="userInscript" value="S'inscrire">
                    <input type="button" name="annuler" value="Annuler" onclick='location.href="index.php?action=inscription"'>
                </div>
            </form>
        </div>
    </section>
</div>