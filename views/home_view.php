<div class="container mt-5">
    <h3>Last 3 Added Categories</h3>
    <ul class="list-group">
        <?php
        $categoryQuery = "SELECT * FROM categories ORDER BY category_id DESC LIMIT 3";
        $categoryStmt = $db->query($categoryQuery);

        while ($categoryRow = $categoryStmt->fetch(PDO::FETCH_ASSOC)) {
            $categoryId = $categoryRow['category_id'];
            $categoryName = $categoryRow['category_name'];
        ?>
            <li class="list-group-item"><?php echo $categoryName; ?></li>
        <?php
        }
        ?>
    </ul>
</div>

    <div class="container mt-5">
        <div class="row">
            <?php
            $query = "SELECT * FROM posts WHERE status <> 'archived'";
            $stmt = $db->query($query);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $postId = $row['post_id'];
                $postTitle = $row['post_title'];
                $postContent = $row['post_content'];
                $postDate = $row['post_date'];
                $categoryName = $row['post_category'];
                $postAuthor = $row['post_author'];
            ?>
                <div class="col-lg-6 blogCard">
                    <div class="blog-post">
                        <img src="https://via.placeholder.com/800x400" alt="Sample Image" class="img-fluid">
                        <div class="info">
                            <h2><?php echo $postTitle; ?></h2>
                            <p><?php echo substr($postContent, 0, 30) . '...'; ?></p>
                            <p class="category">Category: <?php echo $categoryName; ?></p>
                            <p class="date"><?php echo date('F j, Y', strtotime($postDate)); ?></p>
                            <p class="author">Author: <?php echo $postAuthor; ?></p>
                            <a href="index.php?page=post&title=<?= $postTitle;?> 
                                &content=<?=$postContent ?>
                                &date=<?= $postDate?>
                                &category=<?= $categoryName?>
                                &author=<?= $postAuthor?>
                                &id=<?= $postId?>"
                                class="read-more">
                                <i class="fas fa-arrow-right"></i> Read More
                            </a>
                            <?php
                            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
                                echo "
                                <form method='post'>
                                    <input value=$postId name='post_id' hidden>
                                    <button type='submit' name='archive' class='btn btn-warning archive-btn'>Archive</button>
                                <form>
                                ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

