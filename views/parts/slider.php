<section id="home">
    <div class="container">
        <div class="row">
            <div id="bannerSlider"
                 class="carousel slide row d-flex align-items-center justify-content-start"
                 data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php if (count($fields['slider']) > 0): ?>
                        <?php foreach ($fields['slider'] as $key => $value): ?>
                            <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : ''?>"
                                    aria-current="true" aria-label="Slide 1"></button>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="carousel-inner banner-content">
                    <?php if (count($fields['slider']) > 0): ?>
                    <?php foreach ($fields['slider'] as $key => $value): ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : ''?>">
                        <h6><?= $value['sub_title'] ?></h6>
                        <h1><?= $value['title'] ?></h1>
                        <a class="btn btn-outline-primary text-uppercase" href="<?= $value['button']['href'] ?>"><?= $value['button']['text'] ?></a>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

