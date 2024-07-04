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
    
    $sql = "SELECT * FROM reclamation WHERE Matricule LIKE '%$chercher%' NomComplet LIKE '%$chercher%'";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des réclamations</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Matricule</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Réclamation</th>";
    echo "<th>Valider</th>";

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Matricule']."</td>";
            echo "<td>".$row['NomComplet']."</td>";
            echo "<td>".$row['Message']."</td>";
            ?>
                <td align="center">
                <a href="supprimerR.php?Matricule=<?php print($row['Matricule']); ?>&Message=<?php print($row['Message']); ?>&Matieres=<?php print($row['Matieres']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white">Rejeter</font></a>
                </td>
                <td align="center">
                <a href="note.php?Matricule=<?php print($row['Matricule']); ?>&Matieres=<?php print($row['Matieres']); ?>">
				<font color ="white">Valider <?php echo "<img class='icone' src='vraie.png'>"; ?></font></a>
                </td>
        <?php
        echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'><p class='aucun_enrg'>Aucun réclamation pour le moment</p></td></tr>";
    }
}else{
    $sql = "SELECT * FROM reclamation";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des réclamations</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Matricule</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Réclamation</th>";
    echo "<th>Matières</th>";
    echo "<th>Rejeter</th>";
    echo "<th>Valider</th>";

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Matricule']."</td>";
            echo "<td>".$row['NomComplet']."</td>";
            echo "<td>".$row['Message']."</td>";
            echo "<td>".$row['Matieres']."</td>";
            ?>
                <td align="center">
                <a href="supprimerR.php?Matricule=<?php print($row['Matricule']); ?>&Message=<?php print($row['Message']); ?>&Matieres=<?php print($row['Matieres']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white">Rejeter</font></a>
                </td>
                <td align="center">
                <a href="note.php?Matricule=<?php print($row['Matricule']); ?>&Matieres=<?php print($row['Matieres']); ?>">
				<font color ="white">Valider <?php echo "<img class='icone' src='vraie.png'>"; ?></font></a>
                </td>
        <?php
        echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'><p class='aucun_enrg'>Aucun réclamation pour le moment</p></td></tr>";
    }
}
?>