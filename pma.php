<?php require_once ('config.php') ?>


<link rel="stylesheet" href="master.css">
<div class="orange">
    <form  action="#" method="post">
        <label for="requete">Requête :</label><br>
        <textarea name="requete" id="" cols="100" rows="10"></textarea>
        <input type="submit" class="bouton-gris" name="execute" value="OK">
    </form>
    <?php
    $contenu ='';
    if (isset($_POST['requete']) && !empty($_POST['requete'])) {
        $requete = $_POST['requete'];
        $tableau = executeRequete($requete);

        echo "Requete : ".$requete;
        $test = executeRequete('SELECT database()');
        $database = $test->fetch_assoc();
        foreach ($database as $indice => $information){
            echo '<br>BDD : ' . ucfirst($information);
        }
        if ($tableau->num_rows>0) {
            $contenu .= '<br><div class="alert alert-resultat">Voici les résultats de votre requête</div>';
        }else{
            $contenu .= '<br><div class="alert alert-warning">Aucun résultat trouvé !</div>';
        }
        if (isset($contenu) && !empty($contenu)){
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
</div>
