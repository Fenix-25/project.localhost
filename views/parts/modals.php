<?php
try {
    $additions = dbSelect(
        Tables::Products,
        columns: 'id, title, price, quantity',
        conditions: 'is_option = true AND quantity > 0 ',
        order: 'price');

} catch (Exception $exception) {
    echo $exception->getMessage();
}
?>

<style>
    .total_price {
        text-align: right;
    }

    .modal-dialog {
        max-width: 50%
    }
</style>


<!-- Modal -->
<div class="modal fade" id="buyProduct" tabindex="-1" aria-labelledby="buyProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/" method="post" id="buyForm">

                <input type="hidden" name="product_id" value="">
                <input type="hidden" name="type" value="add_to_cart">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="buyProductLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price per 1</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <tr>
                                <td class="product_name"></td>
                                <td class="product_price">
                                    $<span class="product_price_num"></span>
                                </td>
                                <td class="product_quantity">
                                    <input type="number"
                                           name="quantity"
                                           class="product_quantity_field"
                                           min="1"
                                           value="1"
                                           max=""/>
                                </td>
                                <td class="product_total">
                                    $<span class="product_price_total"></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <?php foreach ($additions as $addition): ?>
                            <div class="col-md-6 col-sm-12 addition_item">
                                <div class="input-group mb-3 addition_wrapper">
                                    <!-- checkbox-->
                                    <span class="input-group-text" id="<?= $addition['id'] ?>">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input addition_check"
                                             type="checkbox"
                                             role="switch"
                                             value="<?= $addition['id'] ?>"
                                             id="addition-<?= $addition['id'] ?>"
                                             name="additions[]">
                                      <label class="form-check-label"
                                             for="<?= $addition['id'] ?>"><?= $addition['title'] ?> </label>
                                    </div>
                                </span>
                                    <!-- quantity-->
                                    <span class="input-group-text">$
                                        <span class="addition_single_price"><?= $addition['price'] ?></span>
                                    </span>
                                    <input type="number"
                                           class="form-control addition_qty"
                                           aria-describedby="<?= $addition['id'] ?>"
                                           max="<?= $addition['quantity'] ?>"
                                           name="additions-qty[]"
                                           disabled
                                            min="1">
                                    <!-- total price-->
                                    <span class="input-group-text d-none addition_total_wrapper">$
                                        <span class="addition_total_price"><?= $addition['price'] ?></span>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <h5 class="total_price"><b>Total: $ <span class="num">0</span></b></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </div>
            </form>
        </div>
    </div>
</div>

