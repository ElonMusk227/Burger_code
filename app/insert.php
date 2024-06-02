<?php include 'header.php' ?>
<?php include '../connection/connection.php'?>
<h1 class="text-logo text-center">
        <span><i class="fas fa-utensils"></i></span> Assogba's <span><i class="fas fa-utensils"></i></span>
    </h1>
<div class="container admin">
    <div class="row insert">
            <h1>Add an item</h1>
            <br>
            <form action="insertTraitement.php" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="name">Nom: </label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter the name" required>
                </div>
                <div class="form-group">    
                    <label for="description">Description: </label>
                    <input type="text" id="description" class="form-control" name="description" placeholder="Enter the description" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:  </label>
                    <input type="number" id="price" step="0.5" class="form-control" name="price" placeholder="What the price ?" required>
                </div>
                <div class="form-group">
                    <label for="categorie"> Catégorie:</label>
                    <select name="categorie" id="categorie">
                        <?php
                            $query = 'SELECT * FROM categories';
                            $select = $pdo->query($query);
                            foreach($select as $option)
                            {
                                echo '<option value="' . $option['id'] . '">' . $option['name'] . '</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <br>    
                </div>
                <div class="form-group">
                    <label for="image">Image: </label>
                    <input type="file" name="image" id="image " required >
                </div>
                <br>
            
            <div class="form-actions">
                <a href="index2.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Retour</a>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>
