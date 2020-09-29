<?php
include(resource_path() . '/views/menu.php')
?>
<h2>Новости</h2>

<?php foreach ($news as $item) : ?>
    <a href="<?= route('news.newsOne', [$item['category_id'], $item['id']]) ?>"><?= $item['title'] ?></a><br>
<?php endforeach; ?>
