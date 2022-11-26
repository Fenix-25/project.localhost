<section id="company" class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-12 section-title">
                <h2>Lorem ipsum dolor sit.</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row">
                <?php foreach ($fields['company'] as $field): ?>
                    <div class="col-sm-12 col-md-6 col-lg-6 d-flex flex-column align-items-start justify-content-center">
                        <img class="company-logo" src="<?= IMAGES_URI . $field['logo'] ?>" alt="">
                        <h5><?= $field['title'] ?>
                            <span class="stars">
                                <?php for ($i = 0; $i < $field['stars']; $i++): ?>
                                    <?php if ($i < 5) : ?>
                                        <i class="fa-solid fa-star"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>

                        </span>
                        </h5>
                        <p><?= $field['description'] ?></p>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
