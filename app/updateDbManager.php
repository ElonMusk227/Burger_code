<?php
    include '../connection/connection.php';
    function UpdateIfImgUpdated ($name, $description, $price, $category, $image, $id)
    {
        global $pdo;
        $query = 'UPDATE items SET name = :name, description = :description, category = :category, price = :price, image = :image WHERE id = :id';
        $insert = $pdo->prepare($query);
        $insert->execute([
            'name' => $name,
            'description' => $description,
            'category' => $category,
            'price' => $price,
            'image' =>$image,
            'id' => $id
        ]);

    }
    function UpdateIfNotImgUpdated($name, $description, $price, $category, $id)
    {
        global $pdo;
        $query = 'UPDATE items SET name = :name, description = :description, category = :category, price = :price WHERE id = :id';
        $insert = $pdo->prepare($query);
        $insert->execute([
            'name' => $name,
            'description' => $description,
            'category' => $category,
            'price' => $price,  
            'id' => $id
        ]);
    }
    function Select ($id)
    {
        global $pdo;
        $query = 'SELECT * FROM items WHERE id = :id';
        $select = $pdo->prepare($query);
        $select->execute([
            'id' => $id
        ]);
        $data = $select->fetch();
        return $data;
    }

?>