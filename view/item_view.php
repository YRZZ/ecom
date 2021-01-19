<link rel="stylesheet" type="text/css" href="ecom/public/css/item.css" />

<main>

    <Nav class='side'>
        <ul>
            <li><a href="/item?id=1">Flowers</a></li>
            <li><a href="/item?id=2">Green</a></li>
            <li><a href="/item?id=3">Orchid</a></li>
            <li><a href="/item?id=4">Pottery</a></li>
            <li><a href="/item?id=5">Tools</a></li>

        </ul>
    </Nav>

    <div class='item'>
        <!-- line-->
        <?php foreach ($dataItem as $keyItem => $item) : ?>
            <div class='item'>
                <!-- card-->
                <img src=<?= $item['image'] ?> alt="">
                <p><?= $item['name'] ?></p>
                <p><?= $item['id'] ?></p>
                <p><?= $item['price'] ?> €</p>

                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <input type="hidden" name='id_item' value='<?= $item['id'] ?>'>
                    <label for="quantity">Quantity</label>
                    <input type="number" name='quantity' value='1'>
                    <button type="submit">add to cart</button>
                </form>

                <p><?= $item['id_category'] ?></p>
                <p><?= $item['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>








</main>