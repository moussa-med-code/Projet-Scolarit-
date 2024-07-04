<?php
include "cnx.php";
$Matricule=$_GET['Matricule'];
$sql= "delete  from etud where matricule='$Matricule' ";
$resultat = mysqli_query($con,$sql);

	if($resultat)
	{
		header("Location: EI.php");
	}
	else
	{
		echo "<h1>Erreur de suppression</h1>";
	}
	?>