<?php
session_start();
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="./css//bootstrap.css">
</head>

<body>

    <div class="container mt-2">
        <div class="card">
            <h5 class="card-header">Redirection http</h5>
            <div class="card-body">

                <form action="./traitement.php" method="post">
                    <button type="submit" name="redirection" class="btn btn-primary">redirection https</button>
                </form>
            </div>
        </div>
        <div class="card my-3">
            <h5 class="card-header">Changer l'extension des fichiers sans les renomers</h5>
            <div class="card-body">
                <?php
                    if (isset($_SESSION['changer_extension_msg'])) {
                        echo $_SESSION['changer_extension_msg'];
                    }
				?>
                <!-- <h5 class="card-title">Special title treatment</h5> -->

                <form action="./traitement.php" method="post">
                    <div class="mb-3">
                        <label for="ext_dep" class="form-label">Extension de départ</label>
                        <input type="text" name="ext_dep" class="form-control" id="ext_dep">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="ext_fin" class="form-label">Extension de fin</label>
                        <input type="text" name="ext_fin" class="form-control" id="ext_fin">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="che_dos" class="form-label">Chemin absolue vers le dossier</label>
                        <input type="text" name="che_dos" class="form-control" id="che_dos">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <button type="submit" name="changer_extension" class="btn btn-primary">changer les extensions</button>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Ajouter un prefix devant les noms des fichiers</h5>
            <div class="card-body">
            <?php
                    if (isset($_SESSION['ajouter_prefix_msg'])) {
                        echo $_SESSION['ajouter_prefix_msg'];
                    }
				?>
                <!-- <h5 class="card-title">Special title treatment</h5> -->

                <form action="./traitement.php" method="post">
                    <div class="mb-3">
                        <label for="ext_fich" class="form-label">Extension des fichiers</label>
                        <input type="text" name="ext_fich" class="form-control" id="ext_fich">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="name_pref" class="form-label">Nom (prefix)</label>
                        <input type="text" name="name_pref" class="form-control" id="name_pref">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="chem_dos" class="form-label">Chemin absolue vers le dossier</label>
                        <input type="text" name="chem_dos" class="form-control" id="chem_dos">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <button type="submit" name="ajouter_prefix" class="btn btn-primary">Ajouter le prefix aux fichiers</button>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>