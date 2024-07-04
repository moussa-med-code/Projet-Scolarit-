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
    </form>
<?php
include 'cnx.php';

if(isset($_POST['Envoyer'])) {
    $chercher = $_POST['Chercher'];
    
    $sql = "SELECT * FROM profs WHERE telephone LIKE '%$chercher%' OR nomcomplet LIKE '%$chercher%' OR matieres LIKE '%$chercher%' OR email LIKE '%$chercher%' OR date_embauche LIKE '%$chercher%' OR Departements LIKE '%$chercher%'";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des Professeurs Inscrits</h3>";
    echo "<table border id='tableau' width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Telephone</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Matieres</th>";
    echo "<th>Email</th>";
    echo "<th>Date_embauche</th>";
    echo "<th>Departements</th>";
    echo "<th colspan='2'>". "Actions". "</th>"."</tr>" ;

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['telephone']."</td>";
            echo "<td>".$row['nomcomplet']."</td>";
            echo "<td>".$row['matieres']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['date_embauche']."</td>";
            echo "<td>".$row['Departements']."</td>";
            ?>
            <td align="center">
                <a href="modifierP.php?telephone=<?php print($row['telephone']); ?>" >
				<font color ="white">Modifier <?php  echo "<img class='icone' src='update.png'>"; ?></font></a>
                </td>
                <td align="center">
                <a href="supprimerP.php?telephone=<?php print($row['telephone']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
				<font color ="white">Supprimer <?php echo "<img class='icone' src='trash.png'>"; ?></font></a>
                </td>
        <?php
        echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'><p class='aucun_enrg'>Aucun professeur pour le moment</p></td></tr>";
    }
}else{
    $sql = "SELECT * FROM profs";
    $result = mysqli_query($con, $sql);

    echo "<br>";
    echo "<br>";
    echo "<h3>Liste des Professeurs Inscrits</h3>";
    echo "<table border width='80%'>";
    echo "<tr height='50px'>";
    echo "<th>Telephone</th>";
    echo "<th>NomComplet</th>";
    echo "<th>Matieres</th>";
    echo "<th>Email</th>";
    echo "<th>Date_embauche</th>";
    echo "<th>Departements</th>";
    echo "<th colspan='2'>". "Actions". "</th>"."</tr>" ;

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['telephone']."</td>";
            echo "<td>".$row['nomcomplet']."</td>";
            echo "<td>".$row['matieres']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['date_embauche']."</td>";
            echo "<td>".$row['Departements']."</td>";
            ?>
            <td align="center">
                <a href="modifier.php?telephone=<?php echo $row['telephone']; ?>">
				<font color ="white">Modifier <?php  echo "<img class='icone' src='update.png'>"; ?></font></a>
                </td>
                <td align="center">
                <a href="supprimer.php?telephone=<?php echo $row['telephone']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')">
				<font color ="white">Supprimer <?php echo "<img class='icone' src='trash.png'>"; ?></font></a>
                </td>
        <?php
        echo "</tr>";
        }
    }else {
        echo "<tr><td colspan='8'><p class='aucun_enrg'>Aucun professeur pour le moment</p></td></tr>";
    }
}
?>
</body>
</html>
