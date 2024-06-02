<?php
    include '../connection/connection.php';
    function insert ($name, $description, $price, $category, $image)
    {
        global $pdo;
        $query = 'INSERT INTO items (name, description, price, category, image) values(:name, :description, :price, :category, :image)';
        $insert = $pdo->prepare($query);
        $insert->execute([
            'name' => $name,
            'description' => $description,
            'category' => $category,
            'price' => $price,
            'image' =>$image
        ]);

    }
?>