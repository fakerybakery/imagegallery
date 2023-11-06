<?php
include 'config.php';
$files = glob('image/*.png');
rsort($files);

if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    if (!file_exists("image/$id.png")) {
        die('404');
    }

    $key = array_search("image/$id.png", $files);
    $prevKey = ($key < count($files) - 1) ? $key + 1 : null;
    $nextKey = ($key > 0) ? $key - 1 : null;

    $prevId = ($prevKey !== null) ? intval(pathinfo(basename($files[$prevKey]), PATHINFO_FILENAME)) : null;
    $nextId = ($nextKey !== null) ? intval(pathinfo(basename($files[$nextKey]), PATHINFO_FILENAME)) : null;
} else {
    $id = intval(pathinfo(basename($files[0]), PATHINFO_FILENAME));
    if (isset($files[1])) {
        $prevId = intval(pathinfo(basename($files[1]), PATHINFO_FILENAME));
    } else {
        $prevId = null;
    }
    $nextId = null;
}
$rand = intval(pathinfo(basename($files[array_rand($files)]), PATHINFO_FILENAME));
if (!file_exists("title/$id.txt")) {
    die("Error: no title for #$id");
}
$title = htmlspecialchars(trim(file_get_contents("title/$id.txt")));
$alt = null;
if (file_exists("alt/$id.txt")) {
    $alt = htmlspecialchars(trim(file_get_contents("alt/$id.txt")));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=htmlspecialchars($title)?> - Arctangent</title>
    <link rel="stylesheet" href="main.css">
    <!-- Primary Meta Tags -->
<title>Meta Tags — Preview, Edit and Generate</title>
<meta name="title" content="<?=htmlspecialchars($title)?> - Arctangent" />
<?php if ($alt): ?>
<meta name="description" content="<?=htmlspecialcharcs($alt)?>" />
<?php endif; ?>

<meta property="og:type" content="website" />
<meta property="og:title" content="<?=htmlspecialchars($title)?> - Arctangent" />
<?php if ($alt): ?>
<meta property="og:description" content="<?=htmlspecialcharcs($alt)?>" />
<?php endif; ?>
<meta property="og:image" content="<?=htmlspecialchars($url)?>image/<?=$id?>.png" />
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:title" content="<?=htmlspecialchars($title)?> - Arctangent" />
<?php if ($alt): ?>
<meta property="twitter:description" content="<?=htmlspecialchars($alt)?>" />
<?php endif; ?>
<meta property="twitter:image" content="<?=htmlspecialchars($url)?>image/<?=$id?>.png" />
</head>
<body>
    <main>
        <h1><?=htmlspecialchars($name)?></h1>
        <p><b><?=htmlspecialchars($desc)?></b></p>
    </main>
    <main>
        <h2><?=htmlspecialchars($title)?></h2>
        <?php if ($prevId !== null): ?>
            <a href="?id=<?=$prevId?>" class="prev gobtn">Prev</a>
        <?php endif; ?>
        <a href="?id=<?=$rand?>" class="prev gobtn">Random</a>
        <?php if ($nextId !== null): ?>
            <a href="?id=<?=$nextId?>" class="prev gobtn">Next</a>
        <?php endif; ?>
        <p></p>
        <img src="image/<?=$id?>.png" class="img">
        <?php if ($alt): ?>
            <p><?=htmlspecialchars($alt)?></p>
        <?php endif; ?>
    </main>
    <main>
        <p>&copy; 2023. All rights reserved. License: <?=htmlspecialchars($license)?>. Powered by <a href="https://github.com/fakerybakery/imagegallery">Image Gallery</a>. <a href="rss.php">RSS Feed</a></p>
    </main>
</body>
</html>
