<?php
include "cnx.php";
        $telephone =$_GET['telephone'];
        // Supprimez les données correspondant au numéro de téléphone de la base de données
        $sql = "DELETE FROM profs WHERE telephone='$telephone'";
        $resultat = mysqli_query($con, $sql);
    
        // Vérifie si la suppression a réussi
        if ($resultat) {
            // Redirige vers une autre page après la suppression
            header("Location: PE.php");
            exit(); // Assure que le script s'arrête ici après la redirection
        } else {
            // Affiche un message d'erreur si la suppression échoue
            echo "<h1>Erreur de suppression : " . mysqli_error($con) . "</h1>";
        }

?>
