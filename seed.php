<?php
// seed.php
include 'config.php';

try {
    // Create tables
    $pdo->exec("INSERT INTO users (username, password, role) VALUES
        ('admin', '" . password_hash('adminpassword', PASSWORD_DEFAULT) . "', 'admin'),
        ('pengelola', '" . password_hash('pengelolapassword', PASSWORD_DEFAULT) . "', 'pengelola')
    ");

    $pdo->exec("INSERT INTO categories (title, seotitle) VALUES
        ('Technology', 'technology'),
        ('Sports', 'sports'),
        ('Entertainment', 'entertainment')
    ");

    $pdo->exec("INSERT INTO tblposts (title, seotitle, user_id, content, status) VALUES
        ('First News Article', 'first-news-article', 1, 'This is the content of the first news article.', 'published'),
        ('Second News Article', 'second-news-article', 1, 'This is the content of the second news article.', 'published'),
        ('Third News Article', 'third-news-article', 1, 'This is the content of the third news article.', 'published'),
        ('Fourth News Article', 'fourth-news-article', 2, 'This is the content of the fourth news article.', 'draft')
    ");

    $pdo->exec("INSERT INTO category_post (post_id, category_id) VALUES
        (1, 1),
        (2, 2),
        (3, 3)
    ");

    echo "Database seeded successfully.";
} catch (PDOException $e) {
    echo 'Database seeding failed: ' . $e->getMessage();
}
?>
