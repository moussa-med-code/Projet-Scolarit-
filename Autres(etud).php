<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="table.css">
<link rel="icon" href="favicon.ico">
</head>
<body>
<div class="btn"><a href="index.html">Accueil <span ><img class="icone" src="maison.png"></span></a></div>
    <form method="post">
    <input type="text" placeholder="Chercher" name="Chercher">
    <input type="submit" value="Chercher" name="Envoyer">
    </from>

<?php
include 'cnx.php';

if(isset($_POST['Envoyer'])) {
    $chercher = $_POST['Chercher'];
    
    $sql = "SELECT * FROM etud WHERE Matricule LIKE '%$chercher%' OR NomComplet LIKE '%$chercher%' OR Filiere LIKE '%$chercher%' OR Departements LIKE '%$chercher%'";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des Étudiants Inscrits</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Matricule</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Filiere</th>";
    echo "<th>Departements</th>";
    echo "</tr>";

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Matricule']."</td>";
            echo "<td>".$row['NomComplet']."</td>";
            echo "<td>".$row['Filiere']."</td>";
            echo "<td>".$row['Departements']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'><p class='aucun_enrg'>Aucun étudiant pour le moment</p></td></tr>";
    }
}else{
    $sql = "SELECT * FROM etud";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des Étudiants Inscrits</h3>";
    echo "<table border width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Matricule</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Filiere</th>";
    echo "<th>Departements</th>";
    echo "</tr>";

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Matricule']."</td>";
            echo "<td>".$row['NomComplet']."</td>";
            echo "<td>".$row['Filiere']."</td>";
            echo "<td>".$row['Departements']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'><p class='aucun_enrg'>Aucun étudiant pour le moment</p></td></tr>";
    }
}
?>