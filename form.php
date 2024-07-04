<?php
session_start();
?>
<html>
<head>
<link rel="icon" href="favicon.ico">
<meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            border-radius: 8px;
            background-color: #fff;
            padding: 40px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            color: #666;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 20px;
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Merci de vous connecter.</h1>
    <form method="post">
        <label for="NomComplet">NomComplet</label>
        <input type="text" id="NomComplet" name="NomComplet" placeholder="Votre nom.." required>
        <label for="Mot_de_passe">Mot de passe</label>
        <input type="password" id="Mot_de_passe" name="Mot_de_passe" placeholder="Votre mot de passe" required>
        <input type="submit" name="Envoyer" value="Envoyer">
    </form>
</div>
</body>
</html>

<?php
include 'cnx.php';
if(isset($_POST['Envoyer'])){
    $n=$_POST['NomComplet'];
    $p=$_POST['Mot_de_passe'];
    $sql="select * from administrateur where nomcomplet='$n'  and password='$p'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>0){
        $_SESSION["nom"]=$n;
        header("location:Administrateur.php");
    }else{
        echo "<script>alert('Nom ou Mot de passe invalide');</script>";
    }
}
?>
