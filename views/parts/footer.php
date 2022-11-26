<footer class="footer-area section-gap md-gap">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5 col-md-5">
                <div class="footer-widget">
                    <?php if (!empty($mainFields['footer']['about-us'])): ?>
                        <h6><?= $mainFields['footer']['about-us']['title'] ?? " " ?></h6>
                        <p><?= $mainFields['footer']['about-us']['text'] ?? " " ?></p>
                        <p class="coyright"> <?= $mainFields['footer']['about-us']['copy'] ?? " " ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-lg-5 col-md-5">
                <div class="footer-widget">
                    <?php if (!empty($mainFields['footer']['newsletter'])): ?>
                        <h6><?= $mainFields['footer']['newsletter']['title'] ?? " " ?></h6>
                        <p><?= $mainFields['footer']['newsletter']['text'] ?? " " ?></p>
                    <?php endif; ?>
                    <form action="/" method="get" class="form-inline">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username"
                                   aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-lg-2 col-md-2">
                <div class="footer-widget">
                    <?php if (!empty($mainFields['footer']['follow-us'])): ?>
                        <h6><?= $mainFields['footer']['follow-us']['title'] ?? " " ?></h6>
                        <p><?= $mainFields['footer']['follow-us']['text'] ?? " " ?></p>
                        <div class="footer-social d-flex align-items-center">
                            <?php foreach ($mainFields['footer']['follow-us']['social'] as $icon): ?>
                                <a href="<?= $icon['link'] ?>"><i class="<?= $icon['icon'] ?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="<?= ASSETS_URI ?>/lib/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS_URI ?>/js/main.js"></script>
</body>
</html>