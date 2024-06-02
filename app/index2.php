<?php include 'header.php'; ?>
<h1 class="text-logo text-center">
    <span><i class="fas fa-utensils"></i></span> Assogba's <span><i class="fas fa-utensils"></i></span>
</h1>
<div class="container admin">
    <div class="row">
        <div class="col-md-12 ">
            <h1 class="mb-4">List of items 
                <a href="insert.php" class="btn btn-success">
                    <i class="bi bi-plus"></i> Add
                </a>
            </h1>
            <table class="table table-striped table-bordered text-center table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Descriptions</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php include '../connection/connection.php'; 
                    $query = 'SELECT * FROM items';
                    $select= $pdo->query($query);
                    $results = $select->fetchAll();
                    foreach($results as $result) {
                        $modalId = 'deleteModal' . $result['id']; // Unique modal ID
                        echo '<tr>';
                        echo '<td>' . $result["name"] . '</td>';
                        echo '<td>' . $result["description"] . '</td>';
                        echo '<td>' . $result["price"] . '</td>';
                        echo '<td>' . $result["category"] . '</td>';
                        echo '<td width="300">';
                        echo '<a href="view.php?id=' . $result['id'] . '" class="btn btn-secondary btn-sm me-1"><i class="bi bi-eye"></i> See</a>';
                        echo '<a href="updateView.php?id=' . $result['id'] . '" class="btn btn-primary btn-sm me-1"><i class="bi bi-pencil"></i> Modify</a>';
                        echo '<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">
                            <i class="bi bi-trash"></i> Delete
                          </button>';
                        echo '<div class="modal fade" id="' . $modalId . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="' . $modalId . 'Label" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="' . $modalId . 'Label">Delete an item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="deleteTraitement.php" method="post">
                                  <input type="hidden" name="id" value="' . $result['id'] . '">
                                  <p class="alert alert-warning">Are you really sure to delete this item?</p>
                              </div>
                              <div class="modal-footer form-actions">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>