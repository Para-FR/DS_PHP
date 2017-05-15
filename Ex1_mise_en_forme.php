<!--/EXERCIC 1 : Mise en page-->


<!--// Question 1/2/3 -->

<form method="post">
<label> Terme</label> <input type="text" name="terme">
    <input type="submit" value="valider">
</form>

<?php

// cette ligne permet de se connecter à la base de données : on donne la localisation et le nom de la base de données; ainsi que le nom d'utilisateur et le mot de passe
$cnx = new PDO('mysql:host=localhost;dbname=entreprise','root','');

// on démarre une session
session_start();


if($_POST) {
    if (!empty($_POST['terme'])) {
        // on affecte à la variable "$terme" ce que l'utilisateur a entré dans l'input avec pour nom "term"
        $terme = $_POST['terme'];
        //on  affecte à $req la commande sql qui récupère dans la base de données les prenoms qui commencent par la variable "$terme" et fini par n'importe quels caractères
        $req = "SELECT prenom FROM employes WHERE prenom like '$terme%'";


// on crée une variable pour les couleurs
$i = 0;

// on crée le tableau
echo '<table border="2">';

// on affecte $res.
// $res permet d'envoyer la commande affectée à $req à la base de données
$res = $cnx->query($req);

// on affiche "terme" en gras et on concataine la variable "$terme"
echo "<strong>terme : </strong>".$terme;

// Récupère la ligne suivante d'un jeu de résultats PDO
// ici, tant que $ligne = $res
while($ligne = $res->fetch()){
    // on crée un tr
    echo '<tr>';

        // on affiche les prénoms
        // on alterne la couleur des lignes du tableau
        echo "<td bgcolor='".( ($i++ % 2 == 0) ? '#ffffff' : '#0099ff' )."'>".$ligne['prenom']."</td><br/>";

    echo '</tr>';
}
echo '</table>';

    }
}
?>

