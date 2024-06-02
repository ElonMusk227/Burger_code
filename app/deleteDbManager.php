  <?php
    include '../connection/connection.php';
    function Delete($id)
    {
        global $pdo;
        $query = 'DELETE FROM items WHERE id = :id';
        $delete = $pdo->prepare($query);
        $delete->execute([
            'id' => $id
        ]);
    }
  ?>