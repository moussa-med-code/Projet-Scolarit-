<?php
include "cnx.php";
$Matricule=$_GET['Matricule'];

if(isset($_POST['Envoyer']))
{
// Récupération des données soumises par le formulaire
$matricule = $_POST['Matricule'];
$nomComplet = $_POST['NomComplet'];
$orientation = $_POST['Orientation'];
$filiere = $_POST['Filiere'];
$departements = $_POST['Departements'];

	$sql= "update  etud set Matricule='$matricule', NomComplet='$nomComplet', Orientation='$orientation' , Filiere='$filiere', Departements='$departements' where matricule='$Matricule'";
	$resultat = mysqli_query($con,$sql);
	if($resultat)
	{
		header("Location:EI.php");
	}
	else
	{
		echo "<h1>Erreur de Modification</h1>";
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="these.png">
    <title>Modifier Étudiants</title>
</head>
<style>
    .login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(24, 20, 20, 0.987);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
}
.login-box .user-box {
    position: relative;
}
.login-box .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
}
.login-box .user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
}
.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #bdb8b8;
    font-size: 12px;
}
.login-box form a {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #ffffff;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px
}
.login-box a:hover {
    background: rgb(0, 81, 255);
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgb(0, 81, 255),
                0 0 25px rgb(0, 81, 255),
                0 0 50px rgb(0, 81, 255),
                0 0 100px rgb(0, 81, 255);
}
.login-box a span {
    position: absolute;
    display: block;
}
@keyframes btn-anim1 {
    0% {
    left: -100%;
    }
    50%,100% {
    left: 100%;
    }
}
.login-box a span:nth-child(1) {
    bottom: 2px;
    left: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgb(0, 81, 255));
    animation: btn-anim1 2s linear infinite;
}
h1 {
    font-size: 36px; /* Taille de la police */
    font-weight: bold; /* Poids de la police */
    color: #333; /* Couleur du texte */
    text-align: center; /* Alignement du texte */
    text-transform: uppercase; /* Transformation en majuscules */
    margin: 20px 0; /* Marge extérieure supérieure et inférieure */
    padding: 10px; /* Remplissage intérieur */
    border-bottom: 2px solid #333; /* Bordure en bas */
    line-height: 1.2; /* Hauteur de ligne */
    letter-spacing: 2px; /* Espacement des lettres */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Ombre du texte */
    background-color: #f8f8f8; /* Couleur de fond */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre de la boîte */
}
</style>
<body>
    <div class="login-box">
		<form method="post"> <!-- Envoyer les données soumises à un script PHP -->
		  <div class="user-box">
			<input type="text" name="Matricule" required> <!-- Nom du champ correspondant à la colonne Matricule -->
			<label>Matricule</label>
		  </div>
		  <div class="user-box">
			<input type="text" name="NomComplet" required> <!-- Nom du champ correspondant à la colonne NomComplet -->
			<label>Nom Complet</label>
		  </div>
		  <div class="user-box">
			<input type="text" name="Orientation" required> <!-- Nom du champ correspondant à la colonne Orientation -->
			<label>Orientation</label>
		  </div>
		  <div class="user-box">
			<input type="text" name="Filiere" required> <!-- Nom du champ correspondant à la colonne Filiere -->
			<label>Filiere</label>
		  </div>
		  <div class="user-box">
			<input type="text" name="Departements" required> <!-- Nom du champ correspondant à la colonne Departements -->
			<label>Departements</label>
		  </div>
		  <center>
			<input type="submit" value="Envoyer" name="Envoyer">
		  </center>
		</form>
	  </div>
</body>
</html>

