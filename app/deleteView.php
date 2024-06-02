<?php include 'header.php' ?>
<?php include '../connection/connection.php';
    
        $id = $_GET['id'];
?>
 <h1 class="text-logo text-center">
        <span><i class="fas fa-utensils"></i></span>  Assogba's <span><i class="fas fa-utensils"></i></span>
    </h1>
<div class="container  admin">
    <div class="row insert">
            <h1>Delete an item</h1>
            <br>
            <form action="deleteTraitement.php" method="post"  >
                <input type="hidden" name="id" value="<?php  echo $id ?>">
                <p class="alert alert-warning" >Are u really sure to delete this item?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-warning">Oui</button>
                <button type="submit" class="btn btn-secondary ">Non</button>
            </div>
        </form>
    </div>
</div>
