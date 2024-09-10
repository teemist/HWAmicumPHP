<?php
require_once '../../engine/db.php';
require_once '../../config/config.php';
require_once '../../engine/functions.php';
changePrice();
?>
<h1>Цены:</h1>
<?php foreach ($vars['goods'] as $good):?>
<div class="prices">
    <h3>Товар: <?= $good['title'] ?></h3>
    <form method="post" action="changePrice.php">
        <input name="id" type="hidden" value="<?= $good['id'] ?>">
        <input name="price" type="text" value="<?= $good['price'] ?>">
        <input type="submit" value="Изменить цену">
    </form>
</div>
    <?php endforeach; ?>
