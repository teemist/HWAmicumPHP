<h1><?= $vars['title']?></h1>

<h2>Лента новостей</h2>
<?php foreach ($vars['news'] as $news):?>
    <h3><?= $news['title'] ?></h3>
    <p><?= $news['text'] ?></p>
    <p><?= $news['created_at'] ?></p>
<?php endforeach ?>
