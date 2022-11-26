
<?php
convertDataToAssoc()

?>
<section id="about-us" class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 video d-flex align-items-center justify-content-center">
                <img class="video-bg" src="<?= IMAGES_URI . $fields['about_us']['video']['video-bg'] ?>" alt="">
                <a href="#">
                    <img src="<?= IMAGES_URI . $fields['about_us']['video']['video-play'] ?>" alt="play video">
                </a>
            </div>
            <div class="col-12 col-sm-12 col-md-6 md-mt-4 video-right d-flex flex-column align-items-start justify-content-center">
                <h6><?= $fields['about_us']['info']['up_title'] ?></h6>
                <h2><?= $fields['about_us']['info']['title'] ?></h2>
                <span><?= $fields['about_us']['info']['sub_title'] ?></span>
                <p><?= $fields['about_us']['info']['description'] ?></p>
                <img src="<?= IMAGES_URI . $fields['about_us']['info']['signature'] ?>" alt="signature">
            </div>
        </div>
    </div>
</section>
