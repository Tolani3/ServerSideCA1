<aside>
    <h2>Categories</h2>
    <nav>
        <ul>
            <?php foreach ($categories as $categorie) : ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>