<h1>Contact</h1>


<?php



$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
$mail = isset($_POST['mail']) ? $_POST['mail'] : "";
$texte = trim(isset($_POST['texte']) ? $_POST['texte'] : "");

require_once "frmContact.php";


if (isset($_POST['maurice'])) {
    $erreurs = array();
    if (!(mb_strlen($nom) >= 2 ))
        array_push($erreurs, "Veuillez saisir un nom correct.");

    if (!(mb_strlen($prenom) >= 2 ))
        array_push($erreurs, "Veuillez saisir un prénom correct.");

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        array_push($erreurs, "Veuillez saisir une adresse mail valide.");

    if ($texte == "")
        array_push($erreurs, "Votre message est vide.");

    if (count($erreurs) > 0) {
        $message = "<ul>";
        $i = 0;

        while ($i < count($erreurs)) {
            $message .= "<li>" . $erreurs[$i] . "</li>";
            $i++;
        }

        $message .= "</ul>";

        echo $message;
        require_once "frmContact.php";


    } else {
        $sql = "INSERT INTO T_CONTACTS
                (CTCNOM, CTCPRENOM, CTCMAIL, CTCTEXTE)
                VALUES ('" . $nom . "', '" . $prenom . "', '" . $mail . "', '" . $texte . "')";

        $query = $pdo->prepare($sql);
        $query->bindValue('CTCNOM', $nom, PDO::PARAM_STR);
        $query->bindValue('CTCPRENOM', $prenom, PDO::PARAM_STR);
        $query->bindValue('CTCMAIL', $mail, PDO::PARAM_STR);
        $query->bindValue('CTCTEXTE', $texte, PDO::PARAM_STR);
        $query->execute();

        echo "Votre message a bien été envoyé!";

    }
}



?>