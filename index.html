<?php
$db = new SQLite3(__DIR__ . '/db/articles.db');

// Hämtar senaste artikeln för en given kategori
function latestArticle($db, $category) {
    $stmt = $db->prepare("SELECT * FROM articles WHERE category = :cat ORDER BY created_at DESC LIMIT 1");
    $stmt->bindValue(':cat', $category, SQLITE3_TEXT);
    return $stmt->execute()->fetchArray(SQLITE3_ASSOC);
}

// Hämtar senaste 5 oberoende av kategori
function latestArticles($db) {
    return $db->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 5");
}
?>
<!doctype html>
<html lang="ps" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>د سولې او روحانیت کتابتون – د مولانا وحیدالدین خان لیکنې</title>
<meta name="description" content="د سولې، روحانیت او دین په اړه د مولانا وحیدالدین خان پښتو لیکنې.">
<link rel="icon" type="image/svg+xml" href="assets/logo.svg">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<nav class="nav">
  <a class="brand" href="index.php"><img src="assets/logo.svg" alt="لوګو" width="36" height="36" style="border-radius:10px"><span class="title">د سولې او روحانیت کتابتون</span></a>
  <div class="menu">
    <a href="index.php" class="active">کور</a>
    <a href="weekly.php">د اوونۍ لوستل</a>
    <a href="daily.php">د نن ورځې لوستل</a>
    <a href="articles.php">مقالې</a>
    <a href="admin.php">اداره</a>
  </div>
</nav>

<header class="hero container">
  <img src="https://source.unsplash.com/1200x600/?peace,nature" alt="">
  <div>
    <span class="badge">ځانګړې برخه</span>
    <h1>د مولانا وحیدالدین خان پښتو لیکنې</h1>
    <p>سوله، روحانیت او دین — يو ارام کتابتون.</p>
  </div>
</header>

<main class="container">

  <!-- Veckans läsning -->
  <?php $weekly = latestArticle($db, "Veckans läsning"); ?>
  <?php if ($weekly): ?>
  <section class="card">
    <span class="badge">د اوونۍ لوستل</span>
    <h2><?= htmlspecialchars($weekly['title']) ?></h2>
    <p class="badge"><?= $weekly['created_at'] ?></p>
    <p><?= htmlspecialchars($weekly['summary']) ?></p>
    <a class="btn" href="article.php?id=<?= $weekly['id'] ?>">اکنون ولولئ</a>
  </section>
  <?php endif; ?>

  <!-- Dagens läsning -->
  <?php $daily = latestArticle($db, "Dagens läsning"); ?>
  <?php if ($daily): ?>
  <section class="card">
    <span class="badge">د نن ورځې لوستل</span>
    <h2><?= htmlspecialchars($daily['title']) ?></h2>
    <p class="badge"><?= $daily['created_at'] ?></p>
    <p><?= htmlspecialchars($daily['summary']) ?></p>
    <a class="btn" href="article.php?id=<?= $daily['id'] ?>">اکنون ولولئ</a>
  </section>
  <?php endif; ?>

  <!-- Dagens inspiration -->
  <?php $insp = latestArticle($db, "Dagens inspiration"); ?>
  <?php if ($insp): ?>
  <section class="card">
    <span class="badge">د نن ورځې الهام</span>
    <h2><?= htmlspecialchars($insp['title']) ?></h2>
    <p class="badge"><?= $insp['created_at'] ?></p>
    <p><?= htmlspecialchars($insp['summary']) ?></p>
    <a class="btn" href="article.php?id=<?= $insp['id'] ?>">اکنون ولولئ</a>
  </section>
  <?php endif; ?>

  <hr/>

  <!-- Senaste artiklar -->
  <section>
    <h2 style="margin:0 0 .5rem">وروستۍ مقالې</h2>
    <div class="grid">
      <?php
      $res = latestArticles($db);
      while ($row = $res->fetchArray(SQLITE3_ASSOC)):
      ?>
      <div class="card">
        <?php if ($row['image']): ?>
        <img src="<?= htmlspecialchars($row['image']) ?>" alt="" class="article-cover">
        <?php endif; ?>
        <h3 style="margin-top:.25rem">
          <a href="article.php?id=<?= $row['id'] ?>" style="text-decoration:none;color:inherit">
            <?= htmlspecialchars($row['title']) ?>
          </a>
        </h3>
        <p class="badge"><?= $row['created_at'] ?></p>
        <p><?= htmlspecialchars($row['summary']) ?></p>
        <a class="btn" href="article.php?id=<?= $row['id'] ?>">لوستل</a>
      </div>
      <?php endwhile; ?>
    </div>
  </section>

</main>

<footer>© 2025 – لیکنې په عامه ملکیت کې. انځورونه له Unsplash/Pexels څخه د دوی اجازې لاندې بارېږي.</footer>
</body>
</html>
