<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico">
    <title>Reclamations</title>
    <style>
        /* Sélectionne tous les h1 */
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
</head>
<?php
include 'cnx.php';
    $n=$_POST['NomComplet'];
    $mat=$_POST['Matricule'];
    $mes=$_POST['message'];
    $Matières=$_POST['Matières'];
    $sql="select * from etud where Matricule='$mat';";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)==1){
        $sql2="insert into reclamation values('$mat','$n','$mes','$Matières');";
        mysqli_query($con,$sql2);
        echo"<script>alert('Votre réclamation a ete envoyé avec success');</script>";
    }else{
        echo "<script>confirm('Matricule invalide');</script>";
    }
?>