<?php
$error = '';

// Vérifie si tous les boutons sont set
// Puis les calculs se font en fonction du bouton
if (isset($_POST['additionner']) || isset($_POST['soustraire']) || isset($_POST['multiplier']) || isset($_POST['diviser'])) {
    // si "value1" n'est pas définis, ou vide, ou n'est pas numérique
    if (!isset($_POST['value1']) || empty($_POST['value1']) || !is_numeric($_POST['value1'])) {
        // si "value1" vaut 0 et que on choisit le bouton "diviser"
        if ($_POST['value1'] == 0 && isset($_POST['diviser'])) {
            // on affiche un message d'erreur
            $error .= "<br/> Erreur valeur 1 (Division par 0 impossible)";
        } else {
            // si les conditions sont respectées sauf la condition "n'est pas numérique", on affiche un message d'erreur
            if (!is_numeric($_POST['value1'])) {
                $error .= "<br/> Erreur Valeur 1 (Pas de lettres ni caractères spéciaux !";
            } else {
                // sinon on enregistre la valeur
                $value1 = $_POST['value1'];
            }
        }
    }
    // on fait les mêmes tests pour "value2"
    if (!isset($_POST['value2']) || empty($_POST['value2'])) {
        if ($_POST['value2'] == 0 && isset($_POST['diviser'])) {
            $error .= "<br/> Erreur valeur 2 (Division par 0 impossible)";
        } else {
            if (!is_numeric($_POST['value2'])) {
                $error .= "<br/> Erreur Valeur 2 (Pas de lettres ni caractères spéciaux !";
            } else {
                $value2 = $_POST['value2'];
            }
        }
    } else {
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];
    }
    // si il n'y a pas d'erreur on procède aux calculs
    if ($error == '') {
        if (isset($_POST['soustraire'])) {
            $resultat = $value1 - $value2;
        } elseif (isset($_POST['multiplier'])) {
            $resultat = $value1 * $value2;
        } elseif (isset($_POST['diviser'])) {
            $resultat = $value1 / $value2;
        } else {
            $resultat = $value1 + $value2;
        }
    }
}
?>
<link rel="stylesheet" href="master.css">
<div class="">
    <fieldset>
        <legend>Calculatrice en Ligne</legend>
        <div class="">
            <div class="">
                <div class="">
                    <h4 id="bloc">Calculatrice</h4>
                    <form class="" action="#" method="post">
                        <div class="">
                            <div class="">Valeur 1 :</div>
                            <!--permet de garder les valeurs entrées une fois que l'on a validé-->
                            <input type="text" class="" name="value1" "
                            value="<?php if (isset($value1) && !empty($value1)) {
                                echo $value1;
                            } ?>">
                        </div>
                        <hr>
                        <div class="">
                            <div class="">Valeur 2 :</div>
                            <!--permet de garder les valeurs entrées une fois que l'on a validé-->
                            <input type="text" class="" name="value2"

                                   value="<?php if (isset($value2) && !empty($value2)) {
                                       echo $value2;
                                   } ?>">
                        </div>
                        <hr>
                        <?php if (isset($error) && !empty($error)) { ?>
                            <div class="alert alert-danger" role="alert"><strong>Erreur !</strong>
                                <?php echo $error ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($resultat)) { ?>
                            <div class="alert alert-success" role="alert"><strong>Résultat<br/></strong>
                                <?php echo $resultat ?>
                            </div>
                        <?php } ?>
                        <br/>
                        <input class="bouton bouton-vert" type="submit" name="additionner" value="Additionner">
                        <input class="bouton bouton-vert" type="submit" name="soustraire" value="Soustraire">
                        <input class="bouton bouton-vert" type="submit" name="multiplier" value="Multiplier">
                        <input class="bouton bouton-vert" type="submit" name="diviser" value="Diviser">
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
</div>
</fieldset>