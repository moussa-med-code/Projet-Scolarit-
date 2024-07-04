<?php
include "cnx.php";
$Matricule=$_GET['Matricule'];
$Matieres=$_GET['Matieres'];
// on a obliger de faire ceci car le tableau note contien une colone id_matiere et pas matiere
$id_matiere="select id from matiere where nom = '$Matieres'"; //prendre le id_matiere depuis le table matiere en utilisant le nom de la matiere
$res=mysqli_query($con,$id_matiere);
$row = mysqli_fetch_assoc($res);
$result = $row["id"];
$sql= "delete  from note where matricule='$Matricule' and id_matiere='$result'";
$resultat = mysqli_query($con,$sql);

	if($resultat)
	{
		header("Location:note.php?Matricule=$Matricule&Matieres=$Matieres");
	}
	else
	{
		echo "<h1>Erreur de suppression</h1>";
	}
	?>