<?php
    include 'header.php'; 
    include '../connection/connection.php';
    include 'updateTraitement.php';
?>

<h1 class="text-logo text-center">
        <span><i class="fas fa-utensils"></i></span> Assogba's <span><i class="fas fa-utensils"></i></span>
    </h1>
<div class="container admin">
    <div class="row">
        <div class="col-sm-6">
            <h1>Modify an item</h1>
            <br>
            <form action="<?php echo 'updateTraitement.php?id=' . $id ?> " method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="name">Name:  </label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter the name" value="<?php echo $name ?>" required>
                </div>
                <div class="form-group">    
                    <label for="description">Description: </label>
                    <input type="text" id="description" class="form-control" name="description" placeholder="Enter the description" value="<?php echo $description ?>" >
                </div>
                <div class="form-group">
                    <label for="price">Price:  </label>
                    <input type="number" id="price" step="0.5" class="form-control" name="price" value="<?php echo $price ?>" placeholder="What the price ?" >
                </div>
                <div class="form-group">
                    <label for="categorie"> Category:</label>
                    <select name="categorie" id="categorie" value="<?php echo $categorie ?>">  
                        <?php
                            $query = 'SELECT * FROM categories';
                            $select = $pdo->query($query);
                            foreach($select as $option)
                            {
                                if($option['id'] == $category)
                                {
                                    echo '<option selected="selected" value="' . $option['id'] . '">' . $option['name'] . '</option>';
                                }else
                                {
                                    echo '<option value="' . $option['id'] . '">' . $option['name'] . '</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Image: </label>
                    <p>
                    <?php if(isset($image)): ?>
                        <img src="<?php echo '../assets/images/' . $image; ?>" class="card-img-top" ?>"> 
                    <?php endif; ?>
                    </p>
                    <label for="image">Image: </label>
                    <input type="file" name="image" id="image " value="<?php echo $image ?>"  >
                </div>
                <br>
            
            <div class="row">
            <div class="form-actions">
                <a href="index2.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                <button type="submit" class="btn btn-success">Modify</button>
            </div>
            </div>
        </form>

          
        </div>
        <div class="col-sm-6 view">
        <div class="card card-view" style="width: 18rem;">
        <?php if(isset($image)): ?>
            <img src="<?php echo '../assets/images/' . $image; ?>" class="card-img-top" alt="...">
        <?php endif; ?>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo isset($name) ? $name : ''; ?></h5>
                          <div class="price"><?php echo isset($price) ? $price : ''; ?> F</div>
                          <p class="card-text"><?php echo isset($description) ? $description : ''; ?></p> 
                        </div>
        </div>
        </div>
    </div>
</div>
