<?php
if(isset($_POST['s'])){
    header("location:authentification.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="index.css">
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
		<input type="text" name="mat" value="C">
		<input type="submit" value="ENTRER أدخل" name="s">
		<label>رقم التسجيل</label>
		<br>
        <font color="red">Etudiant inexistant</font>
	</form>
</body>
</html>