<div class="container">
    <div class="row row-title">
        <div class="col-3"></div>
        <div class="col-6">
            <h2><?= $news->getTitle() ?></h2>
            <?php include('./include/newsInfo.php') ?>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row row-content">
        <div class="col-3"></div>
        <div class="col-6">
            <p><?= $formatedContent ?></p>
            <a type="button" class="btn btn-info" href="index.php">Retour à l'accueil</a>
        </div>
        <div class="col-3"></div>
    </div>
</div>