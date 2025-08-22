<?php
$db = new SQLite3(__DIR__ . '/db/articles.db');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $db->prepare("SELECT * FROM articles WHERE id = :id");
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
$article = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

if (!$article) {
    die("Artikel ej hittad.");
}
?>
<!doctype html>
<html lang="ps" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($article['title']) ?> – د مولانا وحیدالدین خان پښتو لیکنې</title>
<link rel="icon" type="image/svg+xml" href="assets/logo.svg">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<nav class="nav">
  <a class="brand" href="index.php"><img src="assets/logo.svg" alt="لوګو" width="36" height="36" style="border-radius:10px"><span class="title">د سولې او روحانیت کتابتون</span></a>
  <div class="menu">
    <a href="index.php">کور</a>
    <a href="weekly.php">د اوونۍ لوستل</a>
    <a href="daily.php">د نن ورځې لوستل</a>
    <a href="articles.php">مقالې</a>
    <a href="admin.php">اداره</a>
  </div>
</nav>

<main class="container">
  <article class="card">
    <h1><?= htmlspecialchars($article['title']) ?></h1>
    <p class="badge"><?= $article['created_at'] ?> · <?= htmlspecialchars($article['category']) ?></p>
    
    <?php if ($article['image']): ?>
      <img src="<?= htmlspecialchars($article['image']) ?>" alt="Article image" class="article-cover">
    <?php else: ?>
      <img src="https://source.unsplash.com/1200x600/?nature,peace" alt="Default article image" class="article-cover">
    <?php endif; ?>

    <p class="summary"><?= htmlspecialchars($article['summary']) ?></p>
    <div class="content">
      <?= nl2br(htmlspecialchars($article['content'])) ?>
    </div>
  </article>
</main>

<footer>© 2025 – لیکنې په عامه ملکیت کې. انځورونه له Unsplash/Pexels څخه د دوی اجازې لاندې بارېږي.</footer>
</body>
</html>
