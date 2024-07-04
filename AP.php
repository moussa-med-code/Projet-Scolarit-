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
    $telephone = $_POST['telephone'];
    $nomComplet = $_POST['NomComplet'];
    $matieres = $_POST['Matieres'];
    $email = $_POST['Email'];
    $date_embauche = $_POST['DateEmbauche'];
    $departements = $_POST['Departements'];
$sql="select * from profs where telephone='$telephone'";
$r=mysqli_query($con,$sql);
if(mysqli_num_rows($r)==1){
    echo "<h1>Professeur existant</h1>";
}else{
    // Requête SQL pour insérer les données dans la table
$sql1 = "INSERT INTO profs
VALUES ('$telephone', '$nomComplet', '$matieres','$email', '$date_embauche','$departements')";

// Exécution de la requête
if ($con->query($sql1) === TRUE) {
    header("location:PE.php");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

}
?>

