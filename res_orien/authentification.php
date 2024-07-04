<?php
include "cnx.php";
$mat=$_POST['mat'];
$sql="select Orientation, NomComplet from Etud where Matricule='$mat'";
$r=mysqli_query($con,$sql);

if(mysqli_num_rows($r)==1){
	while ($row = mysqli_fetch_assoc($r)) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="test.css">
	<link rel="icon" href="../these.png">
	<title>Orientation</title>
</head>
<body>
	<div class="i">
		<img src="image.png">
	</div>
	<br>
	<form class="form" method="post" action="authentification.php">
		<label>Numéro Etudiant</label>
		<input type="text" value="<?php echo $mat ;?>" name="mat">
		<input type="submit" value="ENTRER أدخل" name="s">
		<label>رقم التسجيل</label>
		<p>Profil d'orientation : <font color="black"><?php echo $row['Orientation']; ?></font> </p>
		<div class="p">
		<span>Nom/Prénom</span><span><font color="black"><?php echo $row['NomComplet']; ?></font> </span>
		<span class="g">الاسم واللقب</span>
		</form>
	</div>
</body>
</html>
<?php
	}
}else{
	header("location:EI.php");
}
?>