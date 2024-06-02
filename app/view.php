<?php 
    include 'header.php'; 
    include '../connection/connection.php';

    function checkinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;         
    }

    if (!empty($_GET['id'])) {
        $id = checkinput($_GET['id']);
        $query = 'SELECT items.*, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = :id';
        $select = $pdo->prepare($query);
        $select->execute(['id' => $id]);
        $item = $select->fetch();
    }
    ?>

    <h1 class="text-logo text-center my-4">
        <i class="fas fa-utensils"></i> Assogba's <i class="fas fa-utensils"></i>
    </h1>
    <div class="container admin">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4">See an item</h2>
                <form>
                    <div class="form-group mb-3">
                        <label><strong>Name:</strong> <?php echo isset($item['name']) ? $item['name'] : ''; ?></label>
                    </div>
                    <div class="form-group mb-3">
                        <label><strong>Description:</strong> <?php echo isset($item['description']) ? $item['description'] : ''; ?></label>
                    </div>
                    <div class="form-group mb-3">
                        <label><strong>Price:</strong> <?php echo isset($item['price']) ? $item['price'] : ''; ?> FCFA</label>
                    </div>
                    <div class="form-group mb-3">
                        <label><strong>Category:</strong> <?php echo isset($item['category']) ? $item['category'] : ''; ?></label>
                    </div>
                    <div class="form-group mb-3">
                        <label><strong>Image:</strong></label>
                        <?php if(isset($item['image'])): ?>
                            <div class="mt-2">
                                <img src="<?php echo '../assets/images/' . $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="img-fluid">
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
                <div class="form-actions mt-4">
                    <a href="index2.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <?php if(isset($item['image'])): ?>
                        <img src="<?php echo '../assets/images/' . $item['image']; ?>" class="card-img-top" alt="<?php echo $item['name']; ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo isset($item['name']) ? $item['name'] : ''; ?></h5>
                        <div class="price mb-2"><?php echo isset($item['price']) ? $item['price'] : ''; ?> FCFA</div>
                        <p class="card-text"><?php echo isset($item['description']) ? $item['description'] : ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>