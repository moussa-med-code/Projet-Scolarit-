<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="table.css">
<link rel="icon" href="these.png">
</head>
<body>
<div class="btn"><a href="index.html">Accueil <span ><img class="icone" src="maison.png"></span></a></div>
</body>
</html>
<?php
include "cnx.php";

// Récupération des données soumises par le formulaire
$matricule = $_POST['Matricule'];
$nomComplet = $_POST['NomComplet'];
$orientation = $_POST['Orientation'];
$filiere = $_POST['Filiere'];
$departements = $_POST['Departements'];

$sql="select * from etud where matricule='$matricule'";
$r=mysqli_query($con,$sql);
if(mysqli_num_rows($r)==1){
    echo "<h1>Étudiant existant</h1>";
}else{
    // Requête SQL pour insérer les données dans la table
$sql1 = "INSERT INTO etud (Matricule, NomComplet, Orientation, Filiere, Departements)
VALUES ('$matricule', '$nomComplet', '$orientation', '$filiere', '$departements')";

// Exécution de la requête
if ($con->query($sql1) === TRUE) {
    header("location:EI.php");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

}
?>

