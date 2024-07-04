    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <link rel="icon" href="vraie.png">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    
    header {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    
    nav ul li {
        display: inline;
        margin-right: 20px;
    }
    
    nav ul li a {
        color: #fff;
        text-decoration: none;
    }
    
    main {
        padding: 20px;
    }
    
    footer {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        text-align: center;
    }
    
    .ui-btn {
    cursor: pointer;
    border-radius: 5px;
    color:red;
    border-style: solid;
    background-color: transparent;
    border-color: rgb(219, 218, 218);
    width: 25%;
    height: 40px;
    text-transform: uppercase;
    border-width: 2px;
    font-size: 18px;
    letter-spacing: 2px;
    }
    .ui-btn:hover {
    color: rgb(247, 247, 247);
    background-color: rgb(0, 81, 255);
    border-color: rgb(0, 81, 255);
    text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
    box-shadow: 0 0 50px rgb(0, 81, 255), 0 0 30px rgb(0, 81, 255),
        0 0 60px rgb(0, 81, 255), 0 0 120px rgb(0, 81, 255);
    font-size: 20px;
    width: 30%;
    height: 50px;
    letter-spacing: 3px;
    }
    
    
    </style>
</head>
<body>
    <header>
        <h1>Scolarité</h1>
        <nav>
            <ul>
            <a class="ui-btn" href="deconnecter.php" class="deconnecter">Se déconnecter</a>
            </ul>
        </nav>
    </header>

    <main>
        <section>
        <form method="post">
            <input class="ui-btn" type="submit" value="Étudiants Inscrits" name="Autres(etud)">
            <input class="ui-btn" type="submit" value="Professeurs Enseignants" name="Autres(profs)">
        </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Scolarité. Tous droits réservés.</p>
    </footer>
</body>
</html>
<?php
if(isset($_POST['Autres(etud)'])){
    header("location:Autres(etud).php");
}else if(isset($_POST['Autres(profs)'])){
    header("location:Autres(profs).php");
}
?>
