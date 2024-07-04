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
    
    $sql = "SELECT * FROM profs WHERE (telephone LIKE '%$chercher%' OR NomComplet LIKE '%$chercher%' OR matieres LIKE '%$chercher%' OR email LIKE '%$chercher%' OR Departements LIKE '%$chercher% ' OR date_embauche LIKE '%$chercher% ') and Departements='Geologie'";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des Professeurs Enseignants</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Telephone</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Matieres</th>";
    echo "<th>Email</th>";
    echo "<th>Date_embauche</th>";
    echo "<th>Departements</th>";
    echo "</tr>";

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['telephone']."</td>";
            echo "<td>".$row['nomcomplet']."</td>";
            echo "<td>".$row['matieres']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['date_embauche']."</td>";
            echo "<td>".$row['Departements']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'><p class='aucun_enrg'>Aucun professeur pour le moment</p></td></tr>";
    }
} else {
    $sql = "SELECT * FROM profs where Departements='Geologie'";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des Professeurs Enseignants</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Telephone</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Matieres</th>";
    echo "<th>Email</th>";
    echo "<th>Date_embauche</th>";
    echo "<th>Departements</th>";
    echo "</tr>";

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['telephone']."</td>";
            echo "<td>".$row['nomcomplet']."</td>";
            echo "<td>".$row['matieres']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['date_embauche']."</td>";
            echo "<td>".$row['Departements']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'><p class='aucun_enrg'>Aucun professeur pour le moment</p></td></tr>";
    }
}
?>
