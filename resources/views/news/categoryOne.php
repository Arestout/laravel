<?php
include(resource_path() . '/views/menu.php')
?>

<?php if (!$categoryNews) : ?>
    <h2>Такой категории нет</h2>
<?php else : ?>
    <?php foreach ($categoryNews as $item) : ?>
        <a href="<?= route('news.newsOne', [$item['category_id'], $item['id']]) ?>"><?= $item['title'] ?></a><br>
    <?php endforeach; ?>
<?php endif; ?>
