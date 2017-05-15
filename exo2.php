<?php
$error = '';

// Multiplication
if (isset($_POST['additionner']) || isset($_POST['soustraire']) || isset($_POST['multiplier']) || isset($_POST['diviser'])) {
    if (!isset($_POST['value1']) || empty($_POST['value1']) || !is_numeric($_POST['value1'])) {
        if ($_POST['value1'] == 0 && isset($_POST['diviser'])) {
            $error .= "<br/> Erreur valeur 1 (Division par 0 impossible)";
        } else {
            if (!is_numeric($_POST['value1'])) {
                $error .= "<br/> Erreur Valeur 1 (Pas de lettres ni caractères spéciaux !";
            } else {
                $value1 = $_POST['value1'];
            }
        }
    }
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
<div class="container">
    <fieldset>
        <legend>Calculatrice en Ligne</legend>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="bd-callout bd-calloutt left">
                    <h4 id="bloc">Calculatrice</h4>
                    <form class="form-group" action="#" method="post">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon">Valeur 1 :</div>
                            <input type="text" class="form-control" name="value1" id="inlineFormInputGroupvalue2"
                                   value="<?php if (isset($value1) && !empty($value1)) {
                                       echo $value1;
                                   } ?>">
                        </div>
                        <hr>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon">Valeur 2 :</div>
                            <input type="text" class="form-control" name="value2" id="inlineFormInputGroupvalue2"
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
                        <input class="bouton" type="submit" name="additionner" value="Additionner">
                        <input class="bouton" type="submit" name="soustraire" value="Soustraire">
                        <input class="bouton" type="submit" name="multiplier" value="Multiplier">
                        <input class="bouton" type="submit" name="diviser" value="Diviser">
                </div>
            </div>
        </div>
        <!-- /.row -->
</div>
</fieldset>