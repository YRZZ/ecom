<main>
    
<Nav class='side'>
            <ul>
                <li><a href="/item?id=1">Fleurs</a></li>
                <li><a href="/item?id=2">Verte</a></li>
                <li><a href="/item?id=3">Orchidée</a></li>
                <li><a href="/item?id=4">Poteries</a></li>
                <li><a href="/item?id=5">outils</a></li>
                
            </ul>
</Nav>
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








</main>