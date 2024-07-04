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
	<link rel="icon" href="../these.png">
	<title>Résultat</title>
	<style>
		.i{
    margin-left: 120px;
}
.form{
    margin: auto;
    height: 200px;
    width: 75%;
    border: 4px solid gray;
    font-size: 20px;
    color: blue;
    border-radius: 20px;
    text-align: center;
    padding-top: 20px;
}
input{
    margin: 20px;
}
input[type="submit"]{
    background-color: rgb(50, 50, 240);
    color: white;
    padding: 5px;
    border-radius: 5px;
}
input[type="submit"]:hover{
    background-color: blueviolet;
}
p{
    margin-right: 800px;
}
.p{
    display: flex;
}
span{
    padding: 20px;
}
		.ui-btn:hover {
    color: rgb(247, 247, 247);
    background-color: rgb(0, 81, 255);
    border-color: rgb(0, 81, 255);
    text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
    box-shadow: 0 0 50px rgb(0, 81, 255), 0 0 30px rgb(0, 81, 255),
        0 0 60px rgb(0, 81, 255), 0 0 120px rgb(0, 81, 255);
	}
	.Semestre{
    background-color:red;
	height:20px;
	width:75%;
	margin:auto;
	border-radius: 40px;
	}
	.Semestre:hover{
		background-color:green;
	}
	.a{
		text-decoration:none;
		text-align:center;
		color:white;
	}
	</style>
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
	<br>
	<div class="Semestre">
		<center>
				<form>
                    <select id="Semestre" class="ui-btn" name="Semestre">
                        <option>Semestre :</option>
                        <option>S1</option>
                        <option >S2</option>
						<option >S3</option>
						<option >S4</option>
						<option >S5</option>
						<option >S6</option>
                    </select>
                </form>
		</center>
	<script>
		function redirect_Semestre() {
        var connecter = document.getElementById("Semestre").value;
        if (connecter === "S1") {
            var url = "#"; // Modifier l'extension selon votre besoin (html/php)
            window.location.href = url;
        }else if (connecter === "S2") {
            var url = "#"; // Modifier l'extension selon votre besoin (html/php)
            window.location.href = url;
        }else if (connecter === "S3") {
            var url = "<?php echo $row['Orientation']; ?>(S3).php?mat=<?php echo $mat;?>"; // Modifier l'extension selon votre besoin (html/php)
            window.location.href = url;
    	}else if (connecter === "S4") {
            var url = "#"; // Modifier l'extension selon votre besoin (html/php)
            window.location.href = url;
    	}else if (connecter === "S5") {
            var url = "#"; // Modifier l'extension selon votre besoin (html/php)
            window.location.href = url;
    	}else if (connecter === "S6") {
            var url = "#"; // Modifier l'extension selon votre besoin (html/php)
            window.location.href = url;
    	}
	}
	document.getElementById("Semestre").onchange = redirect_Semestre;
	</script>
	</div>
	<br>
	<div class="Semestre">
	<center><a class="a" href="Comment calculer une note.html">Comment calculer une note</a></center>
	</div>
</body>
</html>
<?php
	}
}else{
	header("location:EI.php");
}
?>