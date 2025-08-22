<?php
session_start();

// Enkel lösenordsskydd (byt ut till något starkare!)
$PASSWORD = "admin123";
if (!isset($_SESSION['loggedin'])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["password"] === $PASSWORD) {
        $_SESSION['loggedin'] = true;
    } else {
        echo '<form method="post"><input type="password" name="password" placeholder="Lösenord"><button type="submit">Logga in</button></form>';
        exit;
    }
}

// DB
$db = new SQLite3(__DIR__ . '/db/articles.db');

// Hantera uppladdning
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["title"])) {
    $title = $_POST["title"];
    $summary = $_POST["summary"];
    $content = $_POST["content"];
    $category = $_POST["category"];

    // Bild
    $imagePath = null;
    if (!empty($_FILES["image"]["name"])) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);

        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    // Spara i databasen
    $stmt = $db->prepare("INSERT INTO articles (title, summary, content, category, image) VALUES (:t, :s, :c, :cat, :img)");
    $stmt->bindValue(':t', $title, SQLITE3_TEXT);
    $stmt->bindValue(':s', $summary, SQLITE3_TEXT);
    $stmt->bindValue(':c', $content, SQLITE3_TEXT);
    $stmt->bindValue(':cat', $category, SQLITE3_TEXT);
    $stmt->bindValue(':img', $imagePath, SQLITE3_TEXT);
    $stmt->execute();

    echo "<p style='color:green;'>✅ Artikel sparad!</p>";
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <title>Admin - Lägg till artikel</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; max-width: 700px; margin:auto; }
    input, textarea, select { width: 100%; padding: 8px; margin: 8px 0; }
    button { padding: 10px 20px; background: green; color: white; border: none; cursor: pointer; }
    button:hover { background: darkgreen; }
  </style>
</head>
<body>
  <h1>Admin - Lägg till ny artikel</h1>
  <form method="post" enctype="multipart/form-data">
    <label for="title">Titel:</label>
    <input type="text" name="title" required>

    <label for="summary">Sammanfattning:</label>
    <textarea name="summary"></textarea>

    <label for="content">Artikel:</label>
    <textarea name="content" rows="8" required></textarea>

    <label for="category">Kategori:</label>
    <select name="category" required>
      <option value="Dagens läsning">Dagens läsning</option>
      <option value="Veckans läsning">Veckans läsning</option>
      <option value="Dagens inspiration">Dagens inspiration</option>
    </select>

    <label for="image">Bild:</label>
    <input type="file" name="image" accept="image/*">

    <button type="submit">Spara artikel</button>
  </form>
</body>
</html>
