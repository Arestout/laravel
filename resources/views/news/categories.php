<?php
include(resource_path() . '/views/menu.php');
?>

<h2>Категории</h2>

<?php foreach ($categories as $item) : ?>
    <a href="<?= route('news.categoryOne', $item['id']) ?>"><?= $item['title'] ?></a><br>
<?php endforeach; ?>
