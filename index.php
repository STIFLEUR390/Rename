<?php
    session_start();

    $app_name = 'Dev Master';
    /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # code...
    } */

    if (isset($_SESSION['type']) && isset($_SESSION['message'])) {
        $type = $_SESSION['type'];
        $msg = $_SESSION['message'];
    }

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ebook anime management</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./sweetalert2/sweetalert2.css">
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
                        <div class="form-text">Ajouter  un espace après le prefix si vous voulez un espace</div>
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

        <div class="card my-3">
            <h5 class="card-header">supprimer un caractere</h5>
            <div class="card-body">
            <?php
                    if (isset($_SESSION['sup_carac_msg'])) {
                        echo $_SESSION['sup_carac_msg'];
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
                        <label for="carac_name" class="form-label">chaîne de caractères à supprimer</label>
                        <input type="text" name="carac_name" class="form-control" id="name_pref">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="chem_doss" class="form-label">Chemin absolue vers le dossier</label>
                        <input type="text" name="chem_doss" class="form-control" id="chem_dos">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <button type="submit" name="sup_carac" class="btn btn-primary">Ajouter le prefix aux fichiers</button>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Remplacer un caractere par un autre</h5>
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
                        <label for="carac_dep" class="form-label">Caractère à remplacer</label>
                        <input type="text" name="carac_dep" class="form-control" id="name_pref">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="carac_fin" class="form-label">Nouveau caractere</label>
                        <input type="text" name="carac_fin" class="form-control" id="name_pref">
                        <div class="form-text">Ajouter  un espace après le prefix si vous voulez un espace</div>
                    </div>
                    <div class="mb-3">
                        <label for="chem_dos" class="form-label">Chemin absolue vers le dossier</label>
                        <input type="text" name="chem_dos" class="form-control" id="chem_dos">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <button type="submit" name="remp_carac" class="btn btn-primary">Ajouter le prefix aux fichiers</button>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./jquery/jquery.js"></script>
    <script src="./sweetalert2/sweetalert2.all.js"></script>
    <script>
        
    </script>
    <!-- <script src="./sweetalert2/sweetalert2.js"></script> -->
    <?php 
        if (isset($type) && isset($msg)) {
            echo '<script type="text/javascript">
  
            $(document).ready(function(){
            
                Swal.fire(
                    "'.$app_name.'",
                    "'.$msg.'",
                    "'.$type.'"
                )
            });
            
            </script><br>';
        }

        /* if (isset($type) && isset($msg)) {
            echo '<script type="text/javascript">
  
            $(document).ready(function(){
                const toastMixin = Swal.mixin({
                    toast: true,
                    icon: "success",
                    title: "General Title",
                    animation: false,
                    position: "top-right",
                    showConfirmButton: false,
                    timer: 30000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener("mouseenter", Swal.stopTimer)
                        toast.addEventListener("mouseleave", Swal.resumeTimer)
                    }
                });

                toastMixin.fire({
                    title: "'.$msg.'",
                    icon: "'.$type.'"
                });
            });
            
            </script><br>';
        } */
    ?>
</body>

</html>