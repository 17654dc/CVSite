<h1 class="titre3">Page d'admin</h1>

<?php

if (isset($_POST['admin'])) {
    $login = isset($_POST['login']) ? $_POST['login'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";
    $erreurs = array();
    if (!(mb_strlen($login ) >= 2))
        array_push($erreurs, "Veuillez saisir un login.");
    if (!(mb_strlen($mdp) >= 2))
        array_push($erreurs, "Veuillez saisir un mot de passe.");
    if (count($erreurs) > 0) {
        $message = "<ul class='alert'>";
        $i = 0;
        while ($i < count($erreurs)) {
            $message .= "<li>" . $erreurs[$i] . "</li>";
            $i++;
        }
        $message .= "</ul>";
        echo $message;
        include "frmAdmin.php";
    } else {


        $getDatas =  "SELECT * FROM t_admin
                        WHERE LOGIN_ADMIN='". $login . "'" ;
        $result = $pdo->query($getDatas)->fetch(PDO::FETCH_ASSOC);
        $hash = $result['MDP_ADMIN'];
        $mdp = sha1($mdp);



        if ($mdp == $hash) {

            echo "<p class='ok'>Welcome Beau Gosse!!  Voici les messages déposés dans ta BDD : </p>";

            $contacts = $pdo->query('SELECT * FROM T_CONTACTS');
            $donnees = $contacts->fetch();



            while ($donnees = $contacts->fetch())
            {
                ?>
                <div class="centre">
                <p class="paragraphe">
                    Nom: <?php echo $donnees->CTCNOM; ?><br>
                    Prénom: <?php echo $donnees->CTCPRENOM; ?><br>
                    Mail : <?php echo $donnees->CTCMAIL; ?><br>
                    Message: <?php echo $donnees->CTCTEXTE; ?><br>
                    Date et heure: <?php echo $donnees->CTCTIME; ?>
                </p>
                </div>
                <?php
            }

            $contacts->closeCursor();

        }
        else {
            echo "<p class = 'alert'>Le login et le mot de passe ne correspondent pas.</p>";
            require_once "frmAdmin.php";

        }
    }
} else {
    require_once "frmAdmin.php";
}
