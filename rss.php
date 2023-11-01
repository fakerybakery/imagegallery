<?php
include 'config.php';
$files = glob('image/*.png');
rsort($files);
header('Content-Type: application/rss+xml; charset=utf-8');
?>
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
    <channel>
        <title><?=htmlspecialchars($name)?></title>
        <link><?=htmlspecialchars($url)?></link>
        <description><?=htmlspecialchars($desc)?></description>
<?php
        foreach ($files as $file):
            $id = intval(pathinfo(basename($file), PATHINFO_FILENAME));
            if (!file_exists("title/$id.txt")) {
                die("Error: no title for #$id");
            }
            $title = htmlspecialchars(trim(file_get_contents("title/$id.txt")));
            $alt = null;
            if (file_exists("alt/$id.txt")) {
                $alt = htmlspecialchars(trim(file_get_contents("alt/$id.txt")));
            }
        ?>
        <item>
            <title><?=htmlspecialchars($title)?></title>
            <link><?=htmlspecialchars($url)?>?id=<?=$id?></link>
<?php
            if ($alt):
            ?>
            <description><?=htmlspecialchars($alt)?></description>
<?php endif; ?>
            <enclosure url="<?=htmlspecialchars($url)?>image/<?=$id?>.png" type="image/png">
        </item>
<?php
        endforeach;
        ?>
    </channel>
</rss>
