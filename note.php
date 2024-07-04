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

$Matricule=$_GET['Matricule'];
$Matieres=$_GET['Matieres'];
$sqlEtud = "select NomComplet from etud where Matricule='$Matricule'";
$nomEtud_result = mysqli_query($con, $sqlEtud);
$nomEtud_row = mysqli_fetch_assoc($nomEtud_result);
$nomEtud = $nomEtud_row['NomComplet'];
if(isset($_POST['Envoyer'])) {
    $chercher = $_POST['Chercher'];
    $sql = "SELECT nom,Note_TP,Note_CC,Note_CF,Note_Rattrapage,credit FROM matiere ,note WHERE (nom LIKE '%$chercher%' OR Note_TP LIKE '%$chercher%' OR Note_CC LIKE '%$chercher%' OR Note_CF LIKE '%$chercher%' OR Note_Rattrapage LIKE '%$chercher%')and matricule='$Matricule'";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des résultats de l'etudiant $nomEtud</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Nom de la matière</th>";
    echo "<th>Note_TP</th>";
    echo "<th>Note_CC</th>";
    echo "<th>Note_CF</th>";
    echo "<th>Note_Rattrapage</th>";
    echo "<th>credit</th>";
    echo "<th colspan='2'>". "Actions". "</th>"."</tr>" ;

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['Note_TP']."</td>";
            echo "<td>".$row['Note_CC']."</td>";
            echo "<td>".$row['Note_CF']."</td>";
            echo "<td>".$row['Note_Rattrapage']."</td>";
            echo "<td>".$row['credit']."</td>";
            ?>
            <td align="center">
                <a href="modifierNote.php?Matricule=<?php print($Matricule); ?>&Matieres=<?php print($row['nom']); ?>">
				<font color ="white">Modifier <?php echo "<img class='icone' src='update.png'>"; ?></font></a>
                </td>
                <td align="center">
                <a href="supprimerNote.php?Matricule=<?php print($Matricule); ?>&Matieres=<?php print($row['nom']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white">Supprimer <?php echo "<img class='icone' src='trash.png'>"; ?></font></a>
                </td>
        <?php
        echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'><p class='aucun_enrg'>Aucune résultat pour le moment</p></td></tr>";
    }
}else{
    $sql = "select nom,Note_TP,Note_CC,Note_CF,Note_Rattrapage,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$Matricule'";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des résultats de l'etudiant $nomEtud</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Nom de la matière</th>";
    echo "<th>Note_TP</th>";
    echo "<th>Note_CC</th>";
    echo "<th>Note_CF</th>";
    echo "<th>Note_Rattrapage</th>";
    echo "<th>credit</th>";
    echo "<th colspan='2'>". "Actions". "</th>"."</tr>" ;

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['Note_TP']."</td>";
            echo "<td>".$row['Note_CC']."</td>";
            echo "<td>".$row['Note_CF']."</td>";
            echo "<td>".$row['Note_Rattrapage']."</td>";
            echo "<td>".$row['credit']."</td>";
            ?>
            <td align="center">
                <a href="modifierNote.php?Matricule=<?php print($Matricule); ?>&Matieres=<?php print($row['nom']); ?>">
				<font color ="white">Modifier <?php echo "<img class='icone' src='update.png'>"; ?></font></a>
                </td>
                <td align="center">
                <a href="supprimerNote.php?Matricule=<?php print($Matricule); ?>&Matieres=<?php print($row['nom']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white">Supprimer <?php echo "<img class='icone' src='trash.png'>"; ?></font></a>
                </td>
        <?php
        echo "</tr>";
        }
    }else {
        echo "<tr><td colspan='8'><p class='aucun_enrg'>Aucune résultat pour le moment</p></td></tr>";
    }
}
?>