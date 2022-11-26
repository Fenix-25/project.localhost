const selectors = {
    modal: {
        form: '#buyForm',
        product_id: 'input[name="product_id"]',
        product: {
            name: '.product_name',
            price: '.product_price .product_price_num',
            qty: '.product_quantity_field',
            total: '.product_total .product_price_total',
        },
        additions: {
            item: '.addition_item',
            wrapper: '.addition_wrapper',
            checkbox: '.addition_check',
            price: '.addition_single_price',
            qty: '.addition_qty',
            total: {
                wrapper: '.addition_total_wrapper',
                price: '.addition_total_price'
            }
        },
        total: '.total_price .num',
    },
    catalogItem: '.catalog_item',
};

$(document).on('click', selectors.catalogItem, function () {
    const productData = $(this).data();
    const form = $(selectors.modal.form);
    const qtyProductFields = form.find(selectors.modal.product.qty);

    qtyProductFields.attr('max', productData.qty);
    $(selectors.modal.product.name).text(productData.name);
    $(selectors.modal.product.price).text(productData.price);
    $(selectors.modal.product.total).text(productData.price);
    form.find(selectors.modal.product_id).val(productData.id);
    $(selectors.modal.product.qty).val('1');
    calculateFinalPrice();
});

$(document).on('change', `${selectors.modal.form} ${selectors.modal.product.qty}`, function () {
    const qty = $(this).val();

    const price = parseFloat($(selectors.modal.product.price).text());

    $(selectors.modal.product.total).text(price * qty);
    calculateFinalPrice();
});

$(document).on('change', `${selectors.modal.form} ${selectors.modal.additions.checkbox}`, function () {
    const parent = $(this).parents(selectors.modal.additions.wrapper);
    const qtyField = parent.find(selectors.modal.additions.qty);
    let totalPriceWrapper = parent.find(selectors.modal.additions.total.wrapper);

    if ($(this).prop('checked')) {
        totalPriceWrapper.toggleClass('d-none');
        qtyField.prop('disabled', false).val(1);
    } else {
        totalPriceWrapper.toggleClass('d-none');
        qtyField.prop('disabled', true).val(0);
    }
});

$(document).on('change', `${selectors.modal.form} ${selectors.modal.additions.qty}`, function () {

    const parent = $(this).parents(selectors.modal.additions.item);
    const qty = $(this).val();
    const price = parseFloat(parent.find(selectors.modal.additions.price).text());
    parent.find(selectors.modal.additions.total.price).text(price * qty);
    calculateFinalPrice();
});

function calculateFinalPrice() {
    let productTotal = parseFloat($(selectors.modal.product.total).text());
    const additions = $(`${selectors.modal.additions.checkbox}:checked`);
    if (additions.length > 0) {
        additions.toArray().map((el) => {
            const parent = $(el).parents(selectors.modal.additions.item)
            const total = parseFloat(parent.find(selectors.modal.additions.total.price).text());
            productTotal += total;
        });
    }
    // productTotal.toFixed(2);
    Math.round(productTotal);
    $(selectors.modal.total).text(productTotal);
}

