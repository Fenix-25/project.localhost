<style>
    .alert {
        position: fixed;
        z-index: 999;
        right: 10px;
        top: 55px;
    }
</style>

<?php
if (!empty($_SESSION['notification'])):
    ?>
    <div class="alert alert-<?= $_SESSION['notification']['class'] ?>" role="alert">
        <?= $_SESSION['notification']['text'] ?>
    </div>

    <?php
    unset($_SESSION['notification']);
endif;
