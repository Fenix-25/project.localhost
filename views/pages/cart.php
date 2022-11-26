<section class="section-gap">
    <div class="container">
        <div class="col-12 section-title">
            <h2>Cart</h2>
        </div>
        <?php
        $cart = getCartItems();
        ?>
        <div class="row">
            <div class="col-8 col-offset-2">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cart as $number => $item): ?>
                            <?php $numberParent = $number + 1 ?>
                            <tr>
                                <td><?= $numberParent ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['price'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $item['total'] ?></td>
                                <td>
                                    <form action="/" method="POST">
                                        <input type="hidden" name="type" value="remove_cart_item">
                                        <input type="hidden" name="product_key" value="<?= $number ?>">
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php if (!empty($item['additions'])): ?>
                                <?php foreach ($item['additions'] as $addNumber => $addition): ?>
                                    <tr style="background:#eee;">
                                        <td><?= $numberParent . "." . $addNumber + 1 ?></td>
                                        <td><?= $addition['name'] ?></td>
                                        <td><?= $addition['price'] ?></td>
                                        <td><?= $addition['quantity'] ?></td>
                                        <td><?= $addition['total'] ?></td>
                                        <td>
                                            <form action="/" method="POST">
                                                <input type="hidden" name="type" value="remove_cart_item">
                                                <input type="hidden" name="parent_key" value="<?= $number ?>">
                                                <input type="hidden" name="product_key"
                                                       value="<?= $addNumber ?>">
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>