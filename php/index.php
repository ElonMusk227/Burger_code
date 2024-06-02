<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Burger code</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="bootstrap.min.css.map">
        <link rel="stylesheet" href="bootstrap.bundle.min.js.map">
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!--  Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <script src="bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <h1 class="text-logo"> <span><i>cuttery</i></span> Burger Code <span><i>cuttery</i></span></h1>
        <div class="container admin"></div>
        <div class="row">
            <h1><strong>Liste des items</strong></h1> <span> <i>Add</i></span><a href="insert.php" class="btn btn-success btn-lg">Ajouter</a>
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Desciprion</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('dbconnect.php');
                        $statement = "SELECT * FROM products";
                        $sql = $pdo->prepare($statement);
                        $sql->execute();
                        $row = $sql->fetchAll(PDO::FETCH_ASSOC); 
                        print_r($row);
                        ?>                      

                </tbody>
            </table>                    <tr>
            <td>Item1</td>
            <td>Desciprion1</td>
            <td>Prix</td>
            <td>Categorie</td>
            <td>
                <a href="view.php?id=1" class="btn btn-default">Voir</a>
                <a href="update.php?id=1" class="btn btn-primary">Modify</a>
                <a href="delete.php?id=1" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        </div>
    </body>
</html>