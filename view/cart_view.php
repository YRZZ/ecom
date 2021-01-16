
<main>

<h2>Cart</h2>

<?= $cartEmpty ?>
<div>
    <form action="/cart" method="post">
        <table style="width:70%">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart as $item) :?>
                    <tr>
                        <td><?= $item['name']?></td>
                        <td><?=$item['price']?></td>
                        <td><input type='number' name='<?= 'quantity'. $i++ ?>' value='<?=$item['quantity']?>'></input></td>
                        <td><?=$item['quantity']*$item['price']?></td>
                        <?php $total += $item['quantity']*$item['price']?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>total</td>
                    <td><?= $total ?></td>
                </tr>
            </tbody>
        </table>
                    <button type="submit">Update cart</button>
    </form>            
</div>


</main>
