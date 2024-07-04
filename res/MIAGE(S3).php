<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats Académiques</title>
    <link rel="icon" href="../these.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.8em;
            color: #666;
        }
        .b{
            color:black;
        }
        .Btn {
width: 140px;
height: 40px;
border: none;
border-radius: 10px;
background: linear-gradient(to right,#77530a,#ffd277,#77530a,#77530a,#ffd277,#77530a);
background-size: 250%;
background-position: left;
color: #ffd277;
position: relative;
display: flex;
align-items: center;
justify-content: center;
cursor: pointer;
transition-duration: 1s;
overflow: hidden;
}
.Btn::before {
position: absolute;
display: flex;
align-items: center;
justify-content: center;
width: 97%;
height: 90%;
border-radius: 8px;
transition-duration: 1s;
background-color: rgba(0, 0, 0, 0.842);
background-size: 200%;
}

.Btn:hover {
background-position: right;
transition-duration: 1s;
}

.Btn:hover::before {
background-position: right;
transition-duration: 1s;
}

.Btn:active {
transform: scale(0.95);
}
.red{
    color:red;
}
    </style>
</head>
<body>

<?php
$Total_des_crédits_validés=0;
function credit_gagner_par_module($d) {
    $keys = array_keys($d);
    $note_principale = $keys[0];
    $credit_note_principale = $d[$note_principale];
    $somme_points_gagner_par_module = 0;
    $effet_module = 0;
    foreach ($d as $i => $j) {
        if($i > 10){
            if($credit_note_principale==3){
                if ($j == 6) {
                    $somme_points_gagner_par_module += ($i-10) * 2;
                } else {
                    $somme_points_gagner_par_module += ($i-10);
                }
            }elseif($credit_note_principale==6){
                if ($j == 6) {
                    $somme_points_gagner_par_module += ($i-10);
                } else {
                    $somme_points_gagner_par_module += ($i-10) * 1/2;
                }
            }
        }
    }
    $effet_module = $note_principale + $somme_points_gagner_par_module;
    if ($effet_module >= 10) {
        return "<font color='green'>V</font>";
    } else {
        return "<font color='red'>R</font>";
    }
}

function reussite($notes) {
    $keys = array_keys($notes);
    $note_principale = $keys[0];
    $credit_note_principale = $notes[$note_principale];
    
    if ($note_principale >= 10) {
        return "<font color='green'>V</font>";
    } elseif ($note_principale >= 7) {
        $d = [];
        $d[$note_principale] = $credit_note_principale;
        foreach ($notes as $i => $j) {
            if ($i > 10) {
                $d[$i] = $j;
            }
        }
        return credit_gagner_par_module($d);
    } else {
        return "<font color='red'>R</font>";
    }
}
    ?>
    <div class="container">
        <h1>Résultats Académiques</h1>
        <table>
            <tr>
                <th>Matière</th>
                <th>Note TP</th>
                <th>Note CC</th>
                <th>Note Ecrit</th>
                <th>Note Rattrapage</th>
                <th>Note Finale</th>
                <th>Crédits</th>
                <th>Décision</th>
            </tr>
            <!-- Exemple de ligne de résultat pour une matière -->
            <!--Nom du module-->
            <tr>
                <th colspan="8">C15L231</th>
            </tr>
            <tr>
                <td>Architecture des Ordinateurs</td>
                <?php
                include "cnx.php";
                $mat=$_GET['mat'];
                $sql1=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Architecture des Ordinateurs'";
                $sql2=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Systeme dexploitation'";
                $sql3=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Projets Unix'";
                $r1=mysqli_query($con,$sql1);
                $r2=mysqli_query($con,$sql2);
                $r3=mysqli_query($con,$sql3);
                $row1= mysqli_fetch_array($r1);
                $row2= mysqli_fetch_array($r2);
                $row3= mysqli_fetch_array($r3);
                $credit_1=$row1["credit"];
                $credit_2=$row2["credit"];
                $credit_3=$row3["credit"];
                $Note_TP_1=$row1["Note_TP"];
                $Note_TP_2=$row2["Note_TP"];
                $Note_TP_3=$row3["Note_TP"];
                $Note_CC_1=$row1["Note_CC"];
                $Note_CC_2=$row2["Note_CC"];
                $Note_CC_3=$row3["Note_CC"];
                $Note_CF_1=$row1["Note_CF"];
                $Note_CF_2=$row2["Note_CF"];
                $Note_CF_3=$row3["Note_CF"];
                if($Note_TP_1==""){
                    $Note_Finale_1= ($Note_CC_1*2+$Note_CF_1*3)/5;
                }else{
                    $Note_Finale_1= ($Note_TP_1+$Note_CC_1*2+$Note_CF_1*3)/6;
                }
                if($Note_TP_2==""){
                    $Note_Finale_2= ($Note_CC_2*2+$Note_CF_2*3)/5;
                    }else{
                        $Note_Finale_2= ($Note_TP_2+$Note_CC_2*2+$Note_CF_2*3)/6;
                    }
                if($Note_TP_3==""){
                    $Note_Finale_3= ($Note_CC_3*2+$Note_CF_3*3)/5;
                }else{
                    $Note_Finale_3= ($Note_TP_3+$Note_CC_3*2+$Note_CF_3*3)/6;
                }
                ?>
                <td><?php echo $Note_TP_1;?></td>
                <td><?php echo $Note_CC_1;?></td>
                <td><?php echo $Note_CF_1;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_1,2);?></td>
                <td><?php echo $credit_1;?></td>
                <td>
                    <?php echo reussite([round($Note_Finale_1) => 3, round($Note_Finale_2) => 3, round($Note_Finale_3) => 3]);
                    if(reussite([round($Note_Finale_1) => 3, round($Note_Finale_2) => 3, round($Note_Finale_3) => 3])=="<font color='green'>V</font>"){
                        $Total_des_crédits_validés+=$credit_1;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Système d’exploitation</td>
                <td><?php echo $Note_TP_2;?></td>
                <td><?php echo $Note_CC_2;?></td>
                <td><?php echo $Note_CF_2;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_2,2);?></td>
                <td><?php echo $row2["credit"];?></td>
                <td>
                <?php echo reussite([round($Note_Finale_2) => 3, round($Note_Finale_1) => 3, round($Note_Finale_3) => 3]);
                if(reussite([round($Note_Finale_2) => 3, round($Note_Finale_1) => 3, round($Note_Finale_3) => 3])=="<font color='green'>V</font>"){
                    $Total_des_crédits_validés+=$credit_2;
                }
                ?>
                </td>
                </tr>
            <tr>
                <td>Projets Unix</td>
                <td><?php echo $Note_TP_3;?></td>
                <td><?php echo $Note_CC_3;?></td>
                <td><?php echo $Note_CF_3;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_3,2);?></td>
                <td><?php echo $row3["credit"];?></td>
                <td>
                <?php echo reussite([round($Note_Finale_3) => 3, round($Note_Finale_1) => 3, round($Note_Finale_2) => 3]);
                if(reussite([round($Note_Finale_3) => 3, round($Note_Finale_1) => 3, round($Note_Finale_2) => 3])=="<font color='green'>V</font>"){
                    $Total_des_crédits_validés+=$credit_3;
                }
                ?>
                </td>
            </tr>
            <!--Resultat du module-->
            <tr>
                <th colspan="6"></th>
                <th>Moyenne Module <?php
                $decision_C15L231=($Note_Finale_1+$Note_Finale_2+$Note_Finale_3)/3;
                echo round($decision_C15L231,2); ?></th>
                <th><?php
                if($decision_C15L231>=10 && reussite([round($Note_Finale_1) => 3, round($Note_Finale_2) => 3, round($Note_Finale_3) => 3])=="<font color='green'>V</font>" && reussite([round($Note_Finale_2) => 3, round($Note_Finale_1) => 3, round($Note_Finale_3) => 3])=="<font color='green'>V</font>" && reussite([round($Note_Finale_3) => 3, round($Note_Finale_1) => 3, round($Note_Finale_2) => 3])=="<font color='green'>V</font>"){
                    echo "<font color='green'>V</font>";
                }else{
                    echo "<font color='red'>R</font>";
                }
                ?></th>
            </tr>
            <!-- ... -->
            <!--Nom du module-->
            <tr>
                <th colspan="8">C15L232</th>
            </tr>
            <tr>
                <td>Programmation JavaSE</td>
                <?php
                    $sql4=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Programmation JavaSE'";
                    $sql5=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Programmation Internet'";
                    $sql6=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Programmation Python'";
                    $r4=mysqli_query($con,$sql4);
                    $r5=mysqli_query($con,$sql5);
                    $r6=mysqli_query($con,$sql6);
                    $row4= mysqli_fetch_array($r4);
                    $row5= mysqli_fetch_array($r5);
                    $row6= mysqli_fetch_array($r6);
                    $credit_4=$row4["credit"];
                    $credit_5=$row5["credit"];
                    $credit_6=$row6["credit"];
                    $Note_TP_4=$row4["Note_TP"];
                    $Note_TP_5=$row5["Note_TP"];
                    $Note_TP_6=$row6["Note_TP"];
                    $Note_CC_4=$row4["Note_CC"];
                    $Note_CC_5=$row5["Note_CC"];
                    $Note_CC_6=$row6["Note_CC"];
                    $Note_CF_4=$row4["Note_CF"];
                    $Note_CF_5=$row5["Note_CF"];
                    $Note_CF_6=$row6["Note_CF"];
                    if($Note_TP_4==""){
                        $Note_Finale_4= ($Note_CC_4*2+$Note_CF_4*3)/5;
                    }else{
                        $Note_Finale_4= ($Note_TP_4+$Note_CC_4*2+$Note_CF_4*3)/6;
                    }
                    if($Note_TP_5==""){
                        $Note_Finale_5= ($Note_CC_5*2+$Note_CF_5*3)/5;
                        }else{
                            $Note_Finale_5= ($Note_TP_5+$Note_CC_5*2+$Note_CF_5*3)/6;
                        }
                    if($Note_TP_6==""){
                        $Note_Finale_6= ($Note_CC_6*2+$Note_CF_6*3)/5;
                    }else{
                        $Note_Finale_6= ($Note_TP_6+$Note_CC_6*2+$Note_CF_6*3)/6;
                    }
                ?>
                <td><?php echo $Note_TP_4;?></td>
                <td><?php echo $Note_CC_4;?></td>
                <td><?php echo $Note_CF_4;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_4,2);?></td>
                <td><?php echo $credit_4;?></td>
                <td>
                    <?php echo reussite([round($Note_Finale_4) => 3, round($Note_Finale_5) => 3, round($Note_Finale_6) => 3]);
                    if(reussite([round($Note_Finale_4) => 3, round($Note_Finale_5) => 3, round($Note_Finale_6) => 3])=="<font color='green'>V</font>"){
                        $Total_des_crédits_validés+=$credit_4;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Programmation Internet</td>
                <td><?php echo $Note_TP_5;?></td>
                <td><?php echo $Note_CC_5;?></td>
                <td><?php echo $Note_CF_5;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_5,2);?></td>
                <td><?php echo $row5["credit"];?></td>
                <td>
                <?php echo reussite([round($Note_Finale_5) => 3, round($Note_Finale_4) => 3, round($Note_Finale_6) => 3]);
                if(reussite([round($Note_Finale_5) => 3, round($Note_Finale_4) => 3, round($Note_Finale_6) => 3])=="<font color='green'>V</font>"){
                    $Total_des_crédits_validés+=$credit_5;
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Programmation Python</td>
                <td><?php echo $Note_TP_6;?></td>
                <td><?php echo $Note_CC_6;?></td>
                <td><?php echo $Note_CF_6;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_6,2);?></td>
                <td><?php echo $row6["credit"];?></td>
                <td>
                <?php echo reussite([$Note_Finale_6 => 3, $Note_Finale_4 => 3, $Note_Finale_5 => 3]);
                if(reussite([$Note_Finale_6 => 3, $Note_Finale_4 => 3, $Note_Finale_5 => 3])=="<font color='green'>V</font>"){
                    $Total_des_crédits_validés+=$credit_6;
                }
                ?>
                </td>
            </tr>
            <!--Resultat du module-->
            <tr>
                <th colspan="6"></th>
                <th>Moyenne Module <?php
                $decision_C15L232=($Note_Finale_4+$Note_Finale_5+$Note_Finale_6)/3;
                echo round($decision_C15L232,2); ?></th>
                <th><?php
                if($decision_C15L232>=10  && reussite([round($Note_Finale_4) => 3, round($Note_Finale_5) => 3, round($Note_Finale_6) => 3])=="<font color='green'>V</font>" && reussite([round($Note_Finale_5) => 3, round($Note_Finale_4) => 3, round($Note_Finale_6) => 3])=="<font color='green'>V</font>" && reussite([round($Note_Finale_6) => 3, round($Note_Finale_5) => 3, round($Note_Finale_4) => 3])=="<font color='green'>V</font>"){
                    echo "<font color='green'>V</font>";
                }else{
                    echo "<font color='red'>R</font>";
                }
                ?></th>
            </tr>
            <!-- ... -->
            <!--Nom du module-->
            <tr>
                <th colspan="8">C15L233</th>
            </tr>
            <tr>
                <td>Base de données et Systèmes d’information</td>
                <?php
                    $sql7=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Base de donnees et Systemes dinformation'";
                    $sql8=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Automates et Langages'";
                    $r7=mysqli_query($con,$sql7);
                    $r8=mysqli_query($con,$sql8);
                    $row7= mysqli_fetch_array($r7);
                    $row8= mysqli_fetch_array($r8);
                    $credit_7=$row7["credit"];
                    $credit_8=$row8["credit"];
                    $Note_TP_7=$row7["Note_TP"];
                    $Note_TP_8=$row8["Note_TP"];
                    $Note_CC_7=$row7["Note_CC"];
                    $Note_CC_8=$row8["Note_CC"];
                    $Note_CF_7=$row7["Note_CF"];
                    $Note_CF_8=$row8["Note_CF"];
                    if($Note_TP_7==""){
                        $Note_Finale_7= ($Note_CC_7*2+$Note_CF_7*3)/5;
                    }else{
                        $Note_Finale_7= ($Note_TP_7+$Note_CC_7*2+$Note_CF_7*3)/6;
                    }
                    if($Note_TP_8==""){
                        $Note_Finale_8= ($Note_CC_8*2+$Note_CF_8*3)/5;
                        }else{
                            $Note_Finale_8= ($Note_TP_8+$Note_CC_8*2+$Note_CF_8*3)/6;
                        }
                ?>
                <td><?php echo $Note_TP_7;?></td>
                <td><?php echo $Note_CC_7;?></td>
                <td><?php echo $Note_CF_7;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_7,2);?></td>
                <td><?php echo $credit_7;?></td>
                <td>
                    <?php echo reussite([round($Note_Finale_7) => 3, round($Note_Finale_8) => 3]);
                    if(reussite([round($Note_Finale_7) => 3, round($Note_Finale_8) => 3])=="<font color='green'>V</font>"){
                        $Total_des_crédits_validés+=$credit_7;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Automates et Langages</td>
                <td><?php echo $Note_TP_8;?></td>
                <td><?php echo $Note_CC_8;?></td>
                <td><?php echo $Note_CF_8;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_8,2);?></td>
                <td><?php echo $credit_8;?></td>
                <td>
                    <?php echo reussite([round($Note_Finale_8) => 3, round($Note_Finale_7) => 3]);
                    if(reussite([round($Note_Finale_8) => 3, round($Note_Finale_7) => 3])=="<font color='green'>V</font>"){
                        $Total_des_crédits_validés+=$credit_8;
                    }
                    ?>
                </td>
            </tr>
            <!--Resultat du module-->
            <tr>
            <th colspan="6"></th>
                <th>Moyenne Module <?php
                $decision_C15L233=($Note_Finale_7+$Note_Finale_8)/2;
                echo round($decision_C15L233,2); ?></th>
                <th><?php
                if($decision_C15L233>=10 && reussite([round($Note_Finale_7) => 3, round($Note_Finale_8) => 3])=="<font color='green'>V</font>" && reussite([round($Note_Finale_8) => 3, round($Note_Finale_7) => 3])=="<font color='green'>V</font>"){
                    echo "<font color='green'>V</font>";
                }else{
                    echo "<font color='red'>R</font>";
                }
                ?></th>
            </tr>
            <!-- ... -->
            <!--Nom du module-->
            <tr>
                <th colspan="8">C15L234</th>
            </tr>
            <td>Anglais III</td>
            <?php
                    $sql9=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='Anglais III'";
                    $sql10=" select Note_TP,Note_CC,Note_CF,credit from matiere ,note where matiere.id=note.id_matiere and matricule='$mat' and nom='francais'";
                    $r9=mysqli_query($con,$sql9);
                    $r10=mysqli_query($con,$sql10);
                    $row9= mysqli_fetch_array($r9);
                    $row10= mysqli_fetch_array($r10);
                    $credit_9=$row9["credit"];
                    $credit_10=$row10["credit"];
                    $Note_TP_9=$row9["Note_TP"];
                    $Note_TP_10=$row10["Note_TP"];
                    $Note_CC_9=$row9["Note_CC"];
                    $Note_CC_10=$row10["Note_CC"];
                    $Note_CF_9=$row9["Note_CF"];
                    $Note_CF_10=$row10["Note_CF"];
                    if($Note_TP_9==""){
                        $Note_Finale_9= ($Note_CC_9*2+$Note_CF_9*3)/5;
                    }else{
                        $Note_Finale_9= ($Note_TP_9+$Note_CC_9*2+$Note_CF_9*3)/6;
                    }
                    if($Note_TP_10==""){
                        $Note_Finale_10= ($Note_CC_10*2+$Note_CF_10*3)/5;
                        }else{
                            $Note_Finale_10= ($Note_TP_10+$Note_CC_10*2+$Note_CF_10*3)/6;
                        }
                ?>
                <td><?php echo $Note_TP_9;?></td>
                <td><?php echo $Note_CC_9;?></td>
                <td><?php echo $Note_CF_9;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_9,2);?></td>
                <td><?php echo $credit_9;?></td>
                <td>
                    <?php echo reussite([round($Note_Finale_9) => 3, round($Note_Finale_10) => 3]);
                    if(reussite([round($Note_Finale_9) => 3, round($Note_Finale_10) => 3])=="<font color='green'>V</font>"){
                        $Total_des_crédits_validés+=$credit_9;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Français I</td>
                <td><?php echo $Note_TP_10;?></td>
                <td><?php echo $Note_CC_10;?></td>
                <td><?php echo $Note_CF_10;?></td>
                <td>-</td>
                <td><?php echo round($Note_Finale_10,2);?></td>
                <td><?php echo $credit_10;?></td>
                <td>
                    <?php echo reussite([round($Note_Finale_10) => 3, round($Note_Finale_9) => 3]);
                    if(reussite([round($Note_Finale_10) => 3, round($Note_Finale_9) => 3])=="<font color='green'>V</font>"){
                        $Total_des_crédits_validés+=$credit_10;
                    }
                    ?>
                </td>
            </tr>
            <!--Resultat du module-->
            <tr>
                <th colspan="6"></th>
                <th>Moyenne Module <?php
                $decision_C15L234=($Note_Finale_10+$Note_Finale_9)/2;
                echo round($decision_C15L234,2); ?></th>
                <th><?php
                if($decision_C15L234>=10&& reussite([round($Note_Finale_9) => 3, round($Note_Finale_10) => 3])=="<font color='green'>V</font>" && reussite([round($Note_Finale_10) => 3, round($Note_Finale_9) => 3])=="<font color='green'>V</font>"){
                    echo "<font color='green'>V</font>";
                }else{
                    echo "<font color='red'>R</font>";
                }
                ?></th>
            </tr>
        </table>
        <div class="footer">
            <?php
            $s = "select NomComplet from etud where Matricule='$mat'";
            $result = mysqli_query($con, $s);
            // Vérifie si la requête s'est exécutée avec succès
            if ($result) {
                // Récupère la première ligne de résultat
                $row = mysqli_fetch_assoc($result);
                // Récupère la valeur de la colonne "NomComplet"
                $nom = $row['NomComplet'];
                // Affiche le nom
                echo $nom;
            } else {
                // Affiche un message d'erreur si la requête a échoué
                echo "Erreur dans la requête : " . mysqli_error($con);
            }
            ?>
            <p><?php  echo $nom; ?> - Numéro d'étudiant: <b class="b"><?php echo $mat; ?></b></p>
            <p>Moyenne du Semestre: <b class="b"><?php echo round(($decision_C15L231+$decision_C15L232+$decision_C15L233+$decision_C15L234)/4,2); ?></b>
            - Total des crédits validés: <b class="b"><?php echo $Total_des_crédits_validés; ?>/30</b></p>
            <p>Décision du Jury: <b><font color="green"><?php
                if($Total_des_crédits_validés==30){
                    echo "<font color='green'>V</font>";
                }else{
                    echo "<font color='red'>NV</font>";
                }
            ?>
            </font></b></p>
            <br>
            <center><button class="Btn" onclick="window.print()"><font size='5px'>Imprimer</font></button></center>
            <br>
            <div class="red">
            V : Validé<br>
            NV : Non Validé<br>
            R : Rattrapage<br>
            NB : Ce reléve ne fait pas objet d'un document officiel
            </div>
        </div>
    </div>
</body>
</html>