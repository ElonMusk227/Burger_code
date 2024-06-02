<!DOCTYPE html>
<html>
<?php
    include 'header.php';
    include '../connection/connection.php';
?>
<body>
    <div class="container site">
    <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-logo">
                <span><i class="fas fa-utensils"></i></span> Assogba's <span><i class="fas fa-utensils"></i></span>
            </h1>
            <a href="login.php" class="btn btn-secondary">
                <i class="fas fa-user-cog"></i> Admin
            </a>
        </div>
        <?php
        // Fetch categories
        $select = $pdo->query('SELECT * FROM categories');
        $categories = $select->fetchAll();

        // Fetch items with their categories
        $query = $pdo->query('SELECT items.*, categories.name as catname FROM items LEFT JOIN categories ON items.category = categories.id');
        $allElements = $query->fetchAll();

        // Generate the nav-pills
        echo '<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';
        $first = true;
        foreach ($categories as $category) {
            $activeClass = $first ? 'active' : '';
            $ariaSelected = $first ? 'true' : 'false';
            echo '<li class="nav-item" role="presentation">
                    <button class="nav-link ' . $activeClass . '" id="pills-' . $category['name'] . '-tab" data-bs-toggle="pill" data-bs-target="#pills-' . $category['name'] . '" type="button" role="tab" aria-controls="pills-' . $category['name'] . '" aria-selected="' . $ariaSelected . '">' . $category['name'] . '</button>
                  </li>';
            $first = false;
        }
        echo '</ul>';

        // Generate the tab-content
        echo '<div class="tab-content" id="pills-tabContent">';
        $first = true;
        foreach ($categories as $category) {
            $activeClass = $first ? 'show active' : '';
            echo '<div class="tab-pane fade ' . $activeClass . '" id="pills-' . $category['name'] . '" role="tabpanel" aria-labelledby="pills-' . $category['name'] . '-tab">';
            echo '<div class="row">';

            // Filter items for the current category
            foreach ($allElements as $element) {
                if ($element['catname'] == $category['name']) {
                    echo '<div class="col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card mb-4" style="width: 18rem;">
                                <img src="../assets/images/' . $element['image'] . '" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">' . $element['name'] . '</h5>
                                    <div class="price mb-2">' . $element['price'] . 'F</div>
                                    <p class="card-text flex-grow-1">' . $element['description'] . '</p>
                                    <a href="#" class="btn btn-primary mt-auto"><span><i class="bi bi-cart3"></i></span> Commander</a>
                                </div>
                            </div>
                          </div>';
                }
            }
            echo '</div>';
            echo '</div>';
            $first = false;
        }
        echo '</div>';
        ?>
    </div>
</body>
</html>
