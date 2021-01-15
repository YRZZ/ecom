<h1>Welcome</h1>
<!-- display items -->
<div> <!-- line-->
<?php foreach($dataItem as $keyItem => $item):?>
    <div class='item'> <!-- card-->
    <img src=<?= $item['image']?> alt="">
    <p><?= $item['name']?></p>
    <p><?= $item['price']?></p>
    <p><?= $item['id_category']?></p>
    <p><?= $item['description']?></p>
    </div>
<?php endforeach; ?>
</div>