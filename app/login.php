<?php
    session_start(); // Démarrer la session
    include 'header.php';
?>

<h1 class="text-logo text-center">
    <span><i class="fas fa-utensils"></i></span> Assogba's <span><i class="fas fa-utensils"></i></span>
</h1>
<div class="container admin">
    <div class="row">
        <div class="col-sm-12">
            <h1>Login</h1>
            <br>
            <!-- Afficher le message d'erreur -->
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']); // Supprimer le message après l'affichage
            }
            ?>
            <form action="loginTraitement.php" method="post">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" id="id" class="form-control" name="id" placeholder="Enter your ID" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
                <br>
                <div class="row">
                    <div class="form-actions">
                        <a href="index.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
