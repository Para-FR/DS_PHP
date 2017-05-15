<?php require_once('config.php') ?>

<?php
// On ajoute un cookie, pour garder en memoire le champ requete.
setcookie('requete', $_POST['requete']); ?>
<link rel="stylesheet" href="master.css">
<div class="orange">
    <form action="#" method="post">
        <select name="bdd_requete" id="">
            <?php
            // On envoie une requete au SGBD pour afficher toutes les databases
            $select = $bdd->query('SHOW DATABASES');
            // on récupère la requete sous forme de tableau
            $sel = $select->fetch_all();
            // pour chaque ligne de notre tableau on retourne le string 0
            foreach($sel as $m => $value)
            {
                ?>
                <option value="<?php /* on affiche la valeur de chaque ligne */ echo $value['0'] ?>"><?php echo $value['0'] ?></option>
                <?php
            }
            ?>
        </select>
        <label for="requete">Requête :</label><br>
        <textarea name="requete" id="" cols="100" rows="10" value="<?php if (isset($cookieRequete) && !empty($cookieRequete)) {
            echo $cookieRequete;
        } ?>"></textarea>
        <input type="submit" class="bouton-gris" name="execute" value="OK">
    </form>
    <?php
    // on initialise le contenu à 0
    $contenu = '';
    // Si $_POST['requete'] est defini et pas vide
    if (isset($_POST['requete']) && !empty($_POST['requete'])) {
        // on assimile $_POST['requete'] a $requete
        $requete = $_POST['requete'];
        // on déclare $tableau et on execute la requete recupérée lors du POST
        $tableau = executeRequete($requete);
        // On affiche la requete tapée
        echo "Requete : " . $requete;
        // Si le nombre de lignes est supérieur à 0 on affiche le alert success sinon on affiche aucun résultat trouvé ou l'erreur BDD
        if ($tableau->num_rows > 0) {
            $contenu .= '<br><div class="alert alert-resultat">Voici les résultats de votre requête</div>';
        } else {
            $contenu .= '<br><div class="alert alert-warning">Aucun résultat trouvé !</div>';
        }
        // On affiche si contenu est declaré et n'est pas vide.
        if (isset($contenu) && !empty($contenu)) {
            echo $contenu;
        }
        echo "<b>Lignes concernées : </b> " . $tableau->num_rows;
        echo '<br /><table class="table" border="1"> <tr class="center">';
        while ($colonne = $tableau->fetch_field()) {
            echo '<th class="center text-center">' . ucfirst($colonne->name) . '</th>';
        }
        echo "</tr>";
        while ($ligne = $tableau->fetch_assoc()) {
            echo '<tr>';
            foreach ($ligne as $indice => $information) {
                echo '<td class="center">' . $information . '</td>';
            }
            echo '</tr>';
            //var_dump(executeRequete($requete)->fetch_all());
        }
        echo '</table>';
    }
    ?>
    <?php

    ?>
</div>
