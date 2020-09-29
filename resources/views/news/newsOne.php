<?php
include(resource_path() . '/views/menu.php')

?>

<?php if (!$news) : ?>
    <h2>Такой новости нет</h2>
<?php else : ?>
    <h2><?= $news['title'] ?></h2>
    <p><?= $news['text'] ?></p>
<?php endif; ?>
