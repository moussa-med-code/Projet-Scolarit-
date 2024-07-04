<?php
include "cnx.php";
$Matricule=$_GET['Matricule'];
$Message=$_GET['Message'];
$Matieres=$_GET['Matieres'];
$sql= "delete  from reclamation where Matricule='$Matricule' and Message='$Message' and Matieres='$Matieres'";
$resultat = mysqli_query($con,$sql);

	if($resultat)
	{
		header("Location: GLR.php");
	}
	else
	{
		echo "<h1>Erreur de suppression</h1>";
	}
?>
