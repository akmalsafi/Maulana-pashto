<?php
// Anslut till databasen
$db = new SQLite3(__DIR__ . '/db/articles.db');

// Hämta alla artiklar, senaste först
$res = $db->query("SELECT id, title, excerpt, image, category, created_at FROM articles ORDER BY created_at DESC");
?>
<!doctype html>
<html lang="ps" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>مقالې – د سولې او روحانیت کتابتون</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav class="nav">
    <a class="brand" href="index.php">
      <img src="assets/logo.svg" alt="لوګو" width="36" height="36" style="border-radius:10px">
      <span class="title">د سولې او روحانیت کتابتون</span>
    </a>
    <div class="menu">
      <a href="index.php">کور</a>
      <a href="articles.php" class="active">مقالې</a>
      <a href="admin.php">اداره</a>
    </div>
  </nav>

  <main class="container">
    <h1>ټولې مقالې</h1>
    <div class="grid">
      <?php while ($row = $res->fetchArray(SQLITE3_ASSOC)): ?>
        <div class="card">
          <img src="<?=
            $row['image'] ? htmlspecialchars($row['image']) 
            : 'https://source.unsplash.com/600x400/?nature,birds,peace'
          ?>" alt="Article image" class="article-cover">
          
          <h3>
            <a href="article.php?id=<?= $row['id'] ?>" style="text-decoration:none;color:inherit">
              <?= htmlspecialchars($row['title']) ?>
            </a>
          </h3>
          <p class="badge"><?= htmlspecialchars($row['category']) ?> · <?= htmlspecialchars($row['created_at']) ?></p>
          <p><?= htmlspecialchars($row['excerpt']) ?></p>
          <a class="btn" href="article.php?id=<?= $row['id'] ?>">لوستل</a>
        </div>
      <?php endwhile; ?>
    </div>
  </main>

  <footer>© 2025 – ټولې لیکنې د عامه ملکیت لاندې دي</footer>
</body>
</html>
