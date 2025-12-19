<?php
$dataFile = "data.json";
$threads = file_exists($dataFile)
    ? json_decode(file_get_contents($dataFile), true)
    : [];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>懐かしの掲示板</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>★ 懐かしの掲示板 ★</h1>

<form action="post.php" method="post">
名前：<input name="name"><br>
題名：<input name="title"><br>
<textarea name="body" required></textarea><br>
<button type="submit">書き込む</button>
</form>

<hr>

<?php foreach ($threads as $t): ?>
<div class="thread">
<b><?= htmlspecialchars($t["title"]) ?></b><br>
<?php foreach ($t["res"] as $i => $r): ?>
<div class="res">
<?= $i+1 ?> 名前：<?= htmlspecialchars($r["name"]) ?>
<span class="time"><?= $r["time"] ?></span><br>
<pre><?= htmlspecialchars($r["body"]) ?></pre>
</div>
<?php endforeach; ?>
</div>
<?php endforeach; ?>

</body>
</html>